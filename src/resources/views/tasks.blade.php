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
                    <input type="text" name="item_name" class="form-control">
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

@endsection