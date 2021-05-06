<!-- remove -->
@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">投稿の削除</div>
                    <div class="panel-body">
                        <!-- エラー表示 -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('remove', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="number">No.</label>
                                <span>{{ $item->id }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">タイトル</label>
                                <p>{{ $item->title }}</p>
                            </div>
                            <div class="form-group">
                                <label for="body">本文</label>
                                <p>{{ $item->body }}</p>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-danger" onclick='return confirm("本当に削除してもよろしいですか？");'>削除する</button>
                            </div>
                        </form>
                    </div>
                </nav>
                <p><a href="{{ route('home') }}">
                                        <i class="fa fa-btn fa-repeat"></i> 投稿一覧にもどる</a></p>
            </div>
        </div>
    </div>
@endsection
