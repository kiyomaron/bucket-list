@extends('layouts.app')
@section('content')
    <div class="card-body">
        <div class="card-title">
            新しい目標
        </div>

        <!--バリデーションエラー表示に使用-->
        @include('common.errors')

        <!--登録フォーム-->
        <form action="{{url('tasks')}}" method="POST" class="form-horizontal">
            @csrf

            <!--目標-->
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            
            <!--目標宣言ボタン-->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </div>
        </form>
    </div>

    <!--登録されているリスト-->
    @if (count($tasks) > 0)
        <div class="card-body">
            <div>
                <table>
                    <!--テーブルヘッダ-->
                    <thead>
                        <th>バケットリスト</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!--テーブル本体-->
                    <tbody>
                        @foreach ($tasks as $task)

                            <tr>
                                <!--タイトル-->
                                <td class="table-text">
                                    <div><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></div>
                                </td>
                                <!--削除ボタン-->
                                <td>
                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection