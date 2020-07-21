@extends('layouts.master')

@section('title')
    Orders
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-archive"></span> Existed Orders
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-list"></i> Admin Panel</a></li>
                <li class="active">Orders</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style=" padding-bottom: 100%;">
            <div class="page-header">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-xs-12">
                        @foreach($orders as $order)
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel @if($order->status) panel-success @else panel-danger @endif">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$order->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                <span>Order :: {{$order->id}}</span>
                                                @if(!$order->status)
                                                    <a href="{{route('status',['id'=>$order->id])}}" class="pull-right"><i class="fa fa-taxi"></i></a>
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{$order->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p>Name : {{$order->name}}</p>
                                                    <p>Email : {{$order->email}}</p>
                                                    <p>Phone : {{$order->phone}}</p>
                                                    <p>Address : {{$order->address}}</p>
                                                </div>
                                                <div class="col-sm-8 table-responsive" style="border-left: 1px solid">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Title</th>
                                                            <th>Category-ID</th>
                                                            <th>Price</th>
                                                            <th>Qty</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        @foreach($order->cart->items as $item)
                                                            <tr>
                                                                <td>{{$item['item']['id']}}</td>
                                                                <td>{{$item['item']['title']}}</td>
                                                                <td>{{$item['item']['category_id']}}</td>
                                                                <td>{{$item['item']['price']}}</td>
                                                                <td>{{$item['qty']}}</td>
                                                                <td>{{$item['amount']}}</td>
                                                            </tr>
                                                            @endforeach
                                                        <tr>
                                                            <td colspan="5" class="text-right">Total amount : </td>
                                                            <td>{{$order->cart->totalAmount}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="panel-footer">
                                                <div class="float-right">
                                                    <a href="{{route('print',['id'=>$order->id])}}"><i class="fa fa-print fa-2x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
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



