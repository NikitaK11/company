<?php

Route::get('/', 'MainController@index')->name('home');
Auth::routes();



Route::get('/desk', 'DeskController@index')->name('admin');


Route::get('/stat', 'AdminController@stat');



Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/users/', 'AdminController@users')->name('admin-users');

Route::get('/admin/admin/user/add', 'AdminController@userAddView')->name('admin-user-add-view');

Route::post('/admin/admin/user/add', 'AdminController@userAdd')->name('admin-user-add');

Route::get('/admin/user', 'AdminController@user')->name('admin-user');


Route::get('/admin/user/edit', 'AdminController@userEditView')->name('admin-user-edit-view');

Route::post('/admin/user/update', 'AdminController@userEdit')->name('admin-user-edit');

Route::get('/admin/departments', 'AdminController@departments')->name('admin-departments');

Route::get('/admin/department', 'AdminController@department')->name('admin-department');


Route::get('/admin/department/edit', 'AdminController@departmentEdit')->name('admin-department-edit-view');

Route::get('/admin/department/update', 'AdminController@departmentUpdate');

Route::get('/admin/department/create-view', 'AdminController@departmentCreateView');

Route::get('/admin/department/create', 'AdminController@departmentCreate');

Route::get('/admin/projects', 'AdminController@projects')->name('admin-projects');

Route::get('/admin/project', 'AdminController@project')->name('admin-project');

Route::get('/admin/project/edit', 'AdminController@projectEdit')->name('admin-project-edit');

Route::post('/admin/project/update', 'AdminController@projectUpdate')->name('admin-project-update');

Route::get('/admin/project/create', 'AdminController@projectCreate')->name('admin-project-create');

Route::post('/admin/project/add', 'AdminController@projectAdd')->name('admin-project-add');

Route::get('/admin/tasks', 'AdminController@tasks')->name('admin-tasks');

Route::get('/admin/task', 'AdminController@task')->name('admin-task');

Route::get('/admin/task/edit', 'AdminController@taskEdit');

Route::post('/admin/task/update', 'AdminController@taskUpdate');

Route::get('/admin/task/create', 'AdminController@taskCreate');

Route::get('/admin/task/add', 'AdminController@taskAdd');




Route::get('/projects', 'ProjectController@index');

Route::get('/departments', 'DepartmentController@index');

Route::get('/users', 'UserController@index');

Route::get('/user', 'UserController@user');


Route::get('/tasks', 'TaskController@index');

Route::get('/task', 'TaskController@view');

Route::post('/task/complete', 'TaskController@complete');


Route::get('/home', 'MainController@index');

Route::get('/cabinet', 'UserController@userCabinet');













