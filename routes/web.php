<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\BlogHomeController;
use App\Http\Controllers\Admin\AdminProfileController;

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
//user dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*================================= Admin all route =======================================================*/

Route::get('/admin/login',[LoginController::class,'showAdminLoginForm']);
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.login');


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout');

    //category
    Route::get('/category/add',[CategoryController::class,'addCategory'])->name('admin.category.add');
    Route::post('/category/store',[CategoryController::class,'storeCategory'])->name('admin.category.store');
    Route::get('/category/manage',[CategoryController::class,'manageCategory'])->name('admin.category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class,'editCategory'])->name('admin.category.edit');
    Route::post('/category/update',[CategoryController::class,'updateCategory'])->name('admin.category.update');

    Route::get('/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin.category.delete');


    //blog
    Route::get('/blog/add',[BlogController::class,'add'])->name('admin.blog.add');
    Route::post('/blog/store',[BlogController::class,'store'])->name('admin.blog.store');
    Route::get('/blog/manage',[BlogController::class,'manage'])->name('admin.blog.manage');
    Route::get('/blog/status/deactive/{id}',[BlogController::class,'blogStatusDeactive'])->name('admin.blog.status.deactive');
    Route::get('/blog/status/active/{id}',[BlogController::class,'blogStatusActive'])->name('admin.blog.status.active');
    Route::get('/blog/edit/{id}',[BlogController::class,'blogEdit'])->name('admin.blog.edit');
    Route::get('/blog/delete/{id}',[BlogController::class,'blogDelete'])->name('admin.blog.delete');
    Route::post('/blog/update',[BlogController::class,'blogUpdate'])->name('admin.blog.update');
    Route::get('/blog/details/{id}',[BlogController::class,'blogDetails'])->name('admin.blog.details');



    //admin profile
    Route::get('/profile/password/change',[AdminProfileController::class,'passwordChangeForm'])->name('admin.profile.password.change');
    Route::post('/profile/password/update',[AdminProfileController::class,'passwordUpdate'])->name('admin.profile.password.update');

});


/*================================= Admin all route end =======================================================*/

/*================================= Frontend all route  =======================================================*/
//home page
Route::get('/',[BlogHomeController::class,'index']);
//blog single page
Route::get('/blog/single/{id}',[BlogHomeController::class,'blogSingle'])->name('blog.single');

//category wise blog
Route::get('/categorywise/blog/{id}',[BlogHomeController::class,'categorywiseBlog'])->name('categorywise.blog');

//user profile
Route::get('/user/profile',[UserController::class,'userProfile'])->name('user.profile');

//profile edit
Route::get('/profile/edit',[UserController::class,'userProfileEdit'])->name('profile.edit');
Route::post('/profile/update',[UserController::class,'userProfileUpdate'])->name('profile.update');

/*================================= Frontend all route  end =======================================================*/





