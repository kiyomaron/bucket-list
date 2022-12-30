<!-- ひとまず保留 -->
@extends('layouts.app')
@section('content')
<style>
    .trash-area,
    .body-area {
        cursor: pointer;
    }
    .trash-area:hover {
        opacity: 0.5;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <label for="task-input"><p>ゴミ箱<i class="fas fa-trash"></i></p></label>
            @if( count($posts) > 0)
            <table class="w-100 table table-hover">
                <thead>
                    <tr>
                        <th>タスク</th>
                        <th>日付</th>
                        <th class="float-end">元に戻す</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($posts as $post)
                        <tr id="tr_{{$post->id}}">
                        
                            <td class="w-50"><span class="body-area">{{$post->text}}</span></td>
                            <td><span class="date-area">{{$post->create_time}}</span></td>
                            <td><span class="trash-area float-end" onClick="restore({{$post->id}})"><i class="fas fa-undo fa-2xl"></i></span>
                            </td>
                        
                        </tr>
                        @endforeach                  
                </tbody>
            </table>
            <form action="/delete" method="post" onSubmit="return emptyTrash()">
                @csrf
                <button class="btn btn-outline-danger" type="submit">ゴミ箱を空にする</button>
            </form>
            @else
            <p>データはありません。</p>
            @endif
            
        </div>
    </div>
</div>
<script>
// $(function(){
function restore(id) {
    console.log(id);
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
        type: 'post',
        data: {
            'id' : id
        },
        datatype: 'json',
        url: '/restore'
    })
    .done(function(data){ 
        console.log(data);
        $('#tr_'+id).remove();
    })
    .fail(function(data){ 
        console.log(data);
        alert("error!");
    });
}
function emptyTrash() {
    if(window.confirm('本当に実行しますか？')) {
        return true;
    } else {
        return false;
    }
}
// });
</script>
@endsection