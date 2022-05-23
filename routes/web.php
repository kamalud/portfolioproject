<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\BiodataController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\SocialController;
use App\Http\Controllers\backend\EducationController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\backend\ContatctController;
use App\Http\Controllers\backend\SkillController;
use App\Http\Controllers\backend\SettinController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[FrontendController::class,'index']);




Route::group([
    'middleware'=>['auth']
 ],function(){

    Route::prefix('/user')->group(function () {      
        Route::post('/save',[UserController::class,'store']);
        Route::get('/show',[UserController::class,'index']);
        Route::get('/remove/{id}',[UserController::class,'destroy']);
        Route::get('/edit/{id}',[UserController::class,'edit']);
        Route::post('/update/{id}',[UserController::class,'update']);

        Route::get('/userList',[UserController::class,'authuserdata']);
    });

    Route::prefix('/profile')->group(function () {      
        Route::post('/save',[ProfileController::class,'store']);
        Route::get('/show',[ProfileController::class,'index']);
        Route::get('/remove/{id}',[ProfileController::class,'destroy']);
        Route::get('/edit',[ProfileController::class,'edit']);
        Route::post('/update',[ProfileController::class,'update']);

        Route::post('/change_p',[ProfileController::class,'password_change']);
    });
    
    
    Route::prefix('/biodata')->group(function () {      
        Route::get('/show',[BiodataController::class,'index']);
        Route::post('/save',[BiodataController::class,'store']);
        Route::get('/edit/{slug}',[BiodataController::class,'edit']);
        Route::get('/remove/{slug}',[BiodataController::class,'destroy']);
        Route::post('/update',[BiodataController::class,'update']);
    });
    
    Route::prefix('/about')->group(function () {      
        Route::get('/show',[AboutController::class,'index']);
        Route::post('/save',[AboutController::class,'store']);
        Route::get('/remove/{slug}',[AboutController::class,'destroy']);
        Route::get('/edit/{slug}',[AboutController::class,'edit']);
        Route::post('/update',[AboutController::class,'update']);
    });

    Route::prefix('/social')->group(function () {      
        Route::get('/show',[SocialController::class,'index']);
        Route::post('/save',[SocialController::class,'store']);
        Route::get('/remove/{slug}',[SocialController::class,'destroy']);
        Route::get('/edit/{slug}',[SocialController::class,'edit']);
        Route::post('/update',[SocialController::class,'update']);
    });

    Route::prefix('/education')->group(function () {      
        Route::get('/show',[EducationController::class,'index']);
        Route::post('/save',[EducationController::class,'store']);
        Route::get('/remove/{slug}',[EducationController::class,'destroy']);
        Route::get('/edit/{slug}',[EducationController::class,'edit']);
        Route::post('/update',[EducationController::class,'update']);
    });

    Route::prefix('/portfolio')->group(function () {      
        Route::get('/show',[PortfolioController::class,'index']);
        Route::post('/save',[PortfolioController::class,'store']);
        Route::get('/remove/{slug}',[PortfolioController::class,'destroy']);
        Route::get('/edit/{slug}',[PortfolioController::class,'edit']);
        Route::post('/update',[PortfolioController::class,'update']);
    });

    Route::prefix('/skill')->group(function () {      
        Route::get('/show',[SkillController::class,'index']);
        Route::post('/save',[SkillController::class,'store']);
        Route::get('/remove/{slug}',[SkillController::class,'destroy']);
        Route::get('/edit/{slug}',[SkillController::class,'edit']);
        Route::post('/update',[SkillController::class,'update']);
    });

    Route::prefix('/setting')->group(function () {      
        Route::get('/show',[SettinController::class,'index']);
        Route::post('/save',[SettinController::class,'store']);
        Route::get('/remove/{slug}',[SettinController::class,'destroy']);
        Route::get('/edit/{slug}',[SettinController::class,'edit']);
        Route::post('/update',[SettinController::class,'update']);
    });

    Route::prefix('/category')->group(function () {      
        Route::get('/show',[CategoryController::class,'index']);
        Route::post('/save',[CategoryController::class,'store']);
        Route::get('/remove/{slug}',[CategoryController::class,'destroy']);
        Route::get('/edit/{slug}',[CategoryController::class,'edit']);
        Route::post('/update',[CategoryController::class,'update']);
    });

    Route::prefix('/contact')->group(function () {      
        Route::get('/show',[ContatctController::class,'index']);
        Route::get('/remove/{slug}',[ContatctController::class,'destroy']);
    });
      
});



Route::prefix('/contact')->group(function () {      
    Route::post('/save',[ContatctController::class,'store'])->name('contact.store');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/{anypath}', [HomeController::class, 'index'])->where(['anypath'=>'.*']);