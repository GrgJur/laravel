<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\LessonController;
use App\Http\Controllers\admin\PaymentsController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\StatisticsController;
use App\Http\Controllers\admin\SchoolsController;
use App\Http\Controllers\admin\ChatController as AdminChatController;
use App\Http\Controllers\admin\AuthenticationController as AdminAuthenticationController;
use App\Http\Controllers\Client\AuthenticationController as ClientAuthenticationController;
use App\Http\Controllers\Client\ChatController;
use App\Http\Controllers\Client\LessonController as ClientLessonController;

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
    return view('admin.authentication.login');
});

Route::get('/homepage/index', function () {
    return view('home');
})->name('homepage.index');


///////////////////////////////MEMBERS///////////////////////////////

Route::group(['prefix' => 'admin'], function () {

    Route::resource('members', MemberController::class);

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
    Route::get('payments/create', [PaymentsController::class, 'create'])->name('payments.create');
    Route::post('members/store', [PaymentsController::class, 'store'])->name('payments.store');
    Route::get('payments/details/{id}', [PaymentsController::class, 'details'])->name('payments.details');
    Route::get('payments/edit/{id}', [PaymentsController::class, 'edit'])->name('payments.edit');
    Route::post('payments/udpdate/{id}', [PaymentsController::class, 'update'])->name('payments.update');
    Route::delete('payments/destroy/{id}', [PaymentsController::class, 'destroy'])->name('payments.destroy');

    Route::get('statistics/index', [StatisticsController::class, 'index'])->name('statistics.index');
    Route::post('statistics/show', [StatisticsController::class, 'show'])->name('statistics.show');

    Route::get('schools/index', [SchoolsController::class, 'index'])->name('schools.index');
    Route::get('schools/school/{id}', [SchoolsController::class, 'school'])->name('schools.school');

    Route::resource('lessons', LessonController::class)->except([
        'create', 'index'
    ]);

    Route::resource('courses', CourseController::class)->except([
        'show', 'index'
    ]);

    Route::get('login', [AdminAuthenticationController::class, 'show'])->name('admin.login');
    Route::post('login', [AdminAuthenticationController::class, 'store']);

    Route::view('home', 'home')->middleware('auth:sanctum');

    Route::get('messages/chat', [AdminChatController::class, 'index'])->name('messages.chat')->middleware('auth:sanctum');
    Route::post('messages/store', [AdminChatController::class, 'store'])->name('client.store')->middleware('auth:sanctum');

    Route::get('members/chat', [AdminChatController::class, 'members'])->middleware('auth:sanctum');

    Route::get('destroy', [AdminAuthenticationController::class, 'destroy'])->name('admin.logout');

});

Route::group(['prefix' => 'client'], function () {

    Route::get('login', [ClientAuthenticationController::class, 'show'])->name('client.login');//->middleware('guest');
    Route::post('login', [ClientAuthenticationController::class, 'store']);//->middleware('guest');

    Route::view('home', 'client.home')->middleware('auth:sanctum');
    Route::get('homepage/index', [ClientAuthenticationController::class, 'homepage'])->name('client.home');

    // protetto
    Route::get('messages', [ChatController::class, 'index'])->name('client.index')->middleware('auth:sanctum');
    Route::post('messages/store', [ChatController::class, 'store'])->name('client.store')->middleware('auth:sanctum');

    Route::get('instructors', [ChatController::class, 'instructors'])->middleware('auth:sanctum');

    Route::get('destroy', [ClientAuthenticationController::class, 'destroy'])->name('client.logout');

    Route::get('lessons/index/{type}', [ClientLessonController::class, 'index'])->name('client.lessons');

    Route::resource('lessons', ClientLessonController::class)->except([
        'create', 'index'
    ]);

});
