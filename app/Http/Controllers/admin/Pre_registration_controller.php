<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Pre_Registration_Request;
use App\Models\admin\documents;
use App\Models\User;
use Faker\Provider\Image;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Pre_registration_controller extends Controller
{
    public function index(){
        $pre_registrations = User::orderBy('id','desc')->paginate(10);
        //  return  $pre_registrations;
        return view('admin.pre_registration.index',compact('pre_registrations'));
    }
    public function create(){

        return view('admin.pre_registration.create');
    }
    public function store(Request $request){
        Log::info($request);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',

        ]);
        if (!$validator->passes()) {

            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);



        }else{

            $folderPath = public_path('assets/student/');

            $image_parts = explode(";base64,", $request->image);
            $image_type_aux = explode("image/", $image_parts[0]);

            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageName = uniqid() . '.png';

            $imageFullPath = $folderPath.$imageName;

            file_put_contents($imageFullPath, $image_base64);
            $student = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birth' => $request->birth,
                'avatar' =>  $imageName,
                'age' => '12',
                'family_situation' => $request->situation_famille,
                'total_score' => 0,
                'nbr_child' => $request->childrene,
                'nbr_of_enrolled_course' => 0,
                'education_years' => '2022',
                'cin' => $request->cin,
                'scolarity_level' => $request->level_scolaire,
                'phone' => $request->phone,
                'parent_phone' => $request->phone_parents,
                'groups' => $request->group,
                'status' => 'is_active',
                'is_online' => '0',
                'address' => $request->address,
                'editor' => $request->editor,
                'email'     => $request->get('email'),
                'password'  => bcrypt($request->get('password')),
            ]);
            if ($student){
                //return  redirect()->route('admin.pre_registration');
                return response()->json(['status'=>1, 'msg'=>'New Student has been successfully registered']);
            }

        }




    }
    public function edit($id){
        $users =  User::find($id);

        if (!$users){
            return redirect()->route('admin.pre_registration')->with(['error' => "There Is Error Please Try Again!!"]);
        }

        return view('admin.pre_registration.edit',compact('users'));
    }
    public function update(Request $request,$id){
        Log::info(json_encode($request->all()));
        $users = User::find($id);
        $validator = Validator::make($request->all(), [

            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',

        ]);

        if (!$validator->passes()) {

            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);



        }else{
            if ($request->get('imageModification') == "true"){
                Log::info('this is nice');
                $folderPath = public_path('assets/student/');
                $image_parts = explode(";base64,", $request->image);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $imageName = uniqid() . '.png';
                $imageFullPath = $folderPath.$imageName;
                file_put_contents($imageFullPath, $image_base64);
                $users->update([
                    'avatar' => $imageName
                ]);
                //$oldAvatarPath =  app_path().$request->get('oldImagePath');
                //unlink($oldAvatarPath);
            }
            $users->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birth' => $request->birth,
                'age' => Carbon::parse($request->birth)->diff(Carbon::now())->y,
                'family_situation' => $request->situation_famille,
                'total_score' => 0,
                'nbr_child' => $request->childrene,
                'nbr_of_enrolled_course' => 0,
                'education_years' => '2022',
                'cin' => $request->cin,
                'scolarity_level' => $request->level_scolaire,
                'phone' => $request->phone,
                'parent_phone' => $request->phone_parents,
                'groups' => $request->group,
                'email' => $request->email,
                'status' => 'is_active',
                'is_online' => '0',
                'address' => $request->address,
                'editor' => $request->editor,
            ]);
            if ($users){
                //return  redirect()->route('admin.pre_registration');
                return response()->json(['status'=>1, 'msg'=>'New Student has been successfully registered']);
            }

        }
    }
    public function delete($id){
        documents::where('user_id',$id)->delete();
        User::find($id)->delete();

        return redirect()->route('admin.pre_registration')->with(['success' => "Student Is Deleted!!!"]);





    }
    public function approved($id){
        $users = User::find($id);
        if (!$users)
            return redirect()->route('admin.pre_registration')->with(['error' => "There Is Error Please Try Again!!"]);


        return view('admin.pre_registration.approved',compact('users'));
    }
    public function finalize(Request $request){
        $user_id = 0;
        $docUrl = array();
        $docName = array();
        $docType = array();
        if ($request->ajax()){
            Log::info(json_encode($request->all()));
            $index = 0;
            $user_id = 0;
            foreach($request->all() as $key => $value) {
                if (preg_match('/user_id/',$key)){
                    $user_id = $request->get($key);
                    Log::info('user_id'.$request->get($key));
                }
                if (preg_match('/attachement[0-9a-zA-Z]*/i',$key)){
                    Log::info('it matches');
                    $pathAttachement =   $request->file($key)->storeOnCloudinary('attachement')->getPath();
                    Log::info($pathAttachement);
                    array_push($docUrl , $pathAttachement);
                }
                if (preg_match('/fileName[0-9a-zA-Z]*/i',$key)){
                    Log::info('it matches name');
                    $attachementName = $value;
                    Log::info($attachementName);
                    array_push($docName , $attachementName);

                }
                if (preg_match('/fileType[0-9a-zA-Z]*/i',$key)){
                    Log::info('it matches type');
                    $attachementType =   $request->get($key);
                    Log::info($attachementType);
                    array_push($docType  , $attachementType);
                }

            }
            Log::info(json_encode($docUrl));
            Log::info(json_encode($docName));
            Log::info(json_encode($docType));
            $users = User::all();
            $user = $users->find($user_id);
            Log::info(json_encode($user));
            for ($i=0 ; $i < count($docUrl) ; $i++){
                $doc = new documents() ;
                $doc->user_id = $user->id ;
                $doc->doc_name = $docName[$i];
                $doc->string_url = $docUrl[$i];
                if ($docType[$i] == 'jpeg' || $docType[$i] == 'jpg' || $docType[$i] == 'png'){
                    $doc->doc_type = 'IMG';
                }
                if ($docType[$i] == 'pdf'){
                    $doc->doc_type = 'PDF';
                }
                $doc->save();
            }
            $user->status = 'is_active';
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->save();

            return response()->json(['status'=>1, 'msg'=>'New Student has been successfully registered']);

        }
    }

}
