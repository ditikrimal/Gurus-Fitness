<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\listing;
use App\Http\Controllers\NewsAndEventsController;
use App\Http\Controllers\AdminController;

//index_page
Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/testsite', function () {
    return view('adminAuth.adminManage.createUser');
});

//show all listings
Route::get('/listings', [MainController::class, 'showListings']);

//reservations
Route::get('/reservations', [ReservationController::class, 'reservation'])->middleware('auth');

//registerForm
Route::get('/user', [UserController::class, 'signup'])
    ->name('login')
    ->middleware('guest');

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

//update user profile

Route::post('/user/update/profile', [UserController::class, 'userProfileUpdate']);

Route::post('/user/updatepassword/profile', [UserController::class, 'userPasswordUpdate']);


//userProfile routes
Route::get('/user/profile', [UserController::class, 'userProfile'])->middleware('auth');

// about us page
Route::get('/about-us', [MainController::class, 'aboutUs']);

//news and events page
Route::get('/news-and-events', [NewsAndEventsController::class, 'newsEvents']);
Route::get('/news/{news_id}/{news_title}', [NewsAndEventsController::class, 'showSingleNews']);

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


//admin routes


//admin login routes
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('adminlogin');
Route::post('/admin/login-user', [AdminController::class, 'AdminLoginUser'])->name('adminloginuser');
// routes/web.php

Route::post('/admin/create', [AdminController::class, 'createAdminUser'])->name('adminCreate');

Route::post('/admin/logout', [AdminController::class, 'AdminLogout'])->name('adminlogout');

Route::delete('/delete', [AdminController::class, 'deleteAdminUser'])->name('adminDelete');

//route auth groups
Route::group(['middleware' => 'adminauth'], function () {

    Route::get('/admin/home', [AdminController::class, 'AdminDashboard']);

    Route::get('/admin/home/dashboard', [AdminController::class, 'AdminDashboard']);

    Route::get('/admin/home/my-profile', [AdminController::class, 'AdminProfile']);

    Route::get('/admin/website-content/news-and-events', [AdminController::class, 'AdminNewsEvents']);

    Route::get('admin/website-content/plans-and-prices', [AdminController::class, 'AdminPlansPrices']);

    Route::get('/admin/website-content/about-us', [AdminController::class, 'AdminAboutUs']);

    Route::get('/admin/customer-manage/user-accounts', [AdminController::class, 'AdminUserAccounts']);

    Route::get('/admin/customer-manage/subscriptions', [AdminController::class, 'AdminSubscriptions']);

    Route::get('/admin/admin-manage/users', [AdminController::class, 'AdminUsers']);

});
