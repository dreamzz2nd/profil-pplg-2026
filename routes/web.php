<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JumbotronController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\StudentPortfolioController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Artisan;

Route::get('data', function () {
    return redirect()->back();
})->where('any', '.*');

Route::get('data/{any}', function () {
    return redirect()->back();
})->where('any', '.*');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link --relative');
    return response()->json(['message' => 'Berhasil menghubungkan storage.'], 200);
});

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
Route::get("/masuk-ke-dashboard", [AuthController::class, "login_view"]);
Route::post("/masuk-ke-dashboard", [AuthController::class, "login_submit"]);
Route::post("/logout", [AuthController::class, "logout"]);

// Route::view('/', 'index')->name('index');
// Route::view("/artikel", "article")->name('article');

Route::get("/", [FrontController::class, "index"]);
Route::get("/artikel", [FrontController::class, "article"]);
Route::get("/artikel/{id}", [FrontController::class, "detail_article"]);
Route::get("/karya-siswa", [FrontController::class, "karya_siswa"]);
Route::get("/karya-siswa/{id}", [FrontController::class, "detail_karya_siswa"]);

Route::get('/admin-pplg', function () {
    return view('admin.pages.dashboard');
})->middleware("isLogin");

Route::prefix('/admin-pplg')->middleware('isLogin')->group(function () {
    Route::resource('data-sekolah', SchoolController::class)->except(['show']);
    Route::resource('data-jurusan', MajorController::class)->except(['show']);
    Route::resource('jumbotron', JumbotronController::class)->except(['show']);
    Route::resource('about', AboutController::class)->except(['show']);
    Route::resource('keahlian', SkillController::class)->except(['show']);
    Route::resource('data-alumni', AlumniController::class)->except(['show']);
    Route::resource('category', CategoryController::class)->except(['show']);
    Route::resource('article', ArticleController::class)->except(['show']);
    Route::resource('teacher', TeacherController::class)->except(['show']);
    Route::resource('mapel', MapelController::class)->except(['show']);
    Route::resource('software', SoftwareController::class)->except(['show']);
    Route::resource('karya-siswa', StudentPortfolioController::class)->except(['show']);
    Route::resource('banner', BannerController::class)->except(['show']);
});
