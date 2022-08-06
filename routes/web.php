<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Auth::routes(['verify'=>true]);
Route::group([ 'middleware' =>'auth'],function(){

    Route::get('/','HomeController@index')->name('frontend');


/*********************  grades ********************************/

    Route::group(['namespace'=> 'Grades'],function (){
        Route::resource('grades', 'GradeController');

    });


    /*********************  Classrooms ********************************/


    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
        Route::post('filter_classes', 'ClassroomController@Filter_Classes')->name('filter.classes');


        Route::get('students/{id}', 'ClassroomController@students')->name('Classrooms.students');
        Route::post('classrooms/import/file/{id}', 'ClassroomController@importExcel')->name('classrooms.import.file');

    });

    /*********************  ClassroomsMid ********************************/

    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('ClassroomsMid', 'ClassroomMidController');
        Route::post('delete_all', 'ClassroomMidController@delete_all')->name('delete_all');
        Route::post('Filter_Classes', 'ClassroomMidController@Filter_Classes')->name('Filter_Classes');
        Route::get('students/{id}', 'ClassroomMidController@students')->name('Classrooms.students');
        Route::post('classrooms/import/file/{id}', 'ClassroomMidController@importExcel')->name('classrooms.import.file');

    });

    /*********************  ClassroomsSec ********************************/

    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('ClassroomsSec', 'ClassroomSecController');
        Route::post('delete_all', 'ClassroomSecController@delete_all')->name('delete_all');
        Route::post('Filter_Classes', 'ClassroomSecController@Filter_Classes')->name('Filter_Classes');
        Route::get('students/{grade_id}/{class_id}', 'ClassroomSecController@students')->name('Classrooms.students');
        Route::post('classrooms/import/file/{grade_id}/{class_id}', 'ClassroomSecController@importExcel')->name('classrooms.import.file');

    });





    //==============================Sections============================

    Route::group(['namespace' => 'Sections'], function () {

        Route::resource('Sections', 'SectionController');

        Route::get('/classes/{id}', 'SectionController@getclasses');

    });

    //==============================parents============================

    Route::view('add_parent','livewire.show_Form');

    //==============================Teachers============================
    Route::group(['namespace' => 'Teachers'], function () {
        Route::resource('Teachers', 'TeacherController');
    });

    //==============================Students============================
    Route::get('Students/import', 'Students\StudentController@importForm')->name('Students.import');
    Route::post('Students/import/file', 'Students\StudentController@importExcel')->name('Students.import.file');

    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');



        Route::resource('online_classes', 'OnlineClasseController');
        Route::resource('Graduated', 'GraduatedController');
        Route::resource('Promotion', 'PromotionController');
        Route::resource('Fees_Invoices', 'FeesInvoicesController');
        Route::resource('Fees', 'FeesController');
        Route::resource('receipt_students', 'ReceiptStudentsController');
        Route::resource('ProcessingFee', 'ProcessingFeeController');
        Route::resource('Payment_students', 'PaymentController');
        Route::resource('Attendance', 'AttendanceController');
        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');


        Route::get('/Students/problems/{id}', 'StudentController@StudentProblems')->name('Students.problems');
        Route::post('/update_problems/{id}', 'StudentController@updateProblems')->name('updateProblems');


        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
    });

    //==============================subjects============================
    Route::group(['namespace' => 'Subjects'], function () {
        Route::resource('subjects', 'SubjectController');
    });

    //==============================Quizzes============================
    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizzController');
    });

    //==============================questions============================
    Route::group(['namespace' => 'questions'], function () {
        Route::resource('questions', 'QuestionController');
    });
    //==============================programs============================
    Route::group(['namespace' => 'programs'], function () {
        Route::resource('programs', 'programsController');
    });

    //==============================history============================
    Route::group(['namespace' => 'history'], function () {
        Route::resource('history', 'historyController');
    });

    //==============================manger============================
    Route::group(['namespace' => 'manger'], function () {
        Route::resource('manger', 'mangerController');
        Route::get('send','mangerController@send')->name('manger.send');
        Route::post('email','mangerController@email')->name('manger.mail');

    });

    //==============================tameem============================
    Route::group(['namespace' => 'tameem'], function () {
        Route::resource('tameem', 'tameemController');
    });

    //==============================books============================
    Route::group(['namespace' => 'books'], function () {
        Route::resource('books', 'booksController');
        Route::get('books/view/{id}', 'booksController@view')->name('books.view');
        Route::get('books/image/{id}', 'booksController@showImage')->name('books.showImage');
        Route::get('books/download/{id}', 'booksController@download')->name('books.download');



    });


});



