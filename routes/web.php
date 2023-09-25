<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login/student', 'App\Http\Controllers\Auth\AuthenticatedSessionController@showStudentLoginForm')->name('student.login');
Route::post('/logout/student', 'App\Http\Controllers\student\StudentDashboardController@logout_student')->name('logout.student');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::get('/',function(){
   return view('landing_page.index');
});




//Route::get('/login/student', [App\Http\Controllers\LoginController::class, 'showStudentLoginForm']);


Route::group(['middleware' => 'auth:web'], function () {
    Route::group(['prefix' => 'student'], function () {
        Route::get('/dashboard/','App\Http\Controllers\student\StudentDashboardController@index')->name('student.dashboard');
        Route::get('/monitorings/','App\Http\Controllers\student\StudentMonitorings@index')->name('student.monitorings');
        Route::get('/certification/','App\Http\Controllers\student\StudentCoursecontroller@handle')->name('student.certification');


        /*interships student */
        Route::get('/interships/','App\Http\Controllers\student\StudentInterships@index')->name('student.interships');
        Route::get('/interships/details/{id}','App\Http\Controllers\student\StudentInterships@more_details')->name('student.interships.deatails');
        Route::get('/interships/accepte/{id}','App\Http\Controllers\student\StudentInterships@accepte')->name('student.interships.accepte');
        Route::get('/interships/refuser/{id}','App\Http\Controllers\student\StudentInterships@refuser')->name('student.interships.refuser');
        /*interships student */

        /*jobs student */
        Route::get('/jobs/','App\Http\Controllers\student\StudentJobs@index')->name('student.jobs');
        Route::get('/jobs/accepte/{id}','App\Http\Controllers\student\StudentJobs@accepte')->name('student.jobs.accepte');
        Route::get('/jobs/refuse/{id}','App\Http\Controllers\student\StudentJobs@refuse')->name('student.jobs.refuse');
        /*jobs student */
        /*courses & quizzes */
        Route::get('/course/view','App\Http\Controllers\student\StudentCoursecontroller@index')->name('student.course.index');
        Route::get('/course/enroll','App\Http\Controllers\student\StudentCoursecontroller@enroll')->name('student.course.enroll');
        Route::get('/course/complete','App\Http\Controllers\student\StudentCoursecontroller@complete')->name('student.course.complete');
        /*start with monitoring + interships*/
        Route::get('/All/Jobs','App\Http\Controllers\student\AllController@index')->name('student.all.jobs');
        /*start with monitoring + interships*/

    });
});

//Route::get('/dashboard', [App\Http\Controllers\LoginController::class, 'dashboard'])->name('dashboard.route');
Route::post('course/thumbs' , 'App\Http\Controllers\admin\CourseController@storeCourseThumn')->name('course.thumbs');
Route::post('course/intro' , 'App\Http\Controllers\admin\CourseController@storeCourseIntro')->name('course.intro');
Route::get('search', function(Request $request) {
    \Illuminate\Support\Facades\Log::info($request);
   if ($request->ajax()){
       $results = DB::table('users')->where('first_name' ,'LIKE' , $request["query"].'%' )->get();
       if(count($results) > 0){
           return response()->json($results);
       }else {
           return  response()->json(["sorry" => " no results match's"]);
       }
   }
  //  $articles = \App\Models\User::search($query)->get();

})->name('search');

require __DIR__.'/auth.php';
