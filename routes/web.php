<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Models\Employee;
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
    $jumlahpegawai = Employee::count();
    $jumlahpegawaicowo = Employee::where('jeniskelamin', 'cowo')->count();
    $jumlahpegawaicewe = Employee::where('jeniskelamin', 'cewe')->count();
    return view('welcome', compact('jumlahpegawai', 'jumlahpegawaicowo', 'jumlahpegawaicewe'));
});

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');
Route::get('/deletedata/{id}', [EmployeeController::class, 'deletedata'])->name('deletedata');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginfarrel', [LoginController::class, 'loginfarrel'])->name('loginfarrel');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logoutfarrel', [LoginController::class, 'logoutfarrel'])->name('logoutfarrel');