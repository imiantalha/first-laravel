<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
// use Illuminate\Support\Facades\DB;

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
    // return view('welcome');

    //find id 1
    // $user = DB::table('users')->find(1);
    //first user
    // $user = DB::table('users')->first();

    // $user = User::find(1);
    // $user ->update([
    //     'email' => 'MuhammaD@gmail.com'
    // ]);


    // create new user
    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)', [
    //     'Ali',
    //     'ali1@gmail.com',
    //     'password1'
    // ]);

    // $user = DB::table('users')->insert([
    //     'name' => 'Abdullah',
    //     'email' => 'abdullah@gmail.com',
    //     'password' => 'password'
    // ]);

                                //uses two function in model User.php
    // $user = User::create([ 
    //     'name' => 'Talha',
    //     'email' => 'talha4@gmail.com',
    //     'password' => 'password'
    // ]);


    // $users = DB::select('select * from users');


    // $user = DB::table('users')->where('id', 3)->delete();

    
    // $users = DB::table('users')->get();
    $users = User::find(14);
    dd($users->name);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
