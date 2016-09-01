@extends('admin.layouts.master')

@section('title', '新增文章')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增文章 <small>請輸入文章內容</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 文章管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

@include('admin.layouts.partials.validation')

<div class="row">
    <div class="col-lg-12">
       {{Form::open(['route'=>'admin.posts.store', 'method'=>'POST','role'=>'form'])}}

            <div class="form-group">
                <label>標題：</label>
                {{Form::text('title',null,['class'=>"form-control",'placeholder'=>"請輸入文章標題"])}}
            </div>

            <div class="form-group">
                <label>內容：</label>
                {{Form::textarea('content', null, ['class'=>"form-control", 'rows'=>10])}}
            </div>

            <div class="form-group">
                <label>精選？</label>
                {{Form::select('is_feature', [0=>'否', 1=>'是'], null, ['class'=>"form-control"])}}
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        {{Form::close()}}
    </div>
</div>
<!-- /.row -->
@endsection
