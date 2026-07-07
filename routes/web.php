<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TaxonomyController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MenuController;
use Inertia\Inertia;

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
$adminPrefix = config('app.admin_prefix', 'admin');

Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
});

Route::group(['prefix'=>$adminPrefix,'middleware'=>'auth'], function(){
    Route::get('/home', [AdminController::class,'home'])->name('home');
    Route::get('/migration', [AdminController::class,'migration'])->name('migration');
    Route::get('/', [AdminController::class,'index'])->name('dashboard');
    Route::get('/profile', [UsersController::class,'profile'])->name('profile');
    Route::get('/editProfile', [UsersController::class,'editProfile'])->name('editProfile');
    Route::post('/updateProfile', [UsersController::class,'updateProfile'])->name('updateProfile');
    Route::post('/chengePassword', [UsersController::class,'chengePassword'])->name('chengePassword');

    Route::resource('posts', PostsController::class);
    Route::get('PostDelete/{id}',[PostsController::class, 'PostDelete'])->name('PostDelete');
    Route::get('postOrder', [PostsController::class, 'postOrder'])->name('postOrder');

    Route::resource('taxonomy', TaxonomyController::class);
    Route::get('taxonomy/hide{id}', [TaxonomyController::class, 'hide'])->name('taxonomy.hide');
});

Route::group(['prefix'=>$adminPrefix,'middleware'=> ['auth']], function(){
    Route::post('/menuItemStore', [MenuController::class, 'menuItemStore'])->name('menuItem.store');
    Route::post('/menuItemUpdate/{id}', [MenuController::class, 'menuItemUpdate'])->name('menuItem.update');
    Route::get('/menuItemEdit/{id}', [MenuController::class,'menuItemEdit'])->name('menuItem.edit');
    Route::get('/menuItemDelete/{id}', [MenuController::class,'menuItemDelete'])->name('menuItem.delete');
    Route::post('menu_sl', [MenuController::class, 'menuSl'])->name('menu_sl');
    
    Route::get('/siteCache', [AdminController::class, 'siteCache'])->name('siteCache');
    Route::get('/basic-settings', [AdminController::class, 'settings'])->name('settings');
    Route::put('/saveSetting', [AdminController::class,'saveSetting'])->name('saveSetting');
});

Route::group(['prefix'=>$adminPrefix,'middleware'=> ['auth','role:superadmin,admin']], function(){
    Route::resource('users', UsersController::class);
    Route::resource('menus',MenuController::class);

    Route::post('/assignPermission/{user}', [UsersController::class, 'assignPermission'])->name('user.assignPermission');
    Route::post('/assignBranch/{user}', [UsersController::class, 'assignBranch'])->name('user.assignBranch');
    Route::post('/user-ban', [UsersController::class, 'ban'])->name('user-ban');
    Route::get('/user-unban/{id}', [UsersController::class, 'unban'])->name('user-unban');
});

Route::group(['prefix'=>$adminPrefix,'middleware'=> ['auth','role:superadmin']], function(){

    Route::get('ac_config_store', function()
    {
        $exitCode = Artisan::call('storage:link');
        return 'OK';
    });

    Route::get('/forceLogin/{id}', [UsersController::class, 'forceLogin'])->name('users.forceLogin');
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionController::class);  
});


require __DIR__.'/auth.php';
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!' . $adminPrefix . '|dashboard|api|login|register|password|logout).*$');
/*
Route::fallback(function () {
    return view('welcome');
});
*/