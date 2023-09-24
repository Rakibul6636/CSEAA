<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;

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



Auth::routes();

//Route::post('/condolence','App\Http\Controllers\PagesController@condolence')->name('condolence');
Route::post('/follow/{user}','App\Http\Controllers\FollowsController@store');
Route::get('/index', 'App\Http\Controllers\ProfilesController@index');
// Route::get('/p/create','App\Http\Controllers\PostsController@create');
// Route::post('/p','App\Http\Controllers\PostsController@store');
// Route::get('/p/{post}','App\Http\Controllers\PostsController@show');
//Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
//Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');
//Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update')->name('profile.update');

Auth::routes();
Route::get('/', [App\Http\Controllers\PagesController::class, 'welcome']);
//Route::get('/index', [App\Http\Controllers\ProfilesController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/condolence', [App\Http\Controllers\PagesController::class, 'condolence'])->name('condolence');
Route::get('/ourMission', [App\Http\Controllers\PagesController::class, 'ourMission'])->name('ourMission');
Route::get('/constitutions', [App\Http\Controllers\PagesController::class, 'constitutions'])->name('constitutions');
Route::get('/management', [App\Http\Controllers\PagesController::class, 'management'])->name('management');
Route::get('/upcomingEvent', [App\Http\Controllers\PagesController::class, 'upcomingEvent'])->name('upcomingEvent');
Route::get('/pastEvent', [App\Http\Controllers\PagesController::class, 'pastEvent'])->name('pastEvent');
Route::get('/notice', [App\Http\Controllers\PagesController::class, 'notice'])->name('notice');
Route::get('/journal', [App\Http\Controllers\PagesController::class, 'journal'])->name('journal');
Route::get('/articles', [App\Http\Controllers\PagesController::class, 'articles'])->name('articles');
Route::get('/others', [App\Http\Controllers\PagesController::class, 'others'])->name('others');
Route::get('/gallery', [App\Http\Controllers\PagesController::class, 'gallery'])->name('gallery');
Route::get('/scholarship', [App\Http\Controllers\PagesController::class, 'scholarship'])->name('scholarship');
Route::get('/sponsor', [App\Http\Controllers\PagesController::class, 'sponsor'])->name('sponsor');
Route::get('/members', [App\Http\Controllers\MembersController::class, 'members'])->name('members');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::get('/test', [App\Http\Controllers\PagesController::class, 'test'])->name('test');
Route::get('/livesearch', [App\Http\Controllers\MembersController::class, 'membersData'])->name('getMembers');
Route::get('/contact/guest', 'App\Http\Controllers\webContentController@storeMessage')->name('message.guest');
Route::get('/article/{articleshow}','App\Http\Controllers\ArticlesController@show')->name('article.show');

//Route::get('/article/{post}','App\Http\Controllers\ArticlesController@show')->name('article.show');



Route::get('storage/{file_name}','App\Http\Controllers\DownloadController@downloadFile');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['PendingApproved'])->group(function () {
    Route::get('/approval', 'App\Http\Controllers\HomeController@approval')->name('approval');
    });
    Route::middleware(['approved'])->group(function () {
        Route::get('/index', [App\Http\Controllers\ProfilesController::class, 'index'])->name('index');
        Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
        Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile.show');
        Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update')->name('profile.update');
        Route::get('/profileedit/{user}', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');
        Route::get('/p/create','App\Http\Controllers\PostsController@create');
        Route::post('/p','App\Http\Controllers\PostsController@store');
        Route::get('/p/{post}','App\Http\Controllers\PostsController@show');
        Route::get('/donation','App\Http\Controllers\PayController@payPage')->name('donation.create');
        Route::post('/donation/make', 'App\Http\Controllers\PayController@makePayment')->name('donation.make');
        Route::post('/donation/inBetween', 'App\Http\Controllers\PayController@donationReportBetween')->name('report.between');
        Route::get('/donation/report','App\Http\Controllers\PayController@donationReport')->name('donation.report');
        Route::get('/donationreport/generate', 'App\Http\Controllers\PayController@donationReportGenerate')->name('donation.report.generate');
        Route::get('/pdfview',array('as'=>'pdfview','uses'=>'App\Http\Controllers\DownloadController@pdfview'))->name('pdfview.download');
        Route::get('/connection/list','App\Http\Controllers\UserController@connectionList')->name('connection.list');
        Route::get('/pdfIncome',array('as'=>'pdfIncome','uses'=>'App\Http\Controllers\DownloadController@pdfIncome'))->name('pdfIncome.download');
        Route::get('/pdfExpense',array('as'=>'pdfExpense','uses'=>'App\Http\Controllers\DownloadController@pdfExpense'))->name('pdfExpense.download');
        Route::get('/pdfAll',array('as'=>'pdfAll','uses'=>'App\Http\Controllers\DownloadController@pdfAll'))->name('pdfAll.download');
        Route::get('/post/{id}/delete', 'App\Http\Controllers\PostsController@deletePost')->name('post.delete');

    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', 'App\Http\Controllers\ArticlesController@dashboard')->name('admin.web.dashboard');
        Route::post('/admin/post', 'App\Http\Controllers\ArticlesController@postContent')->name('admin.web.post');
        Route::post('/manage/post', 'App\Http\Controllers\ArticlesController@postManage')->name('admin.web.manage');
        Route::get('/admin/article/{id}/delete', 'App\Http\Controllers\ArticlesController@deleteArticle')->name('article.delete');
        Route::get('/articleEdit/{id}', 'App\Http\Controllers\ArticlesController@editArticle')->name('article.edit');
        Route::patch('/articleUpdate/{id}', 'App\Http\Controllers\ArticlesController@updateArticle')->name('article.update');
        Route::get('/search/article', 'App\Http\Controllers\ArticlesController@searchArticle')->name('article.search');

        Route::get('/admin/users', 'App\Http\Controllers\UserController@waitinglist')->name('admin.users.index');
        Route::get('/admin/users/{user_id}/approve', 'App\Http\Controllers\UserController@approve')->name('admin.users.approve');
        Route::get('/admin/users/{user_id}/reject', 'App\Http\Controllers\UserController@reject')->name('admin.users.reject');
        Route::get('/admin/payment', 'App\Http\Controllers\PayController@waitinglist')->name('admin.payment');
        Route::get('/admin/payment/{payment_id}/approve', 'App\Http\Controllers\PayController@approve')->name('admin.payment.approve');
        Route::get('/admin/payment/{payment_id}/reject', 'App\Http\Controllers\PayController@reject')->name('admin.payment.reject');
        Route::post('/expense/make', 'App\Http\Controllers\PayController@makeExpense')->name('expense.make');
        Route::get('/expense','App\Http\Controllers\PayController@expensePage')->name('expense.create');
        Route::get('/admin/report', 'App\Http\Controllers\PayController@adminReport')->name('admin.report');
        Route::get('/admin/income', 'App\Http\Controllers\PayController@adminIncome')->name('admin.income');
        Route::get('/admin/expense', 'App\Http\Controllers\PayController@adminExpense')->name('admin.expense');
        Route::get('/guest/message', 'App\Http\Controllers\webContentController@unreadMessage')->name('message.unread');
        Route::get('/guest/readMessage', 'App\Http\Controllers\webContentController@readMessage')->name('message.marked');
        Route::get('/guest/message/{id}/read', 'App\Http\Controllers\webContentController@messageRead')->name('message.read');
        Route::get('/guest/message/{id}/delete', 'App\Http\Controllers\webContentController@messageDelete')->name('message.delete');


    });
});