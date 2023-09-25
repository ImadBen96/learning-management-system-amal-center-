<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Cource;
use App\Models\admin\Option;
use App\Models\admin\Question;
use App\Models\admin\Quizoption;
use App\Models\admin\Quizquestion;
use App\Models\admin\Quizze;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;

class QuizzController extends Controller
{
    //
    public function show(){
        return view('admin.quizz.create') ;
    }
    public function create(Request $request){
        $ansLocation = 'quizzAns';
        $questionLocation = 'quizzQes' ;
        $optionCat = array();
        $numberOfOptions = array();
        $numberOfQuestionType = array();
        $numberOfQuestion  = array();
        $rightAnsHolder = array();
        $counter1 = 0 ;
        $counter2 = 0 ;
        $counter3 = 0 ;
     if ($request->ajax()){
         Log::info(json_encode($request->all()));
         array_filter($request->all() , function ($key) use (&$numberOfQuestionType , $ansLocation, &$optionCat , &$questionLocation , &$numberOfOptions , &$numberOfQuestion , &$rightAnsHolder, &$counter1 , &$counter2 , &$counter3 , &$request){
             if (preg_match('/(first|second|third)QuizzCat/' , $key)){
//                 $quizz = new Quizze();
//                 $quizz->quiz_title = Str::random(14);
//                 $quizz->quiz_desc = Str::random(14);
//                 $quizz->score = 0 ;
//                 $coures = Cource::where('cource_title', $request->get($key))->get();
//                 $quizz->cource_id = $coures->first()->id ;
//                 $quizz->save();
                 Log::info('quizz Cat');
                 array_push($optionCat , $request->get($key)) ;
             }
             if (preg_match('/quizzquestion[0-9]/' , $key)){
                 Log::info('quizz Question');
                 Log::info(' question key '.$key);
                 array_push($numberOfQuestion , $key) ;
             }
             if (preg_match('/quizzquestionType[0-9]/' , $key)){
                 Log::info('quizz Question type');
                 Log::info(' question type '.$request->get($key));
                 array_push($numberOfQuestionType , $request->get($key)) ;
             }
             if (preg_match('/(first|second|third)quizzAnsewr[0-9a-z]*/' , $key)){
                 if ($request->hasFile($key)){
                     Log::info('quizz ansewrs as file');
                 }
                 if (preg_match('/firstquizzAnsewr[0-9a-z]*/' , $key)){
                     $counter1++;
                 }
                 if (preg_match('/secondquizzAnsewr[0-9a-z]*/' , $key)){
                     $counter2++;
                 }
                 if (preg_match('/thirdquizzAnsewr[0-9a-z]*/' , $key)){
                     $counter3++;
                 }
                 Log::info('quizz ansewrs');
                 array_push($numberOfOptions , $request->file($key));
             }
             if (preg_match('/(first|second|third)QuizzRightAnswer/' , $key)){
                 Log::info('quizz right ans ansewrs');
                 array_push($rightAnsHolder , $request->get($key));
             }

         } , ARRAY_FILTER_USE_KEY);
         Log::info(json_encode($optionCat));
         Log::info(json_encode($numberOfOptions));
         Log::info(json_encode($numberOfQuestion));
         Log::info(json_encode($numberOfQuestionType));
         Log::info(json_encode($rightAnsHolder));
         Log::info('counter1'.$counter1);
         Log::info('counter2'.$counter2);
         Log::info('counter3'.$counter3);
         $counter = 0 ;
         $tuthcount = 0 ;
         $optionsHolder = array();
         $questionHolder = array();
         $quizz1 = new Quizze();
         $quizz2 = new Quizze();
         $quizz3 = new Quizze();
         //fist quizz
         $quizz1->quiz_title = Str::random(14);
         $quizz1->quiz_desc = Str::random(14);
         $quizz1->score = 0 ;
         $quizz1->cource_id = Cource::where('cource_title' , $optionCat[0])->get()->first()->id;
         $quizz1->save();
         // quizz 2
         $quizz2->quiz_title = Str::random(14);
         $quizz2->quiz_desc = Str::random(14);
         $quizz2->score = 0 ;
         $quizz2->cource_id = Cource::where('cource_title' , $optionCat[1])->get()->first()->id;
         $quizz2->save();
         //quizz 3
         $quizz3->quiz_title = Str::random(14);
         $quizz3->quiz_desc = Str::random(14);
         $quizz3->score = 0 ;
         $quizz3->cource_id = Cource::where('cource_title' , $optionCat[2])->get()->first()->id;
         $quizz3->save();

         Log::info(count($numberOfOptions));
         foreach ($numberOfOptions as $op){
             $options = new Option();
             if ($counter < $counter1){
                 $options->nbr_options = $counter + 1 ;
             }
             if ( $counter >= $counter1 && $counter < $counter1+$counter2){
                 $options->nbr_options = $counter-$counter1;
             }
             if ( $counter >= $counter1+$counter2 && $counter < $counter1+$counter2+$counter3){
                 $options->nbr_options = $counter-$counter1-$counter2;
             }
             $options->type_option = 'image';
             $options->content = $op->storeOnCloudinaryAs($ansLocation)->getPath();
             Log::info(array_search( $op , $numberOfOptions).' the index in the $numberOptionsplace');
             if ($counter+1 == $rightAnsHolder[0] || $counter +1 == $counter1 +$rightAnsHolder[1] || $counter +1 ==  $counter1+ $counter2 +$rightAnsHolder[2]  ){
                 Log::info('true '.$counter);
                 if ($counter < $counter1){
                     $options->quizzes_id = $quizz1->id;
                 }
                 if ($counter >= $counter1 && $counter < $counter1+$counter2){
                     $options->quizzes_id = $quizz2->id;
                 }
                 if ($counter >= $counter1 + $counter2 && $counter < $counter1+$counter2+$counter3){
                     $options->quizzes_id = $quizz3->id;
                 }
                 $options->isCorrect = true ;
                 $options->save();
                 array_push($optionsHolder , $options);
             }else{
                 if ($counter < $counter1){
                     $options->quizzes_id = $quizz1->id;
                 }
                 if ($counter >= $counter1 && $counter < $counter1+$counter2){
                     $options->quizzes_id = $quizz2->id;
                 }
                 if ($counter >= $counter1 + $counter2 && $counter < $counter1+$counter2+$counter3){
                     $options->quizzes_id = $quizz3->id;
                 }
                 Log::info('false '.$counter);
                 $options->isCorrect = false ;
                 $options->save();
                 array_push($optionsHolder , $options);
             }
             $counter++;
             Log::info('counter '.$counter);
         }
          Log::info(count($optionsHolder));
          Log::info(json_encode($optionsHolder));
          $questioncounter = 0 ;

          foreach ($numberOfQuestion as $value){
              $question = new Question();
              if ($numberOfQuestionType[$questioncounter] == 'jpeg' || $numberOfQuestionType[$questioncounter] == 'jpg' || $numberOfQuestionType[$questioncounter] == 'png'){
                  $question->type ='image';
                  $question->img_question = $request->file($value)->storeOnCloudinaryAs($questionLocation)->getPath();
              }
              if ($numberOfQuestionType[$questioncounter] == 'mp4'){
                  $question->type ='video';
                  $question->txt_question = $request->file($value)->storeOnCloudinaryAs($questionLocation)->getPath();
              }
              if ($numberOfQuestionType[$questioncounter] == 'mp3'){
                  $question->type ='audio';
                  $question->audio_question = $request->file($value)->storeOnCloudinaryAs($questionLocation)->getPath();
              }
              if ($questioncounter == 0){
                  $question->quiz_id = $quizz1->id;
              }
              if ($questioncounter == 1){
                  $question->quiz_id = $quizz2->id;
              }
              if ($questioncounter == 2){
                  $question->quiz_id = $quizz3->id;
              }
              $question->save();
              array_push($questionHolder , $question);
              $questioncounter++;

         }
          Log::info(json_encode($questionHolder));


         return response()
             ->json(['status' => 200]);

     }
    }
    public function fetchQuiz(){

    }
}
