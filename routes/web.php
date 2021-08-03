<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\writecontroller;
use App\Http\Controllers\category;




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
//     return view('pages.index');
// });

Route::get('/', [HelloController::class, 'index']);
Route::get('AboutUs', [HelloController::class, 'about'])->name('about');
Route::get('ContactUs',[HelloController::class,'contactus'])->name('contact');

Route::get('Post/Page', [writecontroller::class, 'writepost'])->name('writepost');

//Catergory CRUD here======
Route::get('Category/page', [category::class, 'create'])->name('category');
Route::post('store/cat', [category::class, 'storeCategory'])->name('store');
Route::get('ViewCategory/page', [category::class, 'allCategory'])->name('allcat');
Route::get('view/category/{id}', [category::class, 'singleview']);
Route::get('delete/category/{id}', [category::class, 'deletecat']);
Route::get('edit/category/{id}', [category::class, 'Editcat']);
Route::post('update/category/{id}', [category::class, 'updatecat']);

// Post CRUS----------------

Route::post('store/post', [writecontroller::class, 'storepost'])->name('store.post');
Route::get('All/postView', [writecontroller::class, 'allpost'])->name('all.post');
Route::get('view/post/{id}', [writecontroller::class, 'singleview']);
Route::get('edit/post/{id}', [writecontroller::class, 'editpost']);
Route::post('update/post/{id}', [writecontroller::class, 'updatepost']);
Route::get('delete/post/{id}', [writecontroller::class, 'deletepost']);

Route::get('view/post/{id}', [HelloController::class, 'singleview']);



