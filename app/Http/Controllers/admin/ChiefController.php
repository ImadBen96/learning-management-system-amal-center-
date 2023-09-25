<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\cheif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ChiefController extends Controller
{
    public function index(){
        $chefs = cheif::orderBy('id','desc')->paginate(10);
        return view('admin.instractor.index',compact('chefs'));
    }
    public function create(){
        return view('admin.instractor.create');
    }
    public function store(Request $request){
        Log::info(json_encode($request->all()));
        $validator = Validator::make($request->all(), [

            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',

        ]);

        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{


            $folderPath = public_path('assets/cheifs/');

            $image_parts = explode(";base64,", $request->image);
            $image_type_aux = explode("image/", $image_parts[0]);

            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageName = uniqid() . '.png';

            $imageFullPath = $folderPath.$imageName;

            file_put_contents($imageFullPath, $image_base64);
            $cheifs = cheif::create([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'avatar' =>  $imageName,

                'birth' => $request->birth,
                'gender' => $request->gender,

                'center' => $request->center,
                'address' => $request->address,

            ]);
            if ($cheifs){
                //return  redirect()->route('admin.pre_registration');
                return response()->json(['status'=>1, 'msg'=>'New Student has been successfully registered']);
            }


        }
    }
    public function edit($id){
        $chefs = cheif::find($id);
        if (!$chefs)
            return redirect()->route('admin.chiefs.index')->with(['error' => "There Is Error Please Try Again!!"]);

        return view('admin.instractor.edit',compact('chefs'));

    }
    public function update(Request $request,$id){
        Log::info(json_encode(array($request->all())));
        $data = array($request->all()) ;
        Log::info('**************');
        Log::info(json_encode(array_keys($data)));
        Log::info(storage_path('app/public'));
        Log::info('**************');
        $chiefs = cheif::find($id);
        if (!$chiefs){
            return redirect()->route('admin.instractor.index')->with(['error' => "There Is Error Please Try Again!!"]);
        }
        $validator = Validator::make($request->all(), [

            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'birth' => 'required|date',
            'gender' => 'required|integer',
            'center' => 'required|integer',
        ]);

        if ($request->get('imageEdited') == 'true'){
            $img = $request->image;
            Log::info(json_encode($img));
            @list($type, $file_data) = explode(';', $img);
            @list(, $file_data) = explode(',', $file_data);
            $imageName =$chiefs->id.'chef.png';
            $isStored =  Storage::disk('public')->put($imageName , base64_decode($file_data));
            Log::info($isStored);
            Log::info(public_path('assets/cheifs/'));
            $chiefs->update(["avatar" => $imageName ]);
        }else{
            Log::info('the image didn\'t change ');
        }




        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            if($request->hasFile('image')){

                $folderPath = public_path('assets/cheifs/');

                $image_parts = explode(";base64,", $request->image);
                $image_type_aux = explode("image/", $image_parts[0]);

                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                $imageName = uniqid() . '.png';

                $imageFullPath = $folderPath.$imageName;

                file_put_contents($imageFullPath, $image_base64);

                $chiefs->update([
                    'avatar' => $imageName,
                ]);


            }
            $chiefs->update([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,


                'birth'      => $request->birth,
                'gender'      => $request->gender,

                'center'      => $request->center,
                'address'      => $request->address,
            ]);
            if ($chiefs){
                return response()->json(['status'=>1, 'msg'=>'New Student has been successfully registered']);
            }



        }

        return response()->json(['status'=>200, 'msg'=>'New Student has been successfully registered']);

    }
    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = array();
        if ($request->ajax()){
            Log::info('it works');
            Log::info(json_encode($request->all()));
            if ($request->has('name')){
                Log::info('has name');
                $data = cheif::where('last_name','LIKE',$request->name.'%')->get();
                $data2 = cheif::where('first_name','LIKE',$request->name.'%')->get();
                foreach($data as $property => $value) {
                    Log::info($value);
                    array_push($result , $value);
                }
                foreach($data2 as $property => $value) {
                    Log::info($value);
                    if(!in_array($value , $result)){
                        array_push($result , $value);
                    }
                }

                return response()->json([ 'status' => 200 ,'data' => $result]);
            }else{
                Log::info('nothing there');
                return response()->json([ 'status' => 200 ,'data' => 'nothing there']);
            }
        }else{
            Log::info('nothing there ');
            return response()->json([ 'status' => 200 ,'data' => 'tata ops']);
        }
    }
    public function delete($id){
        $chiefs = cheif::find($id);
        if (!$chiefs)
            return redirect()->route('admin.instractor.index')->with(['error' => "There Is Error Please Try Again!!"]);

        $chiefs->delete();

        if ($chiefs){
            return redirect()->route('admin.chiefs.index')->with(['success' => "Chief Is Deleted!!!"]);

        }

    }

}
