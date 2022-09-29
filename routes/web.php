<?php

use App\Mail\TestingMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/mail', function () {
    $postTitle = 'Test Mail 1... 2... 3...';
    $postDescription = "What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

    $mails = [
        'kyaw@gyi.com',
        'kyaw@gyi.com',
        'kyaw@gyi.com',
        'kyaw@gyi.com',
        'kyaw@gyi.com',
    ];
    foreach($mails as $mail){
        // Mail::to($mail)->send(new TestingMail($postTitle, $postDescription)) ;

        // queue later -> 
        Mail::to($mail)->later(now()->addMinute(1), new TestingMail($postTitle, $postDescription));
    }

    return view('success');
});

require __DIR__.'/auth.php';
