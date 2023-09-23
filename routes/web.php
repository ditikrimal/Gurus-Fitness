<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\listing;



//index_page
Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/testsite', function () {
    return view('email.verifyMail');
});


//show all listings
Route::get('/listings', [MainController::class, 'showListings']);

//reservations
Route::get('/reservations', [ReservationController::class, 'reservation'])->middleware('auth');




//registerForm
Route::get('/user', [UserController::class, 'signup'])->name('login')->middleware('guest');

//login user
Route::post('/users/login', [UserController::class, 'loginUser']);

//logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//register a new user
Route::post('/users/signup', [UserController::class, 'createUser']);

//verify the otp
Route::post('/verifyotp', [UserController::class, 'verifyOTP']);

//resend the OTP again
Route::post('/resendotp', [UserController::class, 'resendOTP']);

//verify user through link
Route::get('/email/verify/link/{otp}', [UserController::class, 'VerifyLink']);



//googleLogin
Route::get('/googleLogin', [UserController::class, 'googleLogin']);

Route::get('/users/google/callback', [UserController::class, 'googleHandle']);


//userProfile routes
Route::get('/user/profile', [UserController::class, 'userProfile'])->middleware('auth');



//Below code will be used while making reservations in the website

//create listing by user
Route::get('/listings/create', [MainController::class, 'reservations'])->middleware('auth');

//manage listings
Route::get('/listings/manage', [MainController::class, 'manageListing'])->middleware('auth');


//store created listing 
Route::post('/listingscreate', [MainController::class, 'store']);

//edit a listing
Route::get('/listings/{listing}/edit', [MainController::class, 'edit'])->middleware('auth');

//update edited listing
Route::put('/listings/{listing}', [MainController::class, 'update'])->middleware('auth');

//delete a listing
Route::delete('/listings/{listing}', [MainController::class, 'delete'])->middleware('auth');

//show single listing
Route::get('/listings/{listing}', [MainController::class, 'show']);
