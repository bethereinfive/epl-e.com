<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\SettingController;
use  App\Http\Controllers\api\authController;
use App\Http\Controllers\TransitionController;
use App\Http\Controllers\WithdrawalController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [authController::class,'login']);
    Route::post('register', [authController::class,'register']);
    Route::post('logout', [authController::class,'logout']);
    Route::post('refresh', [authController::class,'refresh']);
    Route::post('me', [authController::class,'login']);

});


Route::get('count/username/check', [authController::class,'usernamecheck']);

Route::get('get/roles',[authController::class,'getRoles']);
Route::post('role/assign',[authController::class,'roleAssign']);


Route::get('user/multi/refer',[UserController::class,'referlist']);
Route::get('user/member/list/count',[UserController::class,'allcount']);



Route::get('admin/withdraw/charge/{id}',[WithdrawalController::class,'withdrawcharge']);
Route::get('user/{status}/{id}',[UserController::class,'userbanned']);
Route::get('withdraw/{status}/{id}',[WithdrawalController::class,'userbanned']);
Route::get('deposit/{status}/{id}',[DepositController::class,'userbanned']);

Route::post('admin/user/password/change',[UserController::class,'passwordupdate']);
Route::get('front/last/records',[UserController::class,'lastRecords']);


Route::resources([
    'admin/user' => UserController::class,
    'admin/deposit' => DepositController::class,
    'admin/withdrawal' => WithdrawalController::class,
    'admin/level' => LevelController::class,
    'admin/plan' => PlanController::class,
    'admin/task' => TaskController::class,
    'admin/withdraw/gateway' => GatewayController::class,
    'admin/setting' => SettingController::class,
    'admin/transition' => TransitionController::class,

]);


//////////////////////////////////////////


Route::get('front/teamdetails',[UserController::class,'teamdetails']);

Route::post('admin/balance/{id}',[UserController::class,'blances']);

Route::get('backend/dashboard',[UserController::class,'dashboard']);


Route::get('m/d',[UserController::class,'md']);



// https://checkout-bdt.onepay.news/quartetSystem/codedetail_bKash?oid=S2022082914370109212&sign=53c09c1045544ef98fe90f33de7e9c6b&data=%7B%22orderNo%22%3A%22S2022082914370109212%22,%22orderAmount%22%3A%22500%22,%22realAmount%22%3A%22500%22,%22payerName%22%3A%2201909756552%22,%22payeeType%22%3A0,%22payeeName%22%3A%22Shammi%22,%22payeeMobile%22%3A%22%22,%22payeeAccount%22%3A%2201906542686%22,%22payeeBankName%22%3Anull,%22payeeBankBranchName%22%3Anull,%22payeeBankExpand%22%3Anull,%22orderStatus%22%3A1,%22paymentStatus%22%3Anull,%22returnUrl%22%3A%22https%3A%2F%2Fconvey-shop.com%22,%22expireTime%22%3A899,%22signature%22%3A%2253c09c1045544ef98fe90f33de7e9c6b%22%7D
