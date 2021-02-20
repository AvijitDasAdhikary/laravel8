<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home','DeveloperController@index');

Route::get('/dashboard','DashboardController@index');
Route::get('/task','DashboardController@task');

Route::get('/developer','DeveloperController@index');

Route::resources([
    'photos' => PhotoController::class,
    'todos' => TodoController::class,
    'departments' => DepartmentController::class,
    'masterformoptions' => MasterFormOptionsController::class,
    'formcodes' => FormCodesController::class,
    'forms' => FormsController::class,
    'formsection' => FormSectionController::class,
    'formitem' => FormItemController::class,
]);

