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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Tasks
Route::resource('tasks', 'TaskController');

// Projects
Route::resource('projects', 'ProjectController');

// Update tasks priorities in accordance with drag and drop option
Route::post('/task/update-priorities', 'TaskController@updatePriorities');

// Get tasks with selected Projects Only
Route::get('/project/tasks', 'ProjectController@projectTasks');

//Show Project List with relevant tasks only
Route::get('/projects-with-tasks', 'TaskController@projectsWithTasks');
