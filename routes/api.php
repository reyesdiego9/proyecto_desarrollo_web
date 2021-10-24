<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CarreraAlumnoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseStateController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('adminLogin', [LoginController::class, 'login']);
Route::post('exit', [LoginController::class, 'logout'])->middleware('auth:sanctum');
Route::apiResource('estado_alumno', CourseStateController::class);
Route::apiResource('roles', RolController::class);
Route::apiResource('administrador', AdministradorController::class);
Route::apiResource('estudiante', StudentController::class);
Route::apiResource('administrador', AdministradorController::class);
Route::apiResource('asignatura/estudiante', CursoController::class);
Route::apiResource('nota', NotaController::class);
Route::apiResource('carrera/alumno', CarreraAlumnoController::class);
