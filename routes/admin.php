<?php

use App\Models\Video;
use Dompdf\Dompdf;
use Dompdf\Options;
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
Route::get('/video', 'App\Http\Controllers\admin\VimeoController@showPage')->name('video.view');
Route::post('/video/add', 'App\Http\Controllers\admin\VimeoController@addVideo')->name('video.add');


/* START LOGIN ADMIN */

Route::get('/login/admin', 'App\Http\Controllers\admin\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/login/admin', 'App\Http\Controllers\admin\LoginController@adminLogin')->name('admin.send.login');
Route::post('/logout/admin', 'App\Http\Controllers\admin\AdminDashboardController@adminlogout')->name('logout.admin');

/* END LOGIN ADMIN */



Route::group(['middleware' => 'auth:admin'], function () {



    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard','App\Http\Controllers\admin\AdminDashboardController@index')->name('admin.dashboard');

        Route::group(['prefix' => 'edit'], function () {
            Route::get('/profile','App\Http\Controllers\admin\AdminDashboardController@edit_profile')->name('edit.profile');
            Route::post('/profile/change','App\Http\Controllers\admin\AdminDashboardController@change_profile')->name('edit.profile.change');
            Route::post('/profile/change/password','App\Http\Controllers\admin\AdminDashboardController@change_profile_password')->name('edit.profile.password');
        });
        Route::group(['prefix' => 'student'], function () {
            Route::get('/','App\Http\Controllers\admin\Pre_registration_controller@index')->name('admin.pre_registration');
            Route::get('/create','App\Http\Controllers\admin\Pre_registration_controller@create')->name('admin.pre_registration.create');
            Route::post('store-pre-registration','App\Http\Controllers\admin\Pre_registration_controller@store')->name('admin.pre_registration.store');
            Route::post('update-pre-registration/{id}','App\Http\Controllers\admin\Pre_registration_controller@update')->name('admin.pre_registration.update');
            Route::post('/search','App\Http\Controllers\admin\Pre_registration_controller@searchStudent')->name('admin.pre_registration.search_student');
            Route::get('edit/{id}','App\Http\Controllers\admin\Pre_registration_controller@edit')->name('admin.pre_registration.edit');
            Route::get('delete/{id}','App\Http\Controllers\admin\Pre_registration_controller@delete')->name('admin.pre_registration.delete');
            Route::get('approved/{id}','App\Http\Controllers\admin\Pre_registration_controller@approved')->name('admin.pre_registration.approved');
            Route::post('finalize','App\Http\Controllers\admin\Pre_registration_controller@finalize')->name('admin.pre_registration.finalize');


        });

        Route::group(['prefix' => 'students'], function () {
            Route::get('/','App\Http\Controllers\admin\StudensController@index')->name('admin.student');
            Route::get('/student/search','App\Http\Controllers\admin\StudensController@search')->name('admin.student.search');
            Route::get('/student/edit/{id}','App\Http\Controllers\admin\StudensController@edit')->name('admin.student.edit');
            Route::get('/student/active/{id}','App\Http\Controllers\admin\StudensController@activeStudent')->name('admin.student.active');
            Route::get('/student/inactive/{id}','App\Http\Controllers\admin\StudensController@InactiveStudent')->name('admin.student.inactive');
            Route::get('/student/graduate/{id}','App\Http\Controllers\admin\StudensController@GraduateStudent')->name('admin.student.graduate');

        });
        Route::group(['prefix' => 'podcast'], function () {
            Route::post('/store/podcast','App\Http\Controllers\PodcatController@store')->name('admin.podcast.store');
            Route::post('/store/podcastss','App\Http\Controllers\PodcatController@storeInfoPodCast')->name('admin.podcastss.store');
            Route::get('/create','App\Http\Controllers\PodcatController@create')->name('admin.podcast.create');
            Route::get('/','App\Http\Controllers\PodcatController@index')->name('admin.podcast.index');
//            Route::get('/create','App\Http\Controllers\admin\Podcast@show')->name('admin.podcast.create');
//            Route::post('/store','App\Http\Controllers\admin\Podcast@create')->name('admin.podcast.store');
//            Route::post('/delete','App\Http\Controllers\admin\Podcast@delete')->name('admin.podcast.delete');
//            Route::get('/fetch','App\Http\Controllers\admin\Podcast@fetch')->name('admin.podcast.fetch');
//            Route::post('/storeData','App\Http\Controllers\admin\Podcast@storePodcast')->name('admin.podcast.data');

        });

        Route::group(['prefix' => 'chiefs'], function () {
            Route::get('/','App\Http\Controllers\admin\ChiefController@index')->name('admin.chiefs.index');
            Route::get('/create','App\Http\Controllers\admin\ChiefController@create')->name('admin.chiefs.create');
            Route::post('/store-chiefs','App\Http\Controllers\admin\ChiefController@store')->name('admin.chiefs.store');
            Route::get('/edit/{id}','App\Http\Controllers\admin\ChiefController@edit')->name('admin.chiefs.edit');
            Route::post('/update-chiefs/{id}','App\Http\Controllers\admin\ChiefController@update')->name('admin.chiefs.update');
            Route::get('/search','App\Http\Controllers\admin\ChiefController@search')->name('admin.chiefs.search');
            Route::get('/delete-chiefs/{id}','App\Http\Controllers\admin\ChiefController@delete')->name('admin.chiefs.delete');

        });

        Route::group(['prefix' => 'video'], function () {
            Route::get('/','App\Http\Controllers\VideoController@index')->name('admin.video.index');
            Route::post('/store/video','App\Http\Controllers\VideoController@store')->name('admin.video.store');
            Route::post('/store/video/all','App\Http\Controllers\VideoController@allstore')->name('admin.video.allstore');
            Route::get('create/video','App\Http\Controllers\VideoController@create')->name('admin.video.create');

        });


        Route::group(['prefix' => 'course'], function () {
            Route::get('/','App\Http\Controllers\admin\CourseController@index')->name('admin.course.index');
            Route::get('/create','App\Http\Controllers\admin\CourseController@create')->name('admin.course.create');
            Route::post('/store/cource','App\Http\Controllers\admin\CourseController@storeCource')->name('admin.course.store');
            Route::post('/store/newcource','App\Http\Controllers\admin\CourseController@storenewCource')->name('admin.course.newstore');
            Route::post('/delete/video','App\Http\Controllers\admin\CourseController@deleteVideo')->name('admin.video.delete');
            Route::post('/report','App\Http\Controllers\admin\PdfCpntroller@createPdf')->name('admin.video.report');

            Route::get('/report/{id}', function (Request $request, $id) {
                 $vid = Video::where('id' , $id)->first();
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $dompdf = new Dompdf($options);
                $dompdf->loadHtml(view('admin.courses.report' , compact('vid')));

// (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
                $dompdf->render();

// Output the generated PDF to Browser
             //   $dompdf->stream('report.pdf');
//save the pdf file on the server
                $str = 'report'.random_int(124 , 900).'.pdf';
                file_put_contents($str, $dompdf->output());
                $pathToFile = asset($str);
                return response()->json(['status'=> 200 , 'report' => $pathToFile , 'id' => $id]);


            })->name('admin.report.show') ;

        });
        Route::group(['prefix' => 'quizz'], function () {
            Route::get('/','App\Http\Controllers\admin\QuizzController@show')->name('admin.quizz.show');
            Route::post('/create','App\Http\Controllers\admin\QuizzController@create')->name('admin.quizz.create');
            Route::get('/store/cource','App\Http\Controllers\admin\QuizzController@fetchQuiz')->name('admin.quizz.fetch');

        });
        Route::group(['prefix' => 'material'], function () {
            Route::get('/','App\Http\Controllers\admin\MaterialController@show')->name('admin.mat.show');
            Route::get('/create','App\Http\Controllers\admin\MaterialController@create')->name('admin.mat.create');
            Route::post('/store','App\Http\Controllers\admin\MaterialController@store')->name('admin.mat.store');
            Route::post('/delete','App\Http\Controllers\admin\MaterialController@delete')->name('admin.mat.delete');
            Route::post('/ajax','App\Http\Controllers\admin\MaterialController@storeData')->name('admin.mat.ajax');
            Route::get('/deleteMat','App\Http\Controllers\admin\MaterialController@deleteMat')->name('admin.mat.mat');

        });
        Route::group(['prefix' => 'notification'], function () {
            Route::get('/delete','App\Http\Controllers\admin\NotificationController@delete')->name('admin.notification.delete');
            Route::get('/notify','App\Http\Controllers\admin\NotificationController@index')->name('admin.notification.index');
            Route::get('/online','App\Http\Controllers\admin\NotificationController@online')->name('admin.notification.online');

        });


        Route::group(['prefix' => 'monitoring'], function () {
            Route::get('/','App\Http\Controllers\admin\EvaluationController@index')->name('admin.evaluation.index');
            Route::get('/create','App\Http\Controllers\admin\EvaluationController@create')->name('admin.monitoring.create');
            Route::post('/store','App\Http\Controllers\admin\EvaluationController@store')->name('admin.monitoring.store');
            Route::get('/edit/{id}','App\Http\Controllers\admin\EvaluationController@edit')->name('admin.monitoring.edit');
            Route::post('/update/{id}','App\Http\Controllers\admin\EvaluationController@update')->name('admin.monitoring.update');
            Route::get('/delete/{id}','App\Http\Controllers\admin\EvaluationController@delete')->name('admin.monitoring.delete');
            Route::post('/AddNoteFinale','App\Http\Controllers\admin\EvaluationController@add_note_finale')->name('admin.monitoring.add_note_finale');
            Route::get('/services','App\Http\Controllers\admin\EvaluationController@allservices')->name('admin.services.index');
            Route::get('/services/create','App\Http\Controllers\admin\EvaluationController@create_services')->name('admin.services.create');
            Route::post('/services/store','App\Http\Controllers\admin\EvaluationController@store_services')->name('admin.service.store');
            Route::get('/services/delete/{id}','App\Http\Controllers\admin\EvaluationController@delete_services')->name('admin.service.delete');
            Route::get('/services/edit/{id}','App\Http\Controllers\admin\EvaluationController@edit_services')->name('admin.service.edit');
            Route::post('/services/update/{id}','App\Http\Controllers\admin\EvaluationController@update_services')->name('admin.service.update');

        });

        Route::group(['prefix' => 'interships'], function () {
            Route::get('/','App\Http\Controllers\admin\IntershipsController@index')->name('admin.interships');
            Route::get('/create','App\Http\Controllers\admin\IntershipsController@create')->name('admin.interships.create');
            Route::post('/store','App\Http\Controllers\admin\IntershipsController@store')->name('admin.interships.store');
            Route::get('/edit/{id}','App\Http\Controllers\admin\IntershipsController@edit')->name('admin.interships.edit');
            Route::post('/update/{id}','App\Http\Controllers\admin\IntershipsController@update')->name('admin.interships.update');
            Route::get('/delete/{id}','App\Http\Controllers\admin\IntershipsController@delete')->name('admin.interships.delete');

        });
        Route::group(['prefix' => 'jobs_portal'], function () {
            Route::get('/','App\Http\Controllers\admin\JobsController@index')->name('admin.jobs_portal');
            Route::get('/create','App\Http\Controllers\admin\JobsController@create')->name('admin.jobs_portal.create');
            Route::post('/store','App\Http\Controllers\admin\JobsController@store')->name('admin.jobs_portal.store');
            Route::get('/Add_Note/{id}','App\Http\Controllers\admin\JobsController@add_note')->name('admin.jobs_portal.add_note');
            Route::get('/edit/{id}','App\Http\Controllers\admin\JobsController@edit')->name('admin.jobs_portal.edit');
            Route::post('/update/{id}','App\Http\Controllers\admin\JobsController@update')->name('admin.jobs_portal.update');
            Route::get('/delete/{id}','App\Http\Controllers\admin\JobsController@delete')->name('admin.jobs_portal.delete');
        });


    });
});


require __DIR__.'/auth.php';



