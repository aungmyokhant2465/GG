@extends('layouts.master')

@section('title')
    Posts
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-list"></span> Available Posts
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-list"></i> Admin Panel</a></li>
                <li class="active">posts</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style=" padding-bottom: 100%;">
            <div class="page-header">
                <a href="{{route('post.new')}}" class="btn btn-outline-info"><i class="fa fa-plus-circle"></i> Add Post</a>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="table-responsive">
                            <table id="allPost" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Post of User</th>
                                    <th>Category</th>
                                    <th>Upload Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td class="col-sm-2"><img src="{{route('image',['image_name'=>$p->image_name])}}" alt="Image" class="img-responsive img-rounded"></td>
                                        <td>{{$p->title}}</td>
                                        <td>{{$p->price}}</td>
                                        <td>{{$p->description}}</td>
                                        <td>{{$p->User->name}}</td>
                                        <td>{{$p->Category->cate_name}}</td>
                                        <td>{{date('d-m-Y h:i A'),strtotime($p->created_at)}}</td>
                                        <td>
                                            <a href="{{route('post.edit',['id'=>$p->id])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                            <a data-target="#d{{$p->id}}" data-toggle="modal" href="#" class="text-danger"><i class="fa fa-trash-o fa-2x"></i></a>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="d{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <form method="get" action="{{route('post.delete')}}">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i> Confirm delete user account</h4>
                                                            </div>
                                                            <div class="modal-body text-danger">
                                                                <input type="hidden" name="id" value="{{$p->id}}">
                                                                Are you sure want to delete this post <b>"{{$p->title}}"</b>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Confirm</button>
                                                            </div>

                                                        </div>
                                                        {{csrf_field()}}
                                                    </form>
                                                </div>
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



