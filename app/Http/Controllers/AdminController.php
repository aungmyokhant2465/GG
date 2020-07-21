<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use PHPUnit\Util\RegularExpression;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;

class AdminController extends Controller
{
    public function getNewUser(){
        $role=Role::get();
        return view('admin.users.register')->with(['roles'=>$role]);
    }
    public function postRegister(Request $request){
        $this->validate($request,[
            'user-name'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required',
            'role'=>'required',
            'password'=>'required|min:5',
            'con-password'=>'required|same:password'
        ]);
        $user=new User();
        $user->name=$request['user-name'];
        $user->email=$request['email'];
        $user->phone=$request['phone'];
        $user->password=bcrypt($request['password']);
        $user->save();
        $user->syncRoles($request['role']);
        Return redirect()->back()->with('info','The account have been created.');
    }
    public function getUsers(){
        $roles=Role::get();
        $users=User::get();
        return view('admin.users.users')->with(['users'=>$users,'roles'=>$roles]);
    }
    public function getUserDelete(Request $request){
        $id=$request['id'];
        $user=User::whereId($id)->firstOrFail();
        $user->delete();
        return redirect()->back()->with('info','The account have been deleted.');
    }
    public function postUpdateUser(Request $request){
        $id=$request['id'];
        $user=User::whereId($id)->first();
        $user->name=$request['user-name'];
        $user->email=$request['email'];
        $user->phone=$request['phone'];
        if($request['password']){
            $user->password=bcrypt($request['password']);
        }
        $user->update();
        $user->syncRoles($request['role']);
        return redirect()->back()->with('info','The account have been updated.');
    }
    public function getAddCategory(){
        return view('admin.posts.addCategory');
    }
    public function postAddCategory(Request $request){
        $this->validate($request,[
            'cate_name'=>'required|unique:categories'
        ]);
        $category=new Category();
        $category->cate_name=$request['cate_name'];
        $category->save();
        return redirect()->back()->with('info','The new category have been created.');
    }
    public function getCategories(){
        $cate=Category::get();
        return view('admin.posts.categories')->with(['categories'=>$cate]);
    }
    public function getAddPost(){
        $cates=Category::get();
        return view('admin.posts.addPost')->with(['cates'=>$cates]);
    }
    public function postAddPost(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required|numeric',
            'description'=>'required|max:50',
            'image'=>'required|mimes:jpg,png,jpeg',
            'category'=>'required'
        ]);
        $image_file=$request->file('image');
        $image_name=date('d-m-y-h-i-s').'.'.$request->file('image')->getClientOriginalExtension();
        $post=new Post();
        $post->title=$request['title'];
        $post->price=$request['price'];
        $post->description=$request['description'];
        $post->image_name=$image_name;
        $post->category_id=$request['category'];
        $post->user_id=Auth::user()->id;
        Storage::disk('image')->put($image_name,File::get($image_file));
        $post->save();
        return redirect()->back()->with('info','The post have been created.');
    }
    public function getPosts(){
        $posts=Post::OrderBy('id','desc')->get();
        return view('admin.posts.posts')->with(['posts'=>$posts]);
    }
    public function getImage($image_name){
        $file=Storage::disk('image')->get($image_name);
        return response($file);
    }
    public function getPostDelete(Request $request){
        $post=Post::whereId($request['id'])->firstOrFail();
        Storage::disk('image')->delete($post->image_name);
        $post->delete();
        return redirect()->back()->with('info','The post have been removed.');
    }
    public function getPostEdit($id){
        $post=Post::whereId($id)->firstOrFail();
        $cates=Category::get();
        return view('admin.posts.editPost')->with(['post'=>$post,'cates'=>$cates]);
    }
    public function postPostUpdate(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required|numeric',
            'description'=>'required|max:50'
        ]);
        $post=Post::whereId($request['id'])->firstOrFail();
        if($request->file('image')){
            Storage::disk('image')->delete($post->image_name);
            $image_name=date('d-m-y-h-i-s').'.'.$request->file('image')->getClientOriginalExtension();
            $post->image_name=$image_name;
            Storage::disk('image')->put($image_name,File::get($request->file('image')));
        }
        $post->title=$request['title'];
        $post->price=$request['price'];
        $post->description=$request['description'];
        $post->update();
        return redirect()->back()->with('info','The post have been updated.');
    }

}
