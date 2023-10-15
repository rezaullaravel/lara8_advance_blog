<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\AboutusController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\MailSendingController;
use App\Http\Controllers\Frontend\BlogHomeController;
use App\Http\Controllers\Frontend\BlogLikeController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Frontend\CommentLikeController;
use App\Http\Controllers\Frontend\QuestionAnswerController;
use App\Http\Controllers\Admin\FrontendBlogManageController;

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


    //frontend blog manage
    Route::get('/frontend/blog/manage',[FrontendBlogManageController::class,'blogManage'])->name('admin.frontend.blog.manage');
    Route::get('/frontend/blog/approve/{id}',[FrontendBlogManageController::class,'blogApprove'])->name('admin.frontend.blog.approve');
    Route::get('/frontend/blog/reject/{id}',[FrontendBlogManageController::class,'blogReject'])->name('admin.frontend.blog.reject');


    //contact message show
    Route::get('/contact/message/show',[ContactMessageController::class,'showMesage'])->name('admin.contact-message.show');
    Route::get('/contact/message/details/{id}',[ContactMessageController::class,'detailsMesage'])->name('contact.details');

    Route::get('/message/details',[ContactMessageController::class,'details']);


    //logo setting
    Route::get('/setting/logo',[SettingController::class,'logoSetting'])->name('admin.setting.logo');
    Route::post('/logo/update',[SettingController::class,'logoUpdate'])->name('admin.logo.update');

    //header setting
    Route::get('/setting/header',[SettingController::class,'headerSetting'])->name('admin.setting.header');
    Route::post('/header/update',[SettingController::class,'headerUpdate'])->name('admin.header.update');

    //footer left setting
    Route::get('/setting/footer-left',[SettingController::class,'footerLeftSetting'])->name('admin.setting.footer-left');

    Route::post('/footer-left/update',[SettingController::class,'footerLeftUpdate'])->name('admin.footer-left.update');


    //about us setting
    Route::get('/setting/about-us',[SettingController::class,'aboutusSetting'])->name('admin.setting.about-us');
    Route::post('/update/about-us',[SettingController::class,'aboutusUpdate'])->name('admin.about-us.update');




    //mail sending
    Route::get('/mail/sending',[MailSendingController::class,'mailSendingForm'])->name('admin.mail.sending');
    Route::post('/mail/store',[MailSendingController::class,'mailSend'])->name('admin.mail.store');



});


/*================================= Admin all route end =======================================================*/

/*================================= Frontend all route  =======================================================*/
//home page
Route::get('/',[BlogHomeController::class,'index']);
//blog single page
Route::get('/blog/single/{id}',[BlogHomeController::class,'blogSingle'])->name('blog.single');

//blog search
Route::get('/blog/search',[BlogHomeController::class,'blogSearch'])->name('blog.search');

//category wise blog
Route::get('/categorywise/blog/{id}',[BlogHomeController::class,'categorywiseBlog'])->name('categorywise.blog');

//user profile
Route::get('/user/profile',[UserController::class,'userProfile'])->name('user.profile')->middleware('auth');

//profile edit
Route::get('/profile/edit',[UserController::class,'userProfileEdit'])->name('profile.edit')->middleware('auth');
Route::post('/profile/update',[UserController::class,'userProfileUpdate'])->name('profile.update')->middleware('auth');

//user password change
Route::get('/user/password/change',[UserController::class,'userPasswordChange'])->name('user.password.change')->middleware('auth');

Route::post('/user/password/update',[UserController::class,'userPasswordUpdate'])->name('user.password.update')->middleware('auth');



//blog post  from user
Route::get('/user/blog/create',[UserController::class,'userBlogCreate'])->name('user.blog.create')->middleware('auth');
Route::post('/user/blog/store',[UserController::class,'userBlogStore'])->name('user.blog.store')->middleware('auth');
Route::get('/user/blog/list',[UserController::class,'userBlogShow'])->name('user.blog.list')->middleware('auth');

//comment like
Route::post('/comment/like',[CommentLikeController::class,'commentLike'])->name('comment.like');
Route::post('/comment/dislike',[CommentLikeController::class,'commentDislike'])->name('comment.dislike');


//contact
Route::get('/contact',[ContactController::class,'index'])->name('frontend.contact');
Route::post('/message/store',[ContactController::class,'store'])->name('message.store');


//about us page
Route::get('/about/us',[AboutusController::class,'aboutus'])->name('about.us');


//blog like
Route::post('/blog/like',[BlogLikeController::class,'blogLike'])->name('blog.like');
Route::get('/blog/dislike/{id}',[BlogLikeController::class,'blogDisLike'])->name('blog.dislike');

//question answer
Route::get('/question/answer',[QuestionAnswerController::class,'questionAnswer'])->name('question.answer');
Route::post('/question/store',[QuestionAnswerController::class,'questionStore'])->name('question.store');
Route::get('/question/delete/{id}',[QuestionAnswerController::class,'questionDelete'])->name('question.delete');

/*================================= Frontend all route  end =======================================================*/








