<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/register','Auth\RegisterController@show');
Route::post('users/register','Auth\RegisterController@register');

Route::get('users/logout','Auth\LoginController@logout');

Route::get('users/login','Auth\LoginController@show');
Route::post('users/login','Auth\LoginController@login');

Route::get('users','admin\UserController@index');
Route::get('users/{id}/edit','admin\UserController@edit');
Route::post('users/{id}/edit','admin\UserController@update');
Route::get('users/view','admin\UserController@view');
Route::post('users/delete','admin\UserController@delete');

//role
Route::get('role','admin\RoleController@index');
Route::get('role/view','admin\RoleController@view');
Route::post('role','admin\RoleController@add');
Route::post('role/delete','admin\RoleController@delete');
Route::get('role/select','admin\RoleController@select');
//endrole

Route::group(array('prefix' => 'member', 'namespace' => 'member', 'middleware' => 'member'), function () {
//department
        Route::get('department', 'DepartmentController@index');
        Route::get('department/view', 'DepartmentController@view');
        Route::post('department', 'DepartmentController@add');
        Route::post('department/delete', 'DepartmentController@delete');
        Route::get('department/select', 'DepartmentController@select');
//end department
//employee
        Route::get('employee', 'EmployeeController@index');
        Route::post('employee', 'EmployeeController@add');
        Route::post('employee/delete', 'EmployeeController@delete');
        Route::get('employee/select', 'EmployeeController@select');
        Route::get('employee/view', 'EmployeeController@view');
//end empoyee
//project
        Route::get('project', 'ProjectController@index');
        Route::post('project', 'ProjectController@add');
        Route::get('project/view', 'ProjectController@view');
        Route::get('project/select', 'ProjectController@select');
        Route::post('project/delete', 'ProjectController@delete');
//end project
//task
        Route::get('task', 'TaskController@index');
        Route::post('task', 'TaskController@add');
        Route::get('task/view', 'TaskController@view');
        Route::get('task/select', 'TaskController@select');
        Route::post('task/delete', 'TaskController@delete');
//end task
//task
        Route::get('pcategory', 'ProjectCategoryController@index');
        Route::post('pcategory', 'ProjectCategoryController@add');
        Route::get('pcategory/view', 'ProjectCategoryController@view');
        Route::get('pcategory/select', 'ProjectCategoryController@select');
        Route::post('pcategory/delete', 'ProjectCategoryController@delete');
//end task
//client
        Route::get('client', 'ClientController@index');
        Route::post('client', 'ClientController@add');
        Route::get('client/view', 'ClientController@view');
        Route::get('client/select', 'ClientController@select');
        Route::post('client/delete', 'ClientController@delete');
//end client
//task
        Route::get('ccategory', 'ClientCategoryController@index');
        Route::post('ccategory', 'ClientCategoryController@add');
        Route::get('ccategory/view', 'ClientCategoryController@view');
        Route::get('ccategory/select', 'ClientCategoryController@select');
        Route::post('ccategory/delete', 'ClientCategoryController@delete');
//end task
//task
        Route::get('tcategory', 'TaskCategoryController@index');
        Route::post('tcategory', 'TaskCategoryController@add');
        Route::get('tcategory/view', 'TaskCategoryController@view');
        Route::get('tcategory/select', 'TaskCategoryController@select');
        Route::post('tcategory/update', 'TaskCategoryController@update');
        Route::post('tcategory/delete', 'TaskCategoryController@delete');
//end task
//work
        Route::get('work', 'WorkController@index');
        Route::post('work', 'WorkController@add');
        Route::get('work/view', 'WorkController@view');
        Route::get('work/select', 'WorkController@select');
        Route::post('work/delete', 'WorkController@delete');
//end work

});
?>



