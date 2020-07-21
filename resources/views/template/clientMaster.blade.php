<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{URL::to('bst/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('fa/css/all.css')}}" rel="stylesheet">
    <link href="{{URL::to('images/shoppingCart1.png')}}" rel="icon">
    <title>@yield('title')</title>
    <style type="text/css">
        @font-face {
            font-family: myFont;
            src: url("{{URL::to('mfs/Sho-CardCapsNF.ttf')}}");
        }
        #carouselText,#carouselText1,.navbar-brand{
            font-family: myFont;
        }
    </style>
</head>
<body>
<div>
    @include('template.navbar');
</div>
@yield('content')
<script src="{{URL::to('bst/js/jquery.js')}}"></script>
<script src="{{URL::to('bst/js/bootstrap.js')}}"></script>
<script>
    $(function () {
        setTimeout(function () {
            $('.alert').fadeOut();
        },2000);
    })
</script>
</body>
</html>