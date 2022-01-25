<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function signup(Request $req){
        $req->validate([
            "firstname"     =>      "required",
            "lastname"      =>      "required",
            "email"         =>      "required | unique:users,email",
            "password"      =>      "required | confirmed",
            "password_confirmation"     =>      "required"
        ]);
        $user = new User;
        $user->firstname    =     $req->firstname;
        $user->lastname     =     $req->lastname;
        $user->email        =     $req->email;
        $user->password     =     Hash::make($req->password);
        $user->save();

        $session = $req->session()->flash('success','SignUp Successfully Done');
        return redirect('login');

    }
    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();

        if(!$user || !Hash::check($req->password,$user->password)){
            return "Username or password is not matched";
        }else{
            $req->session()->put('user',$user);
            return redirect('dashboard');
        }
    }
    function addproducts(Request $req){
        $validatedData = $req->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
    
           $name = $req->file('image')->getClientOriginalName();
    
           $path = $req->file('image')->storeAs('public/images/',$name);
    
           $product = new Product;
    
           $product->name   =   $req->name;
           $product->desc   =   $req->desc;
           $product->image  =   $name;
    
           $product->save();
    
           return redirect('dashboard')->with('status', 'Data has been saved');
    
    }
    function viewProducts(){
        $products = Product::all();
        if(session()->has('user')){
            return view('dashboard',compact('products'));
        }
    }
}
