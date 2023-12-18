<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// ------------------------------------------Frontend Route-------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('#');



// ------------------------------------------Admin routes --------------------------------------------
Route::middleware(['auth', 'verified'])->group(function () {

    # ---------------------------------------Dashboard -----------------------------------------------
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    #--------------------------------------------Hero-------------------------------------------------
    Route::get('/dashboard/hero/index', [HeroController::class,'index'])->name('dashboard.hero.index');
    Route::get('/dashboard/hero/create', [HeroController::class,'create'])->name('dashboard.hero.create');
    Route::get('/dashboard/hero/store', [HeroController::class,'store'])->name('dashboard.hero.store');
    Route::get('/dashboard/hero/edit', [HeroController::class,'edit'])->name('dashboard.hero.edit');
    Route::get('/dashboard/hero/update', [HeroController::class,'update'])->name('dashboard.hero.update');
    Route::get('/dashboard/hero/delete', [HeroController::class,'delete'])->name('dashboard.hero.delete');

});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
