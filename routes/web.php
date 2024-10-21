<?php
// use App\Models\Admin
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;


Route::get('/', function () {
    return view('admin/login');
});


Route::get('/admin', [AdminController::class, 'index']); // For showing login form
// Route::post('admin', [AdminController::class, 'auth']); // For showing login form
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth'); // For processing login form

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']); // For showing login form
    Route::get('admin/category', [CategoryController::class, 'index']);
    // managing the edit and update in same form
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    // if id comes in the request then it is for edit else it is for add
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category']);

    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.insert');

    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);


    // For coupon CRUD operation
    Route::get('admin/coupon', [CouponController::class, 'index']);
    // managing the edit and update in same form
    Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon']);
    // if id comes in the request then it is for edit else it is for add
    Route::get('admin/coupon/manage_coupon/{id}', [CouponController::class, 'manage_coupon']);

    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.insert');

    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);

    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);

    
    
    //just for knowledge
    Route::get('admin/updatepassword',[AdminController::class,'updatepassword']); 
    Route::get(
        'admin/logout',
        function () {
            session()->forget('ADMIN_LOGIN');
            session()->forget('ADMIN_ID');
            session()->flash('error','LogOut Successfully');
            return redirect('/');
        }
    );

});
