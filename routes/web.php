<?php
// use App\Models\Admin
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('admin/login');
});


Route::get('admin', [AdminController::class, 'index']); // For showing login form
// Route::post('admin', [AdminController::class, 'auth']); // For showing login form
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth'); // For processing login form

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']); // For showing login form
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.insert');

    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

    
    
    
    // Route::get('admin/updatepassword',[AdminController::class,'updatepassword']); just for knowledge
    Route::get(
        'admin/logout',
        function () {
            session()->forget('ADMIN_LOGIN');
            session()->forget('key');
            ('ADMIN_ID');
            session()->flash('error','LogOut Successfully');
            return redirect('admin');
        }
    );

});
