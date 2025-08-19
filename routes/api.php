<?php

use App\Models\student;
use App\Models\admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\advertisements;
use App\Http\Middleware\time_management;
use App\Http\Controllers\Auth\ShowController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\time_management\time;
use App\Http\Controllers\Auth\MnagerController;
use App\Http\Controllers\Auth\UpdateController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\admissions\new_admissions;
use App\Http\Controllers\admissions\Applying_admission;
use App\Http\Controllers\admissions\admission_Management;
use App\Http\Controllers\advertisements\new_advertisements;


;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// حسابات المستخدمين
Route::post('Student_Rigester',[RegisterController::class,'Student_Rigester']);
Route::post('login_Manager',[loginController::class,'login_Manager']);
Route::post('login_student',[loginController::class,'login_student']);
Route::post('teacher_Rigester',[RegisterController::class,'teacher_Rigester'])->middleware(['auth:api','register']);
Route::post('login_teacher',[loginController::class,'login_teacher']);
Route::post('employee_Rigester',[RegisterController::class,'employee_Rigester'])->middleware(['auth:api','register']);
Route::post('login_employee',[loginController::class,'login_employee']);
Route::post('logout',[loginController::class,'logout']);
Route::post('update',[UpdateController::class,'update']);
Route::get('profile',[ShowController::class,'profile']);

// اضافة الاقسام والصفوف
Route::post('Add_department',[MnagerController::class,'Add_department']);
Route::post('Add_Administrative_departments',[MnagerController::class,'Add_Administrative_departments']);
Route::post('Add_class_department',[MnagerController::class,'Add_class_department']);
Route::post('Add_class',[MnagerController::class,'Add_class']);
Route::post('Add_teacher_department',[MnagerController::class,'Add_teacher_department']);
//عرض وحذف المستخدمين
Route::get('getUsers/{role}',[ShowController::class,'getUsers']);
Route::get('DeleteUser/{id}',[ShowController::class,'DeleteUser']);

// انشاء مفاضلة وتعديلها
Route::post('add_admissions',[new_admissions::class,'add_admissions']);
Route::post('update_admission/{id}',[new_admissions::class,'update_admission']);
// التقدم للمفاضلة وتعديل الطلب
Route::post('Applying_student',[Applying_admission::class,'Applying_student'])->middleware(['auth:api','check_applying_permission']);
Route::post('update_Applying_student',[Applying_admission::class,'update_Applying_student'])->middleware(['auth:api','check_applying_permission']);
// قبول طلب الطالب او حاجته للتعديل
Route::post('approved_admission/{id}',[admission_Management::class,'approve_admission'])->middleware(['auth:api','admission_Management']);
Route::post('need_update/{id}',[admission_Management::class,'need_update'])->middleware(['auth:api','admission_Management']);
// عرض الطلبات
Route::get('display_unapproved',[admission_Management::class,'display_unapproved'])->middleware(['auth:api','display_admission']);
Route::get('display_approved',[admission_Management::class,'display_approved'])->middleware(['auth:api','display_admission']);

// التحكم بفترة تقديم النفاضلة
Route::post('update_time/{id}',[time::class,'update'])->middleware(['auth:api','time_management']);
Route::post('store_time',[time::class,'store'])->middleware(['auth:api','time_management']);
Route::get('destroy_time/{id}',[time::class,'destroy'])->middleware(['auth:api','time_management']);
Route::get('activate_time/{id}',[time::class,'activate'])->middleware(['auth:api','time_management']);
// نتيجة المفاضلة
Route::get('admission_result/{id}',[admission_Management::class,'admission_result']);
Route::post('add_advertisements',[new_advertisements::class,'add_advertisements'])->middleware(['auth:api','advertisements']);
