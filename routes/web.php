<?php

use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminBooksController;
use App\Http\Controllers\AdminBookReviewsController;
use App\Http\Controllers\BooksController;
Use App\Http\Controllers\PasswordRecoveryController;
use App\Http\Controllers\BookReviewsController;
use App\Http\Controllers\UsersController;
use App\Http\Resources\UserResource;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/logout', function () {
     Auth::logout();
     return redirect()->route('login');
})->name('logout');

Route::view('/test','test');
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

Route::middleware('guest')->group( function(){

    Route::view('/', 'welcome')->name('welcome');
    Route::view('/home', 'home_page')->name('home');

    Route::view('/login', 'auth/login')->name('login_page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/register', [AuthController::class, 'register'])->name('registering');
    Route::view('/register', 'auth/registration')->name('register');
    Route::get('verifyEmail/{id}/{token}',[AuthController::class, 'verifyEmail'])->name('verify.email');

});

Route::view('/password_recovery', 'auth/password_recovery')->name('password_recovery');
Route::post('recover_password',[PasswordRecoveryController::class, 'recoverPassword'])->name('recover.password');
Route::post('check_code',[PasswordRecoveryController::class, 'checkCode'])->name('check.code');
Route::view('/set_new_password', 'auth/set_new_password')->name('new.password');
Route::post('set_new_password',[PasswordRecoveryController::class, 'setNewPassword'])->name('set.new.password');

Route::middleware('auth')->group(function() {
    Route::get('/books',[BooksController::class, 'index'])->name('books.index');
    Route::get('/books/{id}',[BooksController::class, 'show'])->name('books.show');
    Route::get('/search', [BooksController::class, 'search'])->name('books.search');

    Route::resource('/book_reviews', BookReviewsController::class)->except(['index', 'put',])->names('book_reviews');

    Route::get('/users', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');

});

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function(){
    Route::resource('/users',AdminUsersController::class);
    Route::resource('/books',AdminBooksController::class);
    Route::resource('/book_reviews',AdminBookReviewsController::class);
});






