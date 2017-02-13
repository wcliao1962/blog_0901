@extends('layouts.master')

@section('title', '文章詳細頁面')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('img/post-bg.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>Post {{ $post->id }}</h1>
                    <h2 class="subheading">{{ $post->title }}</h2>
                    <span class="meta">Posted by <a href="#">Start Bootstrap</a> on {{ $post->created_at }}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>{{ $post->content }}</p>
            </div>
        </div>
    </div>
</article>


<div class="panel-body">
    <!-- 顯示驗證錯誤 -->
@include('errors.errors')

<!-- 新comment的表單 -->
    <form action="/posts/{{$post->id}}/comments" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- 任務名稱 -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">評論</label>

            <div class="col-sm-6">
                <input type="text" name="title" id="title" class="form-control">
            </div>
        </div>

        <!-- 增加按鈕-->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> 增加評論
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Post Comments -->
@foreach($comments as $comment)
<comment>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="comment-preview">
                        <h2 class="post-title">
                            {{ $comment->id }}. {{ $comment->title }}
                        </h2>

                        <p class="post-meta">commented by <a href="#">Start Bootstrap</a> on {{ $comment->created_at }}</p>
                    </div>
                    <hr>
            </div>
        </div>
    </div>
</comment>
@endforeach
@endsection
