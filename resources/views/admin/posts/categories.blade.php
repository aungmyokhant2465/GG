@extends('layouts.master')

@section('title')
    Categories
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-list"></span> Categories
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-list"></i> Admin Panel</a></li>
                <li class="active">categories</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style=" padding-bottom: 100%;">
            <div class="page-header">
                <a href="{{route('category.new')}}" class="btn btn-outline-info"><i class="fa fa-backward"></i> Add Category</a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div>
                            <table class="table" style="background: darkgray">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $c)
                                        <tr>
                                            <td>{{$c->id}}</td>
                                            <td>{{$c->cate_name}}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-cogs"></i>
                                                        <span class="caret"></span>
                                                    </a>

                                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                                        <li><a href="#" style="color: #2b669a"><span class="fa fa-edit" ></span> Edit</a></li>
                                                        <li class="divider" role="separator"></li>
                                                        <li><a href="#" style="color: darkred"><span class="fa fa-trash"> Delete</span></a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
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



