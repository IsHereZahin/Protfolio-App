<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeroTitleController;
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
    Route::post('/dashboard/hero/store', [HeroController::class,'store'])->name('dashboard.hero.store');
    Route::get('/dashboard/hero/edit', [HeroController::class,'edit'])->name('dashboard.hero.edit');
    Route::post('/dashboard/hero/update', [HeroController::class,'update'])->name('dashboard.hero.update');
    #--------------------------------------------Hero Title-------------------------------------------------
    Route::get('/dashboard/hero/title/index', [HeroTitleController::class,'index'])->name('dashboard.hero.title.index');
    Route::get('/dashboard/hero/title/create', [HeroTitleController::class,'create'])->name('dashboard.hero.title.create');
    Route::post('/dashboard/hero/title/store', [HeroTitleController::class,'store'])->name('dashboard.hero.title.store');
    Route::get('/dashboard/hero/title/edit/{id}', [HeroTitleController::class,'edit'])->name('dashboard.hero.title.edit');
    Route::post('/dashboard/hero/title/update/{id}', [HeroTitleController::class,'update'])->name('dashboard.hero.title.update');
    Route::get('/dashboard/hero/title/delete/{id}', [HeroTitleController::class,'delete'])->name('dashboard.hero.title.delete');

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
