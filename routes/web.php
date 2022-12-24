<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Route::get('/search-with-pagination', function () {
//     return view('livewire.home');
// });

Route::get('/', function () {
    return view('welcome');
});
//home
Route::get('home', [HomeController::class, 'index'])->name('home.index');
//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('loginstore.index');

//Register
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('store', [RegisterController::class, 'store'])->name('store.index');
//Logout
Route::get('logout', [LogoutController::class, 'index'])->name('logout');
//Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//

Route::get('buy',function(){
    return view('shop');
});

Route::get('order', [siteController::class, 'order']);
Route::post('shop', [siteController::class, 'add_order']);

//slug

// Route::name('admin.')->prefix('admin')->group(function () {
//     Route::get('tag', [TagController::class,'index'])->name('tag.index');
//     Route::get('tag/create', [TagController::class,'create'])->name('tag.create');
//     Route::post('tag/store', [TagController::class,'store'])->name('tag.store');
//     Route::get('tag/edit/{tag:tag_slug}', [TagController::class,'edit'])->name('tag.edit');
//     Route::patch('tag/edit/{tag:tag_slug}', [TagController::class,'update'])->name('tag.update');
//     Route::delete('tag/delete/{tag:tag_slug}', [TagController::class,'delete'])->name('tag.delete');
//   });

  Route::get('/sendemail', [EmailController::class, 'sendEmail']);
//blog
// Route::resource('blog', BlogController::class);

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });


//Route::get('/', 'HomeController@index');
// Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('new-ticket', [TicketsController::class, 'create']);
Route::post('new-ticket', [TicketsController::class, 'store']);
Route::get('my_tickets', [TicketsController::class, 'userTickets']);
Route::get('tickets/{ticket_id}', [TicketsController::class, 'show']);
Route::post('comment', [CommentsController::class, 'postComment']);
//Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('tickets', [TicketsController::class, 'index']);
    Route::post('close_ticket/{ticket_id}', [TicketsController::class, 'close']);
//});

Route::get('item', [ItemController::class, 'index']);

Route::resource('books', [BookController::class]);