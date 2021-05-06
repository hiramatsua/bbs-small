@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="column col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-btn fa-list"></i> 投稿一覧</div>
                    @if (session('message'))
                        <div class="alert alert-success mt-4 mb-4">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="text-center" style="padding-top:4px;">
                        <a href="{{ route('create') }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-pencil"></i> 投稿する</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="150">タイトル</th>
                                <th width="150">投稿者名</th>
                                <th width="450">本文</th>
                                <th width="200">投稿日時</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list->title }}</td>
                                    <td>{{ $list->author }}</td>
                                    <td>{{ $list->body }}</td>
                                    <td>{{ $list->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('edit', ['id' => $list->id]) }}" class="btn btn-primary">
                                            <i class="fa fa-btn fa-edit"></i> 編集</a>
                                        <a href="{{ route('remove', ['id' => $list->id]) }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i> 削除</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if(count($lists) < 1)
                                <p>投稿がありません</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
