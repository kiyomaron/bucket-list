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

    /**
     * タスク登録
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *  */
    public function store(Request $request)
    {
        $task = Task::create($request->all());

        return $task
            ? response()->json($task, 201)
            : response()->json([], 500);
    }
}
