@extends('layouts.master')

@section('title')
    New User
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-plus-circle"></span> New User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-plus-square"></i> Admin Panel</a></li>
                <li class="active">New User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style=" padding-bottom: 100%;">
            <div class="page-header">
                <a href="{{route('users')}}" class="btn btn-outline-info"><i class="fa fa-users"></i> Users</a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center text-info"><i class="fa fa-user-plus fa-4x"></i></div>
                <h3><strong>Add User</strong></h3>
                <form method="post" action="{{route('user.new')}}">
                    <div class="form-group has-feedback {{$errors->has('user-name')? 'has-error':''}}">
                        <label for="full-name" class="control-label">User Name</label>
                        <input type="text" id="user-name" name="user-name" class="form-control" value="{{old('user_name')}}">
                        <span class="form-control-feedback glyphicon glyphicon-user"></span>
                        @if($errors->has('user-name'))<strong class="text-danger">{{$errors->first('user-name')}}</strong>@endif
                    </div>
                    <div class="form-group has-feedback {{$errors->has('email')? 'has-error':''}}">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                        <span class="form-control-feedback glyphicon glyphicon-envelope"></span>
                        @if($errors->has('email'))<strong class="text-danger">{{$errors->first('email')}}</strong>@endif
                    </div>
                    <div class="form-group has-feedback {{$errors->has('phone')? 'has-error':''}}">
                        <label for="phone" class="control-label">Phone NO</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="{{old('phone')}}">
                        <span class="form-control-feedback glyphicon glyphicon-phone"></span>
                        @if($errors->has('phone'))<strong class="text-danger">{{$errors->first('phone')}}</strong>@endif
                    </div>
                    <div class="form-group has-feedback {{$errors->has('role')? 'has-error':''}}">
                        <label for="role" class="control-label">Role</label>
                        <select id="role" name="role" class="form-control">
                            <option value="">select role</option>
                            @foreach($roles as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                        </select>
                        <span class="form-control-feedback fa fa-user-md"></span>
                        @if($errors->has('role'))<strong class="text-danger">{{$errors->first('role')}}</strong>@endif
                    </div>

                    <div class="form-group has-feedback {{$errors->has('password')? 'has-error':''}}">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <span class="form-control-feedback glyphicon glyphicon-lock"></span>
                        @if($errors->has('password'))<strong class="text-danger">{{$errors->first('password')}}</strong>@endif
                    </div>
                    <div class="form-group has-feedback {{$errors->has('password')? 'has-error':''}}">
                        <label for="con-password" class="control-label">Confirm Password</label>
                        <input type="password" id="con-password" name="con-password" class="form-control">
                        <span class="form-control-feedback glyphicon glyphicon-lock"></span>
                        @if($errors->has('con-password'))<strong class="text-danger">{{$errors->first('con-password')}}</strong>@endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>

        </section>
        @if(Session('info'))
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="tem alert alert-success navbar-fixed-bottom"><span class="glyphicon glyphicon-ok-circle"></span> {{Session('info')}}</div>
                </div>
            </div>
        @endif

    </div>
@stop

@section('script')

@stop

