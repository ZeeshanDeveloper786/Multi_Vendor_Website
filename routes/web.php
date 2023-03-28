<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

Route::prefix('/admin')->group(function(){
    //admin login route, manually authenticate
    Route::match(['get','post'],'/login',[AdminController::class,'loggedIn']);


    Route::group(['middleware'=>['admin']],function(){
    // admin Dashboard Route
    Route::get('dashboard',[AdminController::class,'dashboard']);
    
    //admin update password
    Route::match(['get','post'],'update-admin-password',[AdminController::class,'updateAdminPassword']);

    //admin update details/profile
    Route::match(['get','post'],'update-admin-details',[AdminController::class,'updateAdminDetails']);

    // check admin password by ajax
    Route::post('check-admin-password',[AdminController::class,'checkAdminPassword'])->name('check-admin-password');

    //update vendor details, this route will work for 3 forms, vendors personal details, vendors bank details, vendor business details by using slug
    Route::match(['get', 'post'], 'update-vendor-details/{slug}',[AdminController::class,'updateVendorDetails']);
    //Admin logout
    Route::get('logout',[AdminController::class,'logout'])->name('adminlogout');
    });


});
