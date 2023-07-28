<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CauThuTrongGiaiDauController;
use App\Http\Controllers\DangKyGiaiController;
use App\Http\Controllers\DLHiepDauController;
use App\Http\Controllers\DoiBongTrongGiaiDauController;
use App\Http\Controllers\FootballController;
use App\Http\Controllers\GiaiDauController;
use App\Http\Controllers\GiaiThuongController;
use App\Http\Controllers\HinhThucController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KQTranDauController;
use App\Http\Controllers\LichSuQuyController;
use App\Http\Controllers\LichTDController;
use App\Http\Controllers\LoaiHiepDauController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuyDoiController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\ChiTietTomTatController;
use App\Http\Controllers\TranDauController;
use App\Http\Controllers\TraoGiaiCTController;
use App\Http\Controllers\TraoGiaiDoiController;
use App\Http\Controllers\TaiKhoanController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
     Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/me', [AuthController::class, 'me']);
    Route::post('/payload', [AuthController::class, 'payload']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::resource('HinhThuc', HinhThucController::class);
    Route::resource('LichSuQuy', LichSuQuyController::class);
    Route::resource('Login', LoginController::class);
    Route::get('/DoiBongTrongGiaiDau', [DoiBongTrongGiaiDauController::class, 'getByGiaiDauId']);
Route::resource('GiaiThuong', GiaiThuongController::class);
Route::resource('TraoGiaiDoi', TraoGiaiDoiController::class);
Route::resource('TraoGiaiCT', TraoGiaiCTController::class);
Route::resource('DoiBongTrongGiaiDau1', DoiBongTrongGiaiDauController::class);
Route::resource('GiaiDau', GiaiDauController::class);
Route::resource('TranDau', TranDauController::class);
Route::resource('LichTD', LichTDController::class);
Route::resource('LoaiHiepDau', LoaiHiepDauController::class);
Route::resource('DLHiepDau', DLHiepDauController::class);
Route::resource('KQTranDau', KQTranDauController::class);
Route::resource('ChiTietTomTat', ChiTietTomTatController::class);
Route::resource('InfoUser', InfoUserController::class);
Route::resource('products', ProductController::class);
Route::resource('players', PlayerController::class);
Route::resource('football', FootballController::class);
Route::resource('referee', RefereeController::class);
Route::resource('card', CardController::class);
Route::resource('Rank', RankController::class);
Route::resource('QuyDoi', QuyDoiController::class);
Route::resource('TinTuc', TinTucController::class);
// Route::resource('login', LoginController::class);
Route::resource('DangKyGiai', DangKyGiaiController::class);
Route::resource('TaiKhoan', TaiKhoanController::class);
Route::resource('CauThuTrongGiaiDau', CauThuTrongGiaiDauController::class);
});
Route::middleware('auth:sanctum')->group(function () {


});

