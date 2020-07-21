@extends('layouts.master')

@section('title')
    Users
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-users"></span> Users
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-plus-square"></i> Admin Panel</a></li>
                <li class="active">Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style=" padding-bottom: 100%;">
            <div class="page-header">
                <a href="{{route('user.new')}}" class="btn btn-outline-info"><i class="fa fa-plus-circle"></i> Add User</a>
            </div>
            <div class="col-md-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-active" id="userTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->phone}}</td>
                                    <td>{{$u->roles->first()->name}}</td>
                                    <td>
                                        <a data-target="#e{{$u->id}}" data-toggle="modal" href="#" class="text-primary btn btn-primary"  data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="e{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <form method="post" action="{{route('user.update')}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i> confirm delete user account</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input name="id" type="hidden" value="{{$u->id}}">
                                                            <div class="form-group has-feedback">
                                                                <label for="full-name" class="control-label">User Name</label>
                                                                <input type="text" id="user-name" name="user-name" class="form-control" value="{{$u->name}}">
                                                                <span class="form-control-feedback glyphicon glyphicon-user"></span>
                                                            </div>
                                                            <div class="form-group has-feedback ">
                                                                <label for="email" class="control-label">Email</label>
                                                                <input type="email" id="email" name="email" class="form-control" value="{{$u->email}}">
                                                                <span class="form-control-feedback glyphicon glyphicon-envelope"></span>
                                                            </div>
                                                            <div class="form-group has-feedback">
                                                                <label for="phone" class="control-label">Phone NO</label>
                                                                <input type="tel" id="phone" name="phone" class="form-control" value="{{$u->phone}}">
                                                                <span class="form-control-feedback glyphicon glyphicon-phone"></span>
                                                            </div>
                                                            <div class="form-group has-feedback">
                                                                <label for="role" class="control-label">Role</label>
                                                                <select id="role" name="role" class="form-control" >
                                                                    <option value="">select role</option>
                                                                    @foreach($roles as $r)
                                                                        <option @if($u->roles->first()->id == $r->id) selected @endif value="{{$r->id}}">{{$r->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="form-control-feedback fa fa-user-md"></span>
                                                            </div>

                                                            <div class="form-group has-feedback ">
                                                                <label for="password" class="control-label">Password</label>
                                                                <input type="password" id="password" name="password" class="form-control">
                                                                <span class="form-control-feedback glyphicon glyphicon-lock"></span>
                                                            </div>
                                                            {{csrf_field()}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>

                                                    </div>
                                                    {{csrf_field()}}
                                                </form>
                                            </div>
                                        </div>

                                        <a href="#" data-toggle="modal" data-target="#d{{$u->id}}" class="text-danger btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash-o"></i></a>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="d{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <form method="get" action="{{route('user.delete')}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-warning"></i> Confirm delete user account</h4>
                                                        </div>
                                                        <div class="modal-body text-danger">
                                                            <input type="hidden" name="id" value="{{$u->id}}">
                                                            Are you sure want to delete this user account <b>"{{$u->name}}"</b>?
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


