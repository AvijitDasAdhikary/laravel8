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
    'formitemcodes' => FormItemCodeController::class,
    'formitemoptions' => FormItemOptionController::class,
]);

Route::post('formitem/create/{formId}', ['uses' => 'FormItemController@getFormTitle']);
Route::post('formitemcodes/create/formSection/{formId}', ['uses' => 'FormItemCodeController@getFormTitle']);
Route::post('formitemcodes/create/formItem/{SectionId}', ['uses' => 'FormItemCodeController@getSectionTitle']);
Route::post('formitemcodes/create/formCode/{CodeId}', ['uses' => 'FormItemCodeController@getformItemTitle']);

Route::post('formitemoptions/create/formSection/{formId}', ['uses' => 'FormItemOptionController@getFormTitle']);
Route::post('formitemoptions/create/formItem/{SectionId}', ['uses' => 'FormItemOptionController@getSectionTitle']);