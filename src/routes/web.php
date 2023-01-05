<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
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
/* リスト表示 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at','asc')->get();
    return view('tasks',[
        'tasks' => $tasks
    ]);
});
// Route::get('/', [TaskController::class, 'index'])->name('task.index');

/* タスク追加 */
Route::post('/tasks', function(Request $request) {

    // validation
    $validator = Validator::make($request->all(),[
       'title' => 'required|max:255', 
    ]);

    // validation:error
    if($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // Eloquent model
    $tasks = new Task;
    $tasks->title = $request->title;
    // $tasks->created_at = '2023-01-05 22:00:00';
    // $tasks->updated_at = '2023-01-05 22:00:00';
    $tasks->is_achieved = false;
    $tasks->save();
    return redirect('/');

});

/*　タスクを削除 */
Route::delete('/task/{task}', function(Task $task) {
    $task->delete();
    return redirect('/');
});

/*　タスクを更新 */
Route::post('/taskedit/{tasks}', function(Task $tasks) {
    return view('taskedit', ['task' => $tasks]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*　タスク詳細ページを表示 */
// Route::resource('tasks', 'TaskController', ['only' => ['index', 'show']]);
Route::get('/{id}', [TaskController::class, 'show'])->name('tasks.show');