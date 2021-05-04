@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="column col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">投稿一覧</div>
                        <div class="text-right">
                            <a href="{{ route('create') }}" class="btn btn-default btn-block">
                                投稿する</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="50">No.</th>
                                <th width="150">タイトル</th>
                                <th width="150">投稿者名</th>
                                <th width="600">本文</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->title }}</td>
                                    <td>{{ $list->author }}</td>
                                    <td>{{ $list->body }}</td>
                                    <td>
                                        <a href="{{ route('edit', ['id' => $list->id]) }}">
                                            編集</a>
                                        <a href="{{ route('remove', ['id' => $list->id]) }}">
                                            削除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
