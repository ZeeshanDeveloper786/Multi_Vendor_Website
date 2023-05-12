<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\sectionController;
use App\Http\Controllers\Admin\brandController;



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

    // view admins, subadmins, vendors
    Route::get('/admins/{type?}',[AdminController::class,'adminsManagement']);
    
    // view vendor details
    Route::get('view-vendor-details/{id}',[AdminController::class,'viewVendorsDetails']);

    // udate admin status 
    Route::post('admin/update-admin-status',[AdminController::class,'AdminStatusUpdate'])->name('StatusUpdate');
    
    //Admin logout
    Route::get('logout',[AdminController::class,'logout'])->name('adminlogout');
    });

    // section
    Route::get('section' , [sectionController::class,'sectionsDisplay']);
    //update-section-status
    Route::post('admin/update-section-status',[sectionController::class,'updateSection']);
    // Delete section
    Route::post('admin/delete-section',[sectionController::class,'deleteSection']);
    // Add, edit Section
    Route::match(['get','post'],'admin/add-edit-section/{id?}',[sectionController::class,'addEditSection']);

    // Display Category Table/page
    Route::get('/categories',[categoryController::class,'DisplayCategory']);
    //update-category-status
    Route::post('admin/update-category-status',[categoryController::class,'updateCategoryStatus']);
    //delete-category
    Route::post('admin/delete-category',[categoryController::class,'deleteCategory']);
    // Add, edit Category
    Route::match(['get','post'],'admin/add-edit-category/{id?}',[categoryController::class,'addEditcategory']);
    // append categories level
    Route::get('/append-categories-level',[categoryController::class,'appendCategoryLevel']);
    //delete-category
    Route::post('admin/delete-category-image',[categoryController::class,'deleteCategoryImage']);

    // Brands
    Route::get('/brands' , [brandController::class,'brandsDisplay']);
    //update-brand-status
    Route::post('admin/update-brand-status',[brandController::class,'updatebrand']);
    // Delete brand
    Route::post('admin/delete-brand',[brandController::class,'deletebrand']);
    // Add, edit brand
    Route::match(['get','post'],'admin/add-edit-brand/{id?}',[brandController::class,'addEditBrand']);


});
