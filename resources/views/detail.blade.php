@extends('template.clientMaster')
@section('title')
    Welcome
@stop
@section('content')
    <div>
        @include('template.carousel')
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title">ID : {{$p->id}}</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="img-thumbnail">
                                    <img src="{{route('image',['img_name'=>$p->image_name])}}" class="img img-rounded img-fluid" alt="image">
                                </div>
                            </div>
                            <div class="col-sm-8" style="border-left: 1px solid mediumblue;">
                                <div class="row">
                                    <div class="col-5">
                                        <p>Title :</p>
                                        <p>Price :</p>
                                        <p>Description :</p>
                                        <p>Category :</p>
                                    </div>
                                    <div class="col-7">
                                        <p>{{$p->title}}</p>
                                        <p>{{$p->price}}</p>
                                        <p>{{$p->description}}</p>
                                        <p>{{$p->category->cate_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{'/'}}" class="text-info float-right"><i class="fa fa-shopping-bag"> Continue Shopping </i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5 bg-dark p-3">
            @foreach($post as $p)
                <div class="col-sm-3 col-xs-12">
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
            {{$post->links()}}
        </div>
    </div>
@stop