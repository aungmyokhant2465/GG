<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <link href="{{URL::to('bst/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::to('fa/css/all.css')}}" rel="stylesheet">
    <link href="{{URL::to('images/shoppingCart1.png')}}" rel="icon">
    <style type="text/css">
        @font-face {
            font-family: myfont;
            src: url("{{URL::to('mfs/Sho-CardCapsNF.ttf')}}");
        }
        .myheader{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <h1 class="myheader" style="font-family: myfont;"><b>G</b><i>G</i> Shopping</h1>
                <h3 class="myheader">Mawlamyine</h3>
                <h4 class="myheader" style="font-weight: bold; font-style: italic"> 09766354206 </h4>
                <div class="row">
                    <div class="col-6">
                        <p>Order ID :</p>
                        <p>Customer's Name : </p>
                        <p>Ordered date : </p>
                    </div>
                    <div class="col-6">
                        @foreach($items as $order)
                            <p>{{$order->id}}</p>
                            <p>{{$order->name}}</p>
                            <p>{{$order->created_at->diffForHumans()}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                           <th>Item name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>
                        @foreach($order->cart->items as $item)
                            <tr>
                                <td>{{$item['item']['title']}}</td>
                                <td>{{$item['item']['price']}}</td>
                                <td>{{$item['qty']}}</td>
                                <td>{{$item['amount']}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right">Total Amount</td>
                            <td>{{$order->cart->totalAmount}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Government test</td>
                            <td>{{$order->cart->totalAmount*0.05}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Total Amount</td>
                            <td>{{$order->cart->totalAmount-$order->cart->totalAmount*0.05}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="{{URL::to('bst/js/jquery.js')}}"></script>
<script src="{{URL::to('bst/js/bootstrap.js')}}"></script>
</html>