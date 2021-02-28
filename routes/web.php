<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\LessonController;
use App\Http\Controllers\admin\PaymentsController;

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

/**
* Appena si accede al sito, questa e la prima pagina che viene visualizzata.
*/
Route::get('/', function () {
    return view('home');
});


Route::resource('members', 'MemberController');



///////////////////////////////MEMBERS///////////////////////////////

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {

    // Percorsi che richiamano il controller MemberController
    Route::get('members/search', [MemberController::class, 'search'])->name('members.search');
    Route::get('members/addLicense/{memberId}', [MemberController::class, 'addLicense'])->name('members.addLicense');
    Route::post('members/storeLicense', [MemberController::class, 'storeLicense'])->name('members.storeLicense');
    Route::post('members/updateLicense', [MemberController::class, 'updateLicense'])->name('members.updateLicense');
    Route::delete('members/removeLicense/{licenseMemberId}', [MemberController::class, 'removeLicense'])->name('members.removeLicense');
    Route::delete('members/removeMember/{lessonLicenseMemberId}', [MemberController::class, 'removeMember'])->name('members.removeMember');
    Route::get('members/editLessonInscription/{lessonLicenseMemberId}', [MemberController::class, 'editLessonInscription'])->name('members.editLessonInscription');
    Route::get('members/editLicense/{licenseMemberId}', [MemberController::class, 'editLicense'])->name('members.editLicense');
    Route::get('members/getAvailablesLessons', [MemberController::class, 'getAvailablesLessons'])->name('members.getAvailablesLessons');
    Route::post('members/addLesson/{lessonId}', [MemberController::class, 'addLesson'])->name('members.addLesson');
    Route::get('members/show/{id}', [MemberController::class, 'show'])->name('members.show');
    Route::get('members/edit/{id}', [MemberController::class, 'edit'])->name('members.edit');
    Route::delete('members/destroy/{id}', [MemberController::class, 'destroy'])->name('members.destroy');
    Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('members/store', [MemberController::class, 'store'])->name('members.store');
    Route::post('members/update/{id}', [MemberController::class, 'update'])->name('members.update');


    // Percorsi che richiamano il controller LessonController
    Route::get('lessons/search/{type}', [LessonController::class, 'search'])->name('lessons.search');
    Route::get('lessons/create/{idCourse}', [LessonController::class, 'create'])->name('lessons.create');
    Route::get('lessons/index/{type}', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('lessons/getMembers', [LessonController::class, 'getMembers'])->name('lessons.getMembers');
    Route::get('lessons/getMembersDirect', [LessonController::class, 'getMembersDirect'])->name('lessons.getMembersDirect');
    Route::post('lessons/addMember/{licenseMemberId}', [LessonController::class, 'addMember'])->name('lessons.addMember');
    Route::delete('lessons/removeMember/{lessonLicenseMemberId}', [LessonController::class, 'removeMember'])->name('lessons.removeMember');
    Route::post('lessons/editLessonLicenseMember', [LessonController::class, 'editLessonLicenseMember'])->name('lessons.editLessonLicenseMember');
    Route::delete('lessons/removeCourse/{courseId}', [LessonController::class, 'removeCourse'])->name('lessons.removeCourse');

    Route::get('payments/index', [PaymentsController::class, 'index'])->name('payments.index');
    Route::get('payments/search', [PaymentsController::class, 'search'])->name('payments.search');
    
    Route::resource('lessons', 'LessonController', array('except' => array('create', 'index')));
    Route::resource('courses', 'CourseController', array('except' => array('index','show')));
});