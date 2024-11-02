<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FactsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeroTitleController;
use App\Http\Controllers\Admin\SkillController;
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

    #--------------------------------------------About Route-------------------------------------------------
    Route::get('/dashboard/about/index', [AboutController::class,'index'])->name('dashboard.about.index');
    Route::get('/dashboard/about/create', [AboutController::class,'create'])->name('dashboard.about.create');
    Route::post('/dashboard/about/store', [AboutController::class,'store'])->name('dashboard.about.store');
    Route::get('/dashboard/about/edit', [AboutController::class,'edit'])->name('dashboard.about.edit');
    Route::post('/dashboard/about/update', [AboutController::class,'update'])->name('dashboard.about.update');
    Route::get('/dashboard/about/delete', [AboutController::class,'delete'])->name('dashboard.about.delete');

    #--------------------------------------------Facts Route-------------------------------------------------
    Route::get('/dashboard/facts/index', [FactsController::class, 'index'])->name('dashboard.facts.index');
    Route::get('/dashboard/facts/create', [FactsController::class, 'create'])->name('dashboard.facts.create');
    Route::post('/dashboard/facts/store', [FactsController::class, 'store'])->name('dashboard.facts.store');
    Route::get('/dashboard/facts/edit', [FactsController::class, 'edit'])->name('dashboard.facts.edit');
    Route::put('/dashboard/facts/update', [FactsController::class, 'update'])->name('dashboard.facts.update');
    Route::DELETE('/dashboard/facts/delete', [FactsController::class, 'destroy'])->name('dashboard.facts.delete');

    // #--------------------------------------------Skills Route-------------------------------------------------
    // Route::get('/dashboard/skills/index', [SkillController::class, 'index'])->name('dashboard.skills.index'); // List all skills
    // Route::get('/dashboard/skills/create', [SkillController::class, 'create'])->name('dashboard.skills.create'); // Show form to create a new skill
    // Route::post('/dashboard/skills/store', [SkillController::class, 'store'])->name('dashboard.skills.store'); // Store a new skill
    // Route::get('/dashboard/skills/edit/{skill}', [SkillController::class, 'edit'])->name('dashboard.skills.edit'); // Show form to edit an existing skill
    // Route::put('/dashboard/skills/update/{skill}', [SkillController::class, 'update'])->name('dashboard.skills.update'); // Update an existing skill
    // Route::delete('/dashboard/skills/delete/{skill}', [SkillController::class, 'destroy'])->name('dashboard.skills.delete'); // Delete an existing skill

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
