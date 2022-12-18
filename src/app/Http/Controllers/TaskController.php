<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * タスク一覧 
     * @return \Illuminate\Support\Collection
     * */

    public function index()
    {
        return Task::orderByDesc('task_id')->get();
    }
}
