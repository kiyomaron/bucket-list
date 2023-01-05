@extends('layouts.app')
@section('content')
    
        <div class="card-body">
            <div>
                <h2>目標</h2>
                <p>{{ $task->title }}<p>
                <h2>登録した日</h2>
                <p>{{ $task->created_at->format('Y年m月d日') }}</p>
                <button>達成登録</button>
            </div>
        </div>

@endsection