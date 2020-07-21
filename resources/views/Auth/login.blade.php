<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GG | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <h2><i>G</i><strog>G</strog></h2>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg glyphicon glyphicon-log-in"> Sign in to continue...</p>

        <form action="{{route('login.post')}}" method="post">
            <div class="form-group  {{ $errors->has('email')? 'has-error' :''}} has-feedback" >
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{old('email')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if($errors->has('email'))
                    <strong>{{$errors->first('email')}}</strong>
                    @endif
            </div>
            <div class="form-group has-feedback {{$errors->has('password')? 'has-error': ''}}">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="{{old('password')}}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if($errors->has('password'))
                    <strong>{{$errors->first('password')}}</strong>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    {{csrf_field()}}
                </div>
                <!-- /.col -->
            </div>
        </form>


        <a href="#">I forgot my password</a><br>
        <a href="#">Register</a>

    </div>
    @if(Session('err'))
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="tem alert alert-success navbar-fixed-bottom"><span class="glyphicon glyphicon-ok-circle"></span> {{Session('err')}}</div>
            </div>
        </div>
    @endif
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
        $('#email').focus();
    });
</script>
</body>
</html>

