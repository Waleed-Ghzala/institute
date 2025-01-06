<?php

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\MnagerController;
use App\Http\Controllers\Auth\UpdateController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('Student_Rigester',[RegisterController::class,'Student_Rigester']);
Route::put('approve_student/{id}',[RegisterController::class,'approve_student']);
Route::post('login_Manager',[loginController::class,'login_Manager']);
Route::post('login_student',[loginController::class,'login_student']);
Route::post('teacher_Rigester',[RegisterController::class,'teacher_Rigester']);
Route::post('login_teacher',[loginController::class,'login_teacher']);
Route::post('employee_Rigester',[RegisterController::class,'employee_Rigester']);
Route::post('login_employee',[loginController::class,'login_employee']);
Route::post('Add_department',[MnagerController::class,'Add_department']);
Route::post('Add_Administrative_departments',[MnagerController::class,'Add_Administrative_departments']);
Route::post('Add_class_department',[MnagerController::class,'Add_class_department']);
Route::post('Add_class',[MnagerController::class,'Add_class']);
Route::post('logout',[loginController::class,'logout']);
Route::post('update',[UpdateController::class,'update']);
Route::post('Add_teacher_department',[MnagerController::class,'Add_teacher_department']);
