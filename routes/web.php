<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/lala', function () {
    return view('calendar.calendar');
});
Route::get('/app', function () {
    return view('layouts.app');
});

Route::get('/todolist', function () {
    return view('todolist.todolist');
});


Route::get('/dailyExpense', function () {
    return view('dailyExpense.dailyExpense');
});

Route::get('/eventCountdown', function () {
    return view('eventCountdown');
});

Route::get('/contactUs', function () {
    return view('contactUs');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

//note
Route::get('/note', function () {
    return view('note.note');
});
Route::get('/notebook',function(){
    return view('notebook');
});

Route::get('/viewNews',function(){
    return view('ViewNews');
});

Route::get('/viewProfile',function(){
    return view('profile');
});

Route::get('/viewProfile',[App\Http\Controllers\UserController::class, 'profile'])->name('viewProfile');

Route::get('/viewProfile/editProfile/{id}',[App\Http\Controllers\UserController::class, 'editProfile'])->name('editProfile');

Route::post('/viewProfile/updateProfile',[App\Http\Controllers\UserController::class, 'updateProfile'])->name('updateProfile');

Route::post('/notebook',[App\Http\Controllers\NotebookController::class, 'store'])->name('storeNotebook');

Route::get('/notebook',[App\Http\Controllers\NotebookController::class, 'show'])->name('showNotebook');

Route::get('/notebook/remove/{id}', [App\Http\Controllers\NotebookController::class, 'removeNotebook'])->name('removeNotebook');

Route::get('/notebook/{id}',[App\Http\Controllers\NotebookController::class, 'openNote'])->name('openNote');

Route::get('/notebook/edit/{id}',[App\Http\Controllers\NotebookController::class, 'editNotebook'])->name('editNotebook');

Route::post('/notebook/update',[App\Http\Controllers\NotebookController::class, 'updateNotebook'])->name('updateNotebook');

Route::post('/notebook/note',[App\Http\Controllers\NoteController::class, 'store'])->name('storeNote');

Route::get('/notebook/note',[App\Http\Controllers\NoteController::class, 'showNote'])->name('showNote');

Route::get('/notebook/note/remove/{id}', [App\Http\Controllers\NoteController::class, 'removeNote'])->name('removeNote');

Route::get('/notebook/note/detail/{id}', [App\Http\Controllers\NoteController::class, 'showNoteDetail'])->name('showNoteDetail');

Route::get('/notebook/note/edit/{id}',[App\Http\Controllers\NoteController::class, 'editNote'])->name('editNote');

Route::post('/notebook/note/update',[App\Http\Controllers\NoteController::class, 'updateNote'])->name('updateNote');

Route::post('/notebook/note/upload',[App\Http\Controllers\NoteController::class, 'uploadPhoto'])->name('note.imageUpload');

//admin
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/home',[App\Http\Controllers\HomeController::class,'index1']);

    Route::get('/home',[App\Http\Controllers\adminHomeController::class, 'adminHome'])->name('adminHome');

    Route::get('/user/edit',[App\Http\Controllers\UserController::class, 'edit'])->name('usernameEdit');

    Route::put('/user/update',[App\Http\Controllers\UserController::class, 'update'])->name('usernameUpdate');

    Route::get('/admin/user-list',[App\Http\Controllers\UserController::class, 'showUser'])->name('userList');

    Route::post('/admin/user-list/search',[App\Http\Controllers\UserController::class, 'userSearch'])->name('userSearch');

    Route::get('/admin/user-list/remove/User/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/admin/admin-list',[App\Http\Controllers\UserController::class, 'showAdmin'])->name('adminList');

    Route::post('/admin/admin-list/search',[App\Http\Controllers\UserController::class, 'adminSearch'])->name('adminSearch');

    Route::get('/admin/admin-list/remove/User/{id}', [App\Http\Controllers\UserController::class, 'deleteAdmin'])->name('deleteAdmin');

    Route::get('/admin/viewfeedback',[App\Http\Controllers\FeedbackController::class, 'view'])->name('viewFeedback');

    Route::get('/admin/deleteFeedback/{id}', [App\Http\Controllers\FeedbackController::class, 'deleteFeedback'])->name('deleteFeedback');

    Route::post('/admin/viewfeedback/search',[App\Http\Controllers\FeedbackController::class, 'search'])->name('searchFeedback');

    Route::post('/news/addNews',[App\Http\Controllers\NewsController::class,'addNews'])->name('addNews');

    Route::get('/news/viewNews',[App\Http\Controllers\NewsController::class, 'view'])->name('viewNews');

    Route::get('/news/deleteFeedback/{id}', [App\Http\Controllers\NewsController::class, 'deleteNews'])->name('deleteNews');

    Route::get('/news/editNews/{id}',[App\Http\Controllers\NewsController::class,'editNews'])->name('editNews');

    Route::post('/news/updateNews',[App\Http\Controllers\NewsController::class,'updateNews'])->name('updateNews');

    Route::post('/news/search',[App\Http\Controllers\NewsController::class, 'search'])->name('search');

    // Route::post('/admin/user-feedback/search',[App\Http\Controllers\FeedbackController::class, 'search'])->name('search');

    Route::get('/news/feedback/{id}',[App\Http\Controllers\FeedbackController::class,'feedbackID'])->name('feedbackID');

    Route::post('/news/replyFeedback',[App\Http\Controllers\FeedbackController::class,'replyFeedback'])->name('replyFeedback');

});



//calendar
Route::get('/', [App\Http\Controllers\CalendarController::class, 'add'])->name('addCalendar');

Route::post('/calendar', [App\Http\Controllers\CalendarController::class, 'store'])->name('storeCalendar');

Route::patch('/calendar/update/{id}', [App\Http\Controllers\CalendarController::class, 'update'])->name('updateCalendar');

Route::delete('/calendar/delete/{id}', [App\Http\Controllers\CalendarController::class, 'delete'])->name('deleteCalendar');

//MonthlyGoal

Route::post('/addMonthlyGoal', [App\Http\Controllers\GoalController::class,'add'])->name('addGoal');

Route::get('/monthlyGoal/deleteGoal/{id}', [App\Http\Controllers\GoalController::class,'deleteGoal'])->name('deleteGoal');

Route::get('/monthlyGoal/clearGoal', [App\Http\Controllers\GoalController::class,'clearJanGoal'])->name('clearJanGoal');

Route::post('/addMonthlyfebGoal', [App\Http\Controllers\GoalController::class,'add2'])->name('addfebGoal');

Route::get('/monthlyGoal/deletefebGoal/{id}', [App\Http\Controllers\GoalController::class,'deletefebGoal'])->name('deletefebGoal');

Route::get('/monthlyGoal/clearfebGoal', [App\Http\Controllers\GoalController::class,'clearFebGoal'])->name('clearFebGoal');

Route::post('/addMonthlymarGoal', [App\Http\Controllers\GoalController::class,'add3'])->name('addmarGoal');

Route::get('/monthlyGoal/deletemarGoal/{id}', [App\Http\Controllers\GoalController::class,'deletemarGoal'])->name('deletemarGoal');

Route::get('/monthlyGoal/clearMarGoal', [App\Http\Controllers\GoalController::class,'clearMarGoal'])->name('clearMarGoal');

Route::post('/addMonthlyaprilGoal', [App\Http\Controllers\GoalController::class,'add4'])->name('addaprilGoal');

Route::get('/monthlyGoal/deleteaprilGoal/{id}', [App\Http\Controllers\GoalController::class,'deleteaprilGoal'])->name('deleteaprilGoal');

Route::get('/monthlyGoal/clearAprGoal', [App\Http\Controllers\GoalController::class,'clearAprGoal'])->name('clearAprGoal');

Route::post('/addMonthlymayGoal', [App\Http\Controllers\GoalController::class,'add5'])->name('addmayGoal');

Route::get('/monthlyGoal/deletemayGoal/{id}', [App\Http\Controllers\GoalController::class,'deletemayGoal'])->name('deletemayGoal');

Route::get('/monthlyGoal/clearMayGoal', [App\Http\Controllers\GoalController::class,'clearMayGoal'])->name('clearMayGoal');

Route::post('/addMonthlyjuneGoal', [App\Http\Controllers\GoalController::class,'add6'])->name('addjuneGoal');

Route::get('/monthlyGoal/deletejuneGoal/{id}', [App\Http\Controllers\GoalController::class,'deletejuneGoal'])->name('deletejuneGoal');

Route::get('/monthlyGoal/clearJunGoal', [App\Http\Controllers\GoalController::class,'clearJunGoal'])->name('clearJunGoal');

Route::post('/addMonthlyjulyGoal', [App\Http\Controllers\GoalController::class,'add7'])->name('addjulyGoal');

Route::get('/monthlyGoal/deletejulyGoal/{id}', [App\Http\Controllers\GoalController::class,'deletejulyGoal'])->name('deletejulyGoal');

Route::get('/monthlyGoal/clearJulGoal', [App\Http\Controllers\GoalController::class,'clearJulGoal'])->name('clearJulGoal');

Route::post('/addMonthlyauGoal', [App\Http\Controllers\GoalController::class,'add8'])->name('addauGoal');

Route::get('/monthlyGoal/deleteauGoal/{id}', [App\Http\Controllers\GoalController::class,'deleteauGoal'])->name('deleteauGoal');

Route::get('/monthlyGoal/clearAugGoal', [App\Http\Controllers\GoalController::class,'clearAugGoal'])->name('clearAugGoal');

Route::post('/addMonthlysepGoal', [App\Http\Controllers\GoalController::class,'add9'])->name('addsepGoal');

Route::get('/monthlyGoal/deletesepGoal/{id}', [App\Http\Controllers\GoalController::class,'deletesepGoal'])->name('deletesepGoal');

Route::get('/monthlyGoal/clearSepGoal', [App\Http\Controllers\GoalController::class,'clearSepGoal'])->name('clearSepGoal');

Route::post('/addMonthlyocGoal', [App\Http\Controllers\GoalController::class,'add10'])->name('addocGoal');

Route::get('/monthlyGoal/deleteocGoal/{id}', [App\Http\Controllers\GoalController::class,'deleteocGoal'])->name('deleteocGoal');

Route::get('/monthlyGoal/clearOctGoal', [App\Http\Controllers\GoalController::class,'clearOctGoal'])->name('clearOctGoal');

Route::post('/addMonthlynovGoal', [App\Http\Controllers\GoalController::class,'add11'])->name('addnovGoal');

Route::get('/monthlyGoal/deletenovGoal/{id}', [App\Http\Controllers\GoalController::class,'deletenovGoal'])->name('deletenovGoal');

Route::get('/monthlyGoal/clearNovGoal', [App\Http\Controllers\GoalController::class,'clearNovGoal'])->name('clearNovGoal');

Route::post('/addMonthlydecGoal', [App\Http\Controllers\GoalController::class,'add12'])->name('adddecGoal');

Route::get('/monthlyGoal/deletedecGoal/{id}', [App\Http\Controllers\GoalController::class,'deletedecGoal'])->name('deletedecGoal');

Route::get('/monthlyGoal/clearDecGoal', [App\Http\Controllers\GoalController::class,'clearDecGoal'])->name('clearDecGoal');

Route::post('/addMonthlycomGoal', [App\Http\Controllers\GoalController::class,'tick'])->name('addcomGoal');

Route::post('/addMonthlyfebcomGoal', [App\Http\Controllers\GoalController::class,'tick2'])->name('addfebcomGoal');

Route::post('/addMonthlymarcomGoal', [App\Http\Controllers\GoalController::class,'tick3'])->name('addmarcomGoal');

Route::post('/addMonthlyaprilcomGoal', [App\Http\Controllers\GoalController::class,'tick4'])->name('addaprilcomGoal');

Route::post('/addMonthlymaycomGoal', [App\Http\Controllers\GoalController::class,'tick5'])->name('addmaycomGoal');

Route::post('/addMonthlyjunecomGoal', [App\Http\Controllers\GoalController::class,'tick6'])->name('addjunecomGoal');

Route::post('/addMonthlyjulycomGoal', [App\Http\Controllers\GoalController::class,'tick7'])->name('addjulycomGoal');

Route::post('/addMonthlyaucomGoal', [App\Http\Controllers\GoalController::class,'tick8'])->name('addaucomGoal');

Route::post('/addMonthlysepcomGoal', [App\Http\Controllers\GoalController::class,'tick9'])->name('addsepcomGoal');

Route::post('/addMonthlyoccomGoal', [App\Http\Controllers\GoalController::class,'tick10'])->name('addoccomGoal');

Route::post('/addMonthlynovcomGoal', [App\Http\Controllers\GoalController::class,'tick11'])->name('addnovcomGoal');

Route::post('/addMonthlydeccomGoal', [App\Http\Controllers\GoalController::class,'tick12'])->name('adddeccomGoal');

// Route::get('/', [App\Http\Controllers\GoalController::class,'view'])->name('calendar');


//Daily Expenses
Route::post('/dailyExpense/exp', [App\Http\Controllers\ExpensesController::class,'addExpense'])->name('addDailyExpenses');

Route::get('/dailyExpense', [App\Http\Controllers\ExpensesController::class,'view'])->name('dailyExpenses1');

Route::post('/dailyExpense/inc', [App\Http\Controllers\ExpensesController::class,'addIncome'])->name('addDailyIncomes');

Route::get('/dailyExpense/deleteExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deleteExpense'])->name('deleteExp');

Route::get('/dailyExpense/deleteIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deleteIncome'])->name('deleteInc');

// feb
Route::post('/dailyExpense/febexp', [App\Http\Controllers\ExpensesController::class,'addfebExpense'])->name('addfebExpenses');

Route::get('/dailyExpense/feb', [App\Http\Controllers\ExpensesController::class,'viewfeb'])->name('dailyExpenses2');

Route::post('/dailyExpense/febinc', [App\Http\Controllers\ExpensesController::class,'addfebIncome'])->name('addfebIncomes');

Route::get('/dailyExpense/deletefebExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deletefebExpense'])->name('deletefebExp');

Route::get('/dailyExpense/deletefebIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deletefebIncome'])->name('deletefebInc');
// feb

// mar
Route::post('/dailyExpense/marexp', [App\Http\Controllers\ExpensesController::class,'addmarExpense'])->name('addmarExpenses');

Route::get('/dailyExpense/mar', [App\Http\Controllers\ExpensesController::class,'viewmar'])->name('dailyExpenses3');

Route::post('/dailyExpense/marinc', [App\Http\Controllers\ExpensesController::class,'addmarIncome'])->name('addmarIncomes');

Route::get('/dailyExpense/deletemarExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deletemarExpense'])->name('deletemarExp');

Route::get('/dailyExpense/deletemarIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deletemarIncome'])->name('deletemarInc');
// mar

// apr
Route::post('/dailyExpense/aprexp', [App\Http\Controllers\ExpensesController::class,'addaprExpense'])->name('addaprExpenses');

Route::get('/dailyExpense/apr', [App\Http\Controllers\ExpensesController::class,'viewapr'])->name('dailyExpenses4');

Route::post('/dailyExpense/aprinc', [App\Http\Controllers\ExpensesController::class,'addaprIncome'])->name('addaprIncomes');

Route::get('/dailyExpense/deleteaprExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deleteaprExpense'])->name('deleteaprExp');

Route::get('/dailyExpense/deleteaprIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deleteaprIncome'])->name('deleteaprInc');
// apr

//may
Route::post('/dailyExpense/mayexp', [App\Http\Controllers\ExpensesController::class,'addmayExpense'])->name('addmayExpenses');

Route::get('/dailyExpense/may', [App\Http\Controllers\ExpensesController::class,'viewmay'])->name('dailyExpenses5');

Route::post('/dailyExpense/mayinc', [App\Http\Controllers\ExpensesController::class,'addmayIncome'])->name('addmayIncomes');

Route::get('/dailyExpense/deletemayExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deletemayExpense'])->name('deletemayExp');

Route::get('/dailyExpense/deletemayIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deletemayIncome'])->name('deletemayInc');
//may

//june
Route::post('/dailyExpense/junexp', [App\Http\Controllers\ExpensesController::class,'addjunExpense'])->name('addjunExpenses');

Route::get('/dailyExpense/jun', [App\Http\Controllers\ExpensesController::class,'viewjun'])->name('dailyExpenses6');

Route::post('/dailyExpense/juninc', [App\Http\Controllers\ExpensesController::class,'addjunIncome'])->name('addjunIncomes');

Route::get('/dailyExpense/deletejunExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deletejunExpense'])->name('deletejunExp');

Route::get('/dailyExpense/deletejunIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deletejunIncome'])->name('deletejunInc');
//june

//jul
Route::post('/dailyExpense/julexp', [App\Http\Controllers\ExpensesController::class,'addjulExpense'])->name('addjulExpenses');

Route::get('/dailyExpense/jul', [App\Http\Controllers\ExpensesController::class,'viewjul'])->name('dailyExpenses7');

Route::post('/dailyExpense/julinc', [App\Http\Controllers\ExpensesController::class,'addjulIncome'])->name('addjulIncomes');

Route::get('/dailyExpense/deletejulExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deletejulExpense'])->name('deletejulExp');

Route::get('/dailyExpense/deletejulIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deletejulIncome'])->name('deletejulInc');
//jul

//aug
Route::post('/dailyExpense/augexp', [App\Http\Controllers\ExpensesController::class,'addaugExpense'])->name('addaugExpenses');

Route::get('/dailyExpense/aug', [App\Http\Controllers\ExpensesController::class,'viewaug'])->name('dailyExpenses8');

Route::post('/dailyExpense/auginc', [App\Http\Controllers\ExpensesController::class,'addaugIncome'])->name('addaugIncomes');

Route::get('/dailyExpense/deleteaugExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deleteaugExpense'])->name('deleteaugExp');

Route::get('/dailyExpense/deleteaugIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deleteaugIncome'])->name('deleteaugInc');
//aug

//sep
Route::post('/dailyExpense/sepexp', [App\Http\Controllers\ExpensesController::class,'addsepExpense'])->name('addsepExpenses');

Route::get('/dailyExpense/sep', [App\Http\Controllers\ExpensesController::class,'viewsep'])->name('dailyExpenses9');

Route::post('/dailyExpense/sepinc', [App\Http\Controllers\ExpensesController::class,'addsepIncome'])->name('addsepIncomes');

Route::get('/dailyExpense/deletesepExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deletesepExpense'])->name('deletesepExp');

Route::get('/dailyExpense/deletesepIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deletesepIncome'])->name('deletesepInc');
//sep

//oct
Route::post('/dailyExpense/octexp', [App\Http\Controllers\ExpensesController::class,'addoctExpense'])->name('addoctExpenses');

Route::get('/dailyExpense/oct', [App\Http\Controllers\ExpensesController::class,'viewoct'])->name('dailyExpenses10');

Route::post('/dailyExpense/octinc', [App\Http\Controllers\ExpensesController::class,'addoctIncome'])->name('addoctIncomes');

Route::get('/dailyExpense/deleteoctExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deleteoctExpense'])->name('deleteoctExp');

Route::get('/dailyExpense/deleteoctIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deleteoctIncome'])->name('deleteoctInc');
//oct

//nov
Route::post('/dailyExpense/novexp', [App\Http\Controllers\ExpensesController::class,'addnovExpense'])->name('addnovExpenses');

Route::get('/dailyExpense/nov', [App\Http\Controllers\ExpensesController::class,'viewnov'])->name('dailyExpenses11');

Route::post('/dailyExpense/novinc', [App\Http\Controllers\ExpensesController::class,'addnovIncome'])->name('addnovIncomes');

Route::get('/dailyExpense/deletenovExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deletenovExpense'])->name('deletenovExp');

Route::get('/dailyExpense/deletenovIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deletenovIncome'])->name('deletenovInc');
//nov

//dec
Route::post('/dailyExpense/decexp', [App\Http\Controllers\ExpensesController::class,'adddecExpense'])->name('adddecExpenses');

Route::get('/dailyExpense/dec', [App\Http\Controllers\ExpensesController::class,'viewdec'])->name('dailyExpenses12');

Route::post('/dailyExpense/decinc', [App\Http\Controllers\ExpensesController::class,'adddecIncome'])->name('adddecIncomes');

Route::get('/dailyExpense/deletedecExpense/{id}', [App\Http\Controllers\ExpensesController::class,'deletedecExpense'])->name('deletedecExp');

Route::get('/dailyExpense/deletedecIncome/{id}', [App\Http\Controllers\ExpensesController::class,'deletedecIncome'])->name('deletedecInc');
//dec

//Jan edit
Route::get('/dailyExpense/editExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editExpense'])->name('editExpense');

Route::post('/dailyExpense/updateExpense',[App\Http\Controllers\ExpensesController::class,'updateExpense'])->name('updateExpense');

Route::get('/dailyExpense/editIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editIncome'])->name('editIncome');

Route::post('/dailyExpense/updateIncome',[App\Http\Controllers\ExpensesController::class,'updateIncome'])->name('updateIncome');
//Jan edit

//feb edit
Route::get('/dailyExpense/editfebExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editfebExpense'])->name('editfebExpense');

Route::post('/dailyExpense/updatefebExpense',[App\Http\Controllers\ExpensesController::class,'updatefebExpense'])->name('updatefebExpense');

Route::get('/dailyExpense/editfebIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editfebIncome'])->name('editfebIncome');

Route::post('/dailyExpense/updatefebIncome',[App\Http\Controllers\ExpensesController::class,'updatefebIncome'])->name('updatefebIncome');
//feb edit

//mar edit
Route::get('/dailyExpense/editmarExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editmarExpense'])->name('editmarExpense');

Route::post('/dailyExpense/updatemarExpense',[App\Http\Controllers\ExpensesController::class,'updatemarExpense'])->name('updatemarExpense');

Route::get('/dailyExpense/editmarIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editmarIncome'])->name('editmarIncome');

Route::post('/dailyExpense/updatemarIncome',[App\Http\Controllers\ExpensesController::class,'updatemarIncome'])->name('updatemarIncome');
//mar edit

//apr edit
Route::get('/dailyExpense/editaprExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editaprExpense'])->name('editaprExpense');

Route::post('/dailyExpense/updateaprExpense',[App\Http\Controllers\ExpensesController::class,'updateaprExpense'])->name('updateaprExpense');

Route::get('/dailyExpense/editaprIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editaprIncome'])->name('editaprIncome');

Route::post('/dailyExpense/updateaprIncome',[App\Http\Controllers\ExpensesController::class,'updateaprIncome'])->name('updateaprIncome');
//apr edit

//may edit
Route::get('/dailyExpense/editmayExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editmayExpense'])->name('editmayExpense');

Route::post('/dailyExpense/updatemayExpense',[App\Http\Controllers\ExpensesController::class,'updatemayExpense'])->name('updatemayExpense');

Route::get('/dailyExpense/editmayIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editmayIncome'])->name('editmayIncome');

Route::post('/dailyExpense/updatemayIncome',[App\Http\Controllers\ExpensesController::class,'updatemayIncome'])->name('updatemayIncome');
//may edit

//jun edit
Route::get('/dailyExpense/editjunExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editjunExpense'])->name('editjunExpense');

Route::post('/dailyExpense/updatejunExpense',[App\Http\Controllers\ExpensesController::class,'updatejunExpense'])->name('updatejunExpense');

Route::get('/dailyExpense/editjunIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editjunIncome'])->name('editjunIncome');

Route::post('/dailyExpense/updatejunIncome',[App\Http\Controllers\ExpensesController::class,'updatejunIncome'])->name('updatejunIncome');
//jun edit

//jul edit
Route::get('/dailyExpense/editjulExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editjulExpense'])->name('editjulExpense');

Route::post('/dailyExpense/updatejulExpense',[App\Http\Controllers\ExpensesController::class,'updatejulExpense'])->name('updatejulExpense');

Route::get('/dailyExpense/editjulIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editjulIncome'])->name('editjulIncome');

Route::post('/dailyExpense/updatejulIncome',[App\Http\Controllers\ExpensesController::class,'updatejulIncome'])->name('updatejulIncome');
//jul edit

//aug edit
Route::get('/dailyExpense/editaugExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editaugExpense'])->name('editaugExpense');

Route::post('/dailyExpense/updateaugExpense',[App\Http\Controllers\ExpensesController::class,'updateaugExpense'])->name('updateaugExpense');

Route::get('/dailyExpense/editaugIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editaugIncome'])->name('editaugIncome');

Route::post('/dailyExpense/updateaugIncome',[App\Http\Controllers\ExpensesController::class,'updateaugIncome'])->name('updateaugIncome');
//aug edit

//sep edit
Route::get('/dailyExpense/editsepExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editsepExpense'])->name('editsepExpense');

Route::post('/dailyExpense/updatesepExpense',[App\Http\Controllers\ExpensesController::class,'updatesepExpense'])->name('updatesepExpense');

Route::get('/dailyExpense/editsepIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editsepIncome'])->name('editsepIncome');

Route::post('/dailyExpense/updatesepIncome',[App\Http\Controllers\ExpensesController::class,'updatesepIncome'])->name('updatesepIncome');
//sep edit

//oct edit
Route::get('/dailyExpense/editoctExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editoctExpense'])->name('editoctExpense');

Route::post('/dailyExpense/updateoctExpense',[App\Http\Controllers\ExpensesController::class,'updateoctExpense'])->name('updateoctExpense');

Route::get('/dailyExpense/editoctIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editoctIncome'])->name('editoctIncome');

Route::post('/dailyExpense/updateoctIncome',[App\Http\Controllers\ExpensesController::class,'updateoctIncome'])->name('updateoctIncome');
//oct edit

//nov edit
Route::get('/dailyExpense/editnovExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editnovExpense'])->name('editnovExpense');

Route::post('/dailyExpense/updatenovExpense',[App\Http\Controllers\ExpensesController::class,'updatenovExpense'])->name('updatenovExpense');

Route::get('/dailyExpense/editnovIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editnovIncome'])->name('editnovIncome');

Route::post('/dailyExpense/updatenovIncome',[App\Http\Controllers\ExpensesController::class,'updatenovIncome'])->name('updatenovIncome');
//nov edit

//dec edit
Route::get('/dailyExpense/editdecExpense/{id}',[App\Http\Controllers\ExpensesController::class,'editdecExpense'])->name('editdecExpense');

Route::post('/dailyExpense/updatedecExpense',[App\Http\Controllers\ExpensesController::class,'updatedecExpense'])->name('updatedecExpense');

Route::get('/dailyExpense/editdecIncome/{id}',[App\Http\Controllers\ExpensesController::class,'editdecIncome'])->name('editdecIncome');

Route::post('/dailyExpense/updatedecIncome',[App\Http\Controllers\ExpensesController::class,'updatedecIncome'])->name('updatedecIncome');
//dec edit

//ToDoList

Route::post('/todolist/addHighPriority',[App\Http\Controllers\TodolistController::class,'addHighPriority'])->name('addHighPriority');

Route::post('/todolist/addMediumPriority',[App\Http\Controllers\TodolistController::class,'addMediumPriority'])->name('addMediumPriority');

Route::post('/todolist/addLowPriority',[App\Http\Controllers\TodolistController::class,'addLowPriority'])->name('addLowPriority');

Route::get('/todolist', [App\Http\Controllers\TodolistController::class,'view1'])->name('todolist');

Route::get('/viewProfile', [App\Http\Controllers\TodolistController::class,'view2'])->name('todolistprofile');
//clear all
Route::get('/todolist/clearAllHigh', [App\Http\Controllers\TodolistController::class,'clearAllHigh'])->name('clearAllHigh');

Route::get('/todolist/clearAllMedium', [App\Http\Controllers\TodolistController::class,'clearAllMedium'])->name('clearAllMedium');

Route::get('/todolist/clearAllLow', [App\Http\Controllers\TodolistController::class,'clearAllLow'])->name('clearAllLow');
//clear all
Route::get('/todolist/deleteHigh/{id}', [App\Http\Controllers\TodolistController::class,'deleteHigh'])->name('deleteHigh');

Route::get('/todolist/deleteMedium/{id}', [App\Http\Controllers\TodolistController::class,'deleteMedium'])->name('deleteMedium');

Route::get('/todolist/deleteLow/{id}', [App\Http\Controllers\TodolistController::class,'deleteLow'])->name('deleteLow');

Route::post('/todolist/tickHigh',[App\Http\Controllers\TodolistController::class,'tickHigh'])->name('tickHigh');

Route::post('/todolist/tickMedium',[App\Http\Controllers\TodolistController::class,'tickMedium'])->name('tickMedium');

Route::post('/todolist/tickLow',[App\Http\Controllers\TodolistController::class,'tickLow'])->name('tickLow');

Route::get('/todolist/editHighTask/{id}',[App\Http\Controllers\TodolistController::class,'editHighTask'])->name('editHighTask');

Route::post('/todolist/updateHighTask',[App\Http\Controllers\TodolistController::class,'updateHighTask'])->name('updateHighTask');

Route::get('/todolist/editMediumTask/{id}',[App\Http\Controllers\TodolistController::class,'editMediumTask'])->name('editMediumTask');

Route::post('/todolist/updateMediumTask',[App\Http\Controllers\TodolistController::class,'updateMediumTask'])->name('updateMediumTask');

Route::get('/todolist/editLowTask/{id}',[App\Http\Controllers\TodolistController::class,'editLowTask'])->name('editLowTask');

Route::post('/todolist/updateLowTask',[App\Http\Controllers\TodolistController::class,'updateLowTask'])->name('updateLowTask');

//EventCountdownTool

Route::get('/eventCountdown', [App\Http\Controllers\EventCountdownToolController::class,'viewCoundown'])->name('eventCountdown');

Route::post('/eventCountdown/addcountDownEvent',[App\Http\Controllers\EventCountdownToolController::class,'addcountDownEvent'])->name('addcountDownEvent');

Route::get('/eventCountdown/deleteEvent/{id}', [App\Http\Controllers\EventCountdownToolController::class,'deleteCountdownEvent'])->name('deleteCountdownEvent');

Route::get('/eventCountdown/editEvent/{id}',[App\Http\Controllers\EventCountdownToolController::class,'editCountdownEvent'])->name('editCountdownEvent');

Route::post('/eventCountdown/updateEvent',[App\Http\Controllers\EventCountdownToolController::class,'updateCountdownEvent'])->name('updateCountdownEvent');

// Route::post('/eventCountdown/update-timer', [App\Http\Controllers\EventCountdownToolController::class, 'updateTimer'])->name('updateTimer');

// Route::get('/eventCountdown/view-timer', [CountdownTimerController::class, 'view']);

//Feedback 

Route::post('/contactUs/addFeedback',[App\Http\Controllers\FeedbackController::class,'addFeedback'])->name('addFeedback');

// News 

Route::get('/viewNews',[App\Http\Controllers\NewsController::class, 'showToUser'])->name('userViewNews');

Route::get('/viewReplies',[App\Http\Controllers\FeedbackController::class, 'viewReply'])->name('viewReplies');

Route::get('/feedback/viewReplyDetails/{id}',[App\Http\Controllers\FeedbackController::class,'viewReplyDetails'])->name('viewReplyDetails');