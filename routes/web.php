<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

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

Route::get('/', [PostController::class,'index'])->name('home');
Route::post('newsletter', NewsletterController::class );


Route::get('posts/{post:slug}', [PostController::class, 'detail']);
Route::post('posts/{post:slug}/comment', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class,'create'])->middleware('guest');
Route::post('register', [RegisterController::class,'store'])->middleware('guest');

Route::post('logout', [SessionController::class,'destroy'])->middleware('auth');
Route::get('login', [SessionController::class,'create'])->middleware('guest');
Route::post('login', [SessionController::class,'store'])->middleware('guest');

Route::middleware('can:admin')->group(function() {
    Route::get('admin/posts/create', [AdminPostController::class,'create']);
    Route::post('admin/posts/store', [AdminPostController::class,'store']);
    Route::get('admin/posts', [AdminPostController::class,'index'])->name('admin.posts');
    Route::get('admin/posts/{post}', [AdminPostController::class,'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'delete']);
});

// Route::get('categories/{category:slug}', function(Category $category) {
//     return view('posts',[ 
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all(),
//     ]);
// });

// Route::get('ping',function() {
//     $client = new MailchimpMarketing\ApiClient();
//     $client->setConfig([
//         'apiKey' => env('MAILCHIMP_APP_KEY'),
//         'server' => 'us12',
//     ]);

//     $response = $client->lists->addListMember("c56537365b", [
//         "email_address" => "parkboy98@gmail.com",
//         "status" => "subscribed",
//     ]);
    
//     ddd($response);

// });