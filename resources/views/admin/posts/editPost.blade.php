@extends('layouts.master')

@section('title')
    Edit Post
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-Edit fa-2x"></span> Edit Post
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-list"></i> Admin Panel</a></li>
                <li class="active">edit-post</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style=" padding-bottom: 100%;">
            <div class="page-header">
                <a href="{{route('posts')}}" class="btn btn-outline-info"><i class="fa fa-backward"></i> Back</a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                        <form method="post" action="{{route('post.update')}}" enctype="multipart/form-data">
                            <div class="panel">
                                <div class="panel-heading"  style="background: mediumseagreen"><strong><i class="fa fa-plus-edit"></i> Edit Post</strong></div>
                                <div class="panel-body">
                                    <input type="hidden" name="id" value="{{$post->id}}">
                                    <div class="form-group has-feedback {{$errors->has('image')?'has-error':''}}">
                                        <label class="control-label" for="title"><i class="fa fa-image"></i> Image</label>
                                        <input type="file" id="image" name="image">
                                        @if($errors->has('image'))<span class="text-danger">{{$errors->first('image')}}</span> @endif
                                    </div>
                                    <div class="form-group  has-feedback {{$errors->has('title')?'has-error':''}}">
                                        <label class="control-label" for="title">Title</label>
                                        <input value="{{$post->title}}" type="text" id="title" name="title" class="form-control ">
                                        @if($errors->has('title'))<span class="text-danger">{{$errors->first('title')}}</span> @endif
                                    </div>
                                    <div class="form-group has-feedback {{$errors->has('price')?'has-error':''}}">
                                        <label class="control-label" for="price">Price</label>
                                        <input value="{{$post->price}}" type="number" id="price" name="price" class="form-control  ">
                                        @if($errors->has('price'))<span class="text-danger">{{$errors->first('price')}}</span> @endif
                                    </div>
                                    <div class="form-group has-feedback {{$errors->has('description')?'has-error':''}}">
                                        <label class="control-label" for="description">Description</label>
                                        <textarea class="form-control " name="description" id="description">{{$post->description}}</textarea>
                                        @if($errors->has('description'))<span class="text-danger">{{$errors->first('description')}}</span> @endif
                                    </div>
                                    <div class="form-group has-feedback {{$errors->has('description')?'has-error':''}}">
                                        <label class="control-label" for="category">Category</label><br>
                                        @foreach($cates as $c)
                                            <input type="radio" name="category" id="category" value="{{$c->id}}" @if($post->category_id==$c->id) checked @endif>{{$c->cate_name}}
                                        @endforeach<br>
                                        @if($errors->has('category'))<span class="text-danger">{{$errors->first('category')}}</span> @endif
                                    </div>

                                </div>
                                <div class="panel-footer text-right">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg" style="color: black"> Update </button>
                                        {{csrf_field()}}
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        @if(Session('info'))
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="tem alert alert-success navbar-fixed-bottom"><span class="glyphicon glyphicon-ok-circle"></span> {{Session('info')}}</div>
                </div>
            </div>
        @elseif(Session('err'))
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="tem alert alert-danget navbar-fixed-bottom"><span class="glyphicon glyphicon-exclamation-sign">{{Session('err')}}</span></div>
                </div>
            </div>
        @endif

    </div>
@stop

@section('script')

@stop



