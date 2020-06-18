<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Customers;
use App\Invoice_details;
use App\Invoices;
use App\Products;
use App\Slides;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;

class HomepageController extends Controller
{
    use AuthenticatesUsers;
    //
    public function getHomepage(){

        return view('admin/home_page/homepage');
    }

    //index
    public function getIndex(){
        $slides = Slides::all();
        $new_products = Products::where('view', 1)->paginate(5);
//        $new_products = Products::paginate(1);
        $promoted_product = Products::where('promoted_price', '<>', 0)->get();
        return view('web/home_page/index', compact('slides', 'new_products', 'promoted_product'));
    }

    //product type
    public function getProductType($cat){
        $product_cat = Products::where('cat_id', $cat)->get();
        $other_products = Products::where('cat_id', '<>', $cat)->paginate(5);
        $categories = Categories::all();
        $category_name = Categories::where('id', $cat)->first();
        return view('web/product/product_type', compact('product_cat', 'other_products', 'categories', 'category_name'));
    }

    //product detail
    public function getProductDetail(Request $request){
        $products = Products::where('id', $request->product_id)->first();
        $same_products = Products::where('cat_id', $products->cat_id)->paginate(5);// paginate not paginat ???
        return view('web/product/product_detail', compact('products', 'same_products'));
    }

    //contact
    public function getContact(){
        return view('web/inform/contact');
    }

    //about
    public function getAbout(){
        return view('web/inform/about');
    }

    //cart
    public function getAddtoCart(Request $request, $id){
        $product = Products::find($id);
        $old_cart = Session('cart')?Session::get('cart'):null;//
        $cart = new Cart($old_cart);
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    //delete cart
    public function getDeleteItemCart($id){
        $old_cart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($old_cart);
        $cart->removeItem($id);
        if (count($cart->items)>0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    //order-checkout
    public function getCheckout(){
        return view('web.checkout.checkout');
    }

    public function postCheckout(Request $request){
        $cart = Session::get('cart');
//        dd($cart);
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->notes = $request->notes;
        $customer->save();

        $invoices = new Invoices();
        $invoices->customer_id = $customer->id;
        $invoices->order_date = date('Y-m-d');
        $invoices->total = $cart->totalPrice;
        $invoices->payment_method = $request->payment_method;
        $invoices->notes = $request->notes;
        $invoices->save();

        $invoice_details = new Invoice_details();
        $invoice_details->invoice_id = $invoices->invoice_id;

    }

    //login
    public function getLogin(){
        return view('web.login.login');
    }

    //log out
    public function getSignup(){
        return view('web.signup.signup');
    }
    public function postSignup(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email|unique:customers,email',
                'password'=>'required|min:6|max:15',
                'name'=>'required',
                're-password'=>'required|same:password'
            ],
            [
                'email.required'=>'Enter your email, please.',
                'email.email'=>'Email format is incorrect.',
                'email.unique'=>'Email has existed',
                'password.required'=>'Enter your password, please',
                're-password.same'=>'Password is not same',
                'password.min'=>'Your password must be at least 6 characters',
                'password.max'=>'Your password must be less than 15 characters',
            ]);
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->back()->with('Success', 'Create user account successfully');
    }

    //login
    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:15'
            ],[
                'email.required'=>'Enter your email, please',
                'email.email'=>'Email is incorrect format',
                'password.required'=>'Enter your password',
                'password.min'=>'Password must be at least 6 characters',
                'password.max'=>'Password must be less than 15 characters'
            ]);
        $credentals = array('email'=>$request->email,'password'=>$request->password);
        //quan trong la thang auth nay dang kiem tra o bang nao ???
        var_dump($credentals);
        var_dump(Auth::attempt($credentals));die();
        if (Auth::attempt($credentals)){
            return redirect('abc')->with('message','abc');
        }
        else{
            return redirect('index')->with('message','hmm');
        }
    }

    //log out
    public function postLogout(){
        Auth::logout();
        return redirect()->route('page-index');
    }

    //search
    public function getSearch(Request $request){
        $products = Products::where('name', 'like', '%'.$request->search.'%')
                              ->orWhere('selling_price', $request->search)
                              ->get();
        return view('web.search.search', compact('products'));
    }
}
