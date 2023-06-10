<?php

use App\Http\Controllers\Api\V1\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//api/v1/employee

//api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    //Route::apiResource('employee', EmployeeController::class);
    Route::post('employee/create', 'employeeController@new');
    Route::post('employee/{employee_id}/time', 'employeeController@setTime')->where('employee_id', '[0-9]+');
    Route::get('employee/{employee_id}/unpaid', 'employeeController@getUnpaid')->where('employee_id', '[0-9]+');
    Route::post('employee/{employee_id}/payall', 'employeeController@payAll')->where('employee_id', '[0-9]+');
});
