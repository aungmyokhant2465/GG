@extends('layouts.master')

@section('title')
    Add Category
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-list"></span>New Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-list"></i> Admin Panel</a></li>
                <li class="active">add-category</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style=" padding-bottom: 100%;">
            <div class="page-header">
                <a href="{{route('categories')}}" class="btn btn-outline-info"><i class="fa fa-backward"></i> Categories</a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-offset-2">

                        <form method="post" action="{{route('category.new')}}">
                            <div class="panel">
                                <div class="panel-heading"  style="background: mediumseagreen"><strong class="panel-title"><i class="fa fa-plus-circle"></i> New Category</strong></div>
                                <div class="panel-body">
                                    <div class="form-group has-feedback{{$errors->has('cate_name')? 'has-error':''}}">
                                        <label for="cate_name" class="control-label">Category Name</label>
                                        <input class="form-control" id="cate_name" name="cate_name" type="text">
                                        @if($errors->has('cate_name'))<span class="text-danger">{{$errors->first('cate_name')}}</span> @endif
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary btn-block">Add</button>
                                    </div>
                                    {{csrf_field()}}
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



