<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(){
        $order=Order::OrderBy('id','desc')->get();
        $order->transform(function ($item,$key){
            $item->cart=unserialize($item->cart);
            return $item;
        });
        echo "<script>console.log(".json_encode($order).");</script>";
        return view('admin.order.order')->with(['orders'=>$order]);
    }
    public function getStatus($id){
        $order=Order::whereId($id)->firstOrFail();
        $order->status=1;
        $order->save();
        return redirect()->back();
    }
    public function getPrint($id){
        $orders=Order::where('id',$id)->get();
        $orders->transform(function($item,$key){
            $item->cart=unserialize($item->cart);
            return $item;
        });
        return view('admin.order.print')->with(['items'=>$orders]);
    }
}
