<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Order;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function getWelcome(){
        $carouse= Post::OrderBy('id','desc')->paginate(2);
        $posts=Post::OrderBy('id','desc')->paginate(6);
        $category=Category::get();
        return view('welcome')->with(['cars'=>$carouse,'posts'=>$posts,'cate'=>$category]);
    }

    public function getByCategory($id){
        $carouse= Post::OrderBy('id','desc')->paginate(2);
        $posts=Post::whereCategory_id($id)->OrderBy('id','desc')->paginate(6);
        $category=Category::get();
        return view('welcome')->with(['cars'=>$carouse,'posts'=>$posts,'cate'=>$category]);
    }
    public function getSearch(Request $request){
        $search=$request['q'];
        $carouse= Post::OrderBy('id','desc')->paginate(2);
        $posts=Post::where('id','LIKE',"%$search%")->orWhere('title','LIKE',"%$search%")->orWhere('price','LIKE',"%$search%")->OrderBy('id','desc')->paginate(6);
        $category=Category::get();
        return view('welcome')->with(['cars'=>$carouse,'posts'=>$posts,'cate'=>$category]);
    }
    public function getAddCart($id){
        $post=Post::whereId($id)->firstOrFail();
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->addCart($post->id,$post);
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function getShowCart(){
        if(Session::has('cart')){
            $cate=Category::get();
            $cart=Session::get('cart');
            return view('show')->with(['items'=>$cart->items,'totalQty'=>$cart->totalQty,'totalAmount'=>$cart->totalAmount,'cate'=>$cate]);
        }else{
            return redirect()->route('/');
        }
    }
    public function getCartCancel(){
        Session::forget('cart');
        return redirect()->route('/');
    }
    public function getCartItemIncrease($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->increase($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function getCartItemDecrease($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->decrease($id);
        if(count($cart->items)<=0){
            Session::forget('cart');
        }else{
            Session::put('cart',$cart);
        }
        return redirect()->back();
    }
    public function postCheckout(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|min:5,numeric',
            'address'=>'required|max:100'
        ]);
        $order=new Order();
        $order->name=$request['name'];
        $order->email=$request['email'];
        $order->phone=$request['phone'];
        $order->address=$request['address'];
        $cart=Session::get('cart');
        $order->cart=serialize($cart);
        $order->save();
        Session::forget('cart');
        return redirect()->route('/')->with('info','We will call back you.');
    }
    public function getDetail($id){
        $post=Post::where('id',$id)->firstOrFail();
        $carousel=Post::OrderBy('id','desc')->paginate(2);
        $category=Category::get();
        $posts=Post::where('category_id',$post->category_id)->paginate(4);
        return view('detail')->with(['p'=>$post,'cars'=>$carousel,'cate'=>$category,'post'=>$posts]);
    }
}
