<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Auth;

class memberController extends Controller
{
    public function getDashboard(){
        $posts=Post::get();
        $orders=Order::get();
        $users=User::get();
        $categories=Category::get();
        return view('Auth.dashboard')->with(['post'=>$posts,'order'=>$orders,'user'=>$users,'category'=>$categories]);
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
