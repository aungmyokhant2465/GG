
@extends('template.clientMaster')
@section('title')
    Show Cart
@stop
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-8">
                <div class="card shadow">
                    <div class="card-header text-info">
                        <i class="fa fa-list fa-2x"></i> <span style="font-size: 30px">Selected Items</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="col-2"><img src="{{route('image',['image_name'=>$item['item']['image_name']])}}" class="img img-fluid img-rounded img-circle"></td>
                                        <td>{{$item['item']['title']}}</td>
                                        <td>{{$item['item']['price']}}</td>
                                        <td>
                                            <a href="{{route('item.increase',['id'=>$item['item']['id']])}}" class="text-primary"><i class="fa fa-plus-square"style="font-size: 25px"></i></a>
                                             {{$item['qty']}}
                                            <a href="{{route('item.decrease',['id'=>$item['item']['id']])}}" class="text-primary"><i class="fa fa-minus-square"style="font-size: 25px"></i></a>
                                        </td>
                                        <td>{{$item['amount']}}</td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">Total Amount : </td>
                                        <td>{{$totalAmount}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('/')}}" class="text-primary float-left">Continuous Shopping <i class="fa fa-shopping-bag"></i></a>
                        <a href="{{route('cart.cancel')}}" class="text-danger float-right">Cancel <i class="fa fa-times-circle"></i></a>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                <form method="post" action="{{route('checkout')}}">
                    <div class="card shadow-sm">
                        <div class="card-header text-info"><i class="fa fa-info-circle fa-2x"></i>Customer Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Customer's Name</label>
                                <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) is-invalid @endif">
                                @if($errors->has('name'))<span class="invalid-feedback">{{$errors->first('name')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @if($errors->has('email')) is-invalid @endif">
                                @if($errors->has('email'))<span class="invalid-feedback">{{$errors->first('email')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" name="phone" id="phone" class="form-control @if($errors->has('phone')) is-invalid @endif">
                                @if($errors->has('phone'))<span class="invalid-feedback">{{$errors->first('phone')}}</span> @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control @if($errors->has('address'))is-invalid @endif" name="address" id="address" maxlength="100"></textarea>
                                @if($errors->has('address'))<span class="invalid-feedback">{{$errors->first('address')}}</span> @endif
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Checkout</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@stop