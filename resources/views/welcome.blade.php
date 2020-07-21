@extends('template.clientMaster')
@section('title')
    Welcome
    @stop
@section('content')
    <div>
        @include('template.carousel')
    </div>
    <div class="container mt-3">
        <div class="row">
            @if(Session('info'))
            @endif
            @foreach($posts as $p)
                <div class="col-xs-12 col-sm-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <div class="img-thumbnail">
                                <img src="{{route('image',['image_name'=>$p->image_name])}}" class="img img-fluid">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p>Title :</p>
                                    <p>Price :</p>
                                </div>
                                <div class="col-6">
                                    <p>{{$p->title}}</p>
                                    <p>{{$p->price}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <a href="{{route('detail',['id'=>$p->id])}}" type="button" class="btn btn-outline-info btn-block">Detail</a>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <a href="{{route('cart.add',['id'=>$p->id])}}" type="button" class="btn btn-outline-primary btn-block"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            {{$posts->links()}}

        </div>
    </div>
    @stop