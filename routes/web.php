<?php

Route::get('/', 'TasksController@index');

Route::post('/tasks/create', 'TasksController@store');
Route::patch('/tasks/{task}', 'TasksController@update');
Route::delete('/tasks/{task}', 'TasksController@destroy');
