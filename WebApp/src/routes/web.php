<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authenticate;

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
    if(Auth::check())
    {
        return redirect()->route('dashboard');
    }
    else
    {
    return view('welcome');
    }
});

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/technews', [UserController::class , 'technewsfetch']);
    Route::get('/aifunc', [UserController::class , 'aifuncfetch']);
    Route::get('/mlfunc', [UserController::class , 'mlfuncfetch']);
    Route::get('/astronomyfunc', [UserController::class , 'astronomyfuncfetch']);
    Route::get('/bigdatafunc', [UserController::class , 'bigdatafuncfetch']);
    Route::get('/cvfunc', [UserController::class , 'cvfuncfetch']);
    Route::get('/cryptofunc', [UserController::class , 'cryptofuncfetch']);
    Route::get('/dtfunc', [UserController::class , 'dtfuncfetch']);
    Route::get('/healthfunc', [UserController::class , 'healthfuncfetch']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [UserController::class , 'showword'])->name('dashboard');

Route::get('/admin', function(){
    return view('admin');
});
Route::post('/getaccess', [UserController::class , 'getaccessfunc']);
