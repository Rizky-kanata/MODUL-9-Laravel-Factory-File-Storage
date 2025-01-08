<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', ProfileController::class)->name('profile')->middleware('auth');

Route::resource('employees', EmployeeController::class);

Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('employees', EmployeeController::class);
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    // Routes untuk data master employee
});
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/local-disk', function () {
    Storage::disk('local')->put('local-example.txt', 'This is local example
    content');
    return asset('storage/local-example.txt');
});

Route::get('/public-disk', function () {
    Storage::disk('public')->put('public-example.txt', 'This is public example
    content');
    return asset('storage/public-example.txt');
});
Route::get('/retrieve-local-file', function () {
    if (Storage::disk('local')->exists('local-example.txt')) {
        $contents = Storage::disk('local')->get('local-example.txt');
    } else {
        $contents = 'File does not exist';
    }
    return $contents;
});

Route::get('/retrieve-public-file', function () {
    if (Storage::disk('public')->exists('public-example.txt')) {
        $contents = Storage::disk('public')->get('public-example.txt');
    } else {
        $contents = 'File does not exist';
    }
    return $contents;
});

Route::get('/download-local-file', function () {
    return Storage::download('local-example.txt', 'local file');
});

Route::get('/download-public-file', function () {
    return Storage::download('public/public-example.txt', 'public file');
});

Route::get('/file-url', function () {
    // Just prepend "/storage" to the given path and return a relative URL
    $url = Storage::url('local-example.txt');
    return $url;
});
Route::get('/file-size', function () {
    $size = Storage::size('local-example.txt');
    return $size;
});
Route::get('/file-path', function () {
    $path = Storage::path('local-example.txt');
    return $path;
});

Route::get('/upload-example', function () {
    return view('upload_example');
});
Route::post('/upload-example', function (HttpRequest $request) {
    $path = $request->file('avatar')->store('public');
    return $path;
})->name('upload-example');


Route::get('/delete-local-file', function (Request $request) {
    Storage::disk('local')->delete('local-example.txt');
    return 'Deleted';
});
Route::get('/delete-public-file', function (Request $request) {
    Storage::disk('public')->delete('public-example.txt');
    return 'Deleted';
});

Route::get('download-file/{employeeId}', [EmployeeController::class,
'downloadFile'])->name('employees.downloadFile');

Route::get('/employees/{id}/download', [EmployeeController::class, 'downloadFile'])->name('employees.download');
