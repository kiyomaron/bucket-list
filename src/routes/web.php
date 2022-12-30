<?php
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
    return view('tasks');
});
// Route::get('/', [TaskController::class, 'index'])->name('task.index');

/* タスク追加 */
Route::post('/tasks', function(Request $request) {
    dd($request);

    // validation
    $validator = Validator::make($request->all(),[
       'item_name' => 'required|max:255', 
    ]);

    // validation:error
    if($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
});

/*　タスクを削除 */
Route::delete('/task/{task}', function(Task $task) {
    //
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
