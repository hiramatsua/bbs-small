<!-- tasks create.blade.php -->
@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">投稿する</div>
                    <div class="panel-body">
                    <!-- エラー表示 -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">タイトル</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                            </div>
                            <div class="form-group">
                                <label for="body">本文</label>
                                <textarea rows="4" cols="60" class="form-control" name="body" id="body" value="{{ old('body') }}">記入してください。</textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">投稿する</button>
                                <p><a href="#" onClick="history.back(); return false;">
                                        <i class="fa fa-btn fa-repeat"></i> 前のページにもどる</a></p>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
