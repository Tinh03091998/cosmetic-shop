<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Categories;
use App\Comments;
use App\Customers;
use App\Invoice;
use App\Invoice_details;
use App\Invoices;
use App\Products;
use App\Slides;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Session;

class HomepageController extends Controller
{
    use AuthenticatesUsers;
    //index
    public function getIndex(){
        $slides = Slides::all();
        $new_products = Products::orderBy('created_at', 'desc')->paginate(4);
//        $new_products = Products::where('id', 1)->paginate(5);
//        $new_products = Products::paginate(1);
        $promoted_products = Products::where('promoted_price', '<>', 0)->limit(4)->get();
        return view('web/home_page/index', compact('slides', 'new_products', 'promoted_products'));
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
        $same_products = Products::where('cat_id', $products->cat_id)->paginate(5);
        $comments = Comments::where('pro_id', $request->product_id)->get();
        return view('web/product/product_detail', compact('products', 'same_products', 'comments'));
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
        $old_cart = Session('cart')?Session::get('cart'):null;
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
    public function getOrder(){
        return view('web.checkout.checkout');
    }

    public function postOrder(Request $request){
        $cart = Session::get('cart');
        $customer = new Customers();

        $invoices = new Invoices();
        $invoices->customer_id = auth('customers')->user()->id;
        $invoices->order_date = date('Y-m-d');
        $invoices->total_cost = $cart->totalPrice;
        $invoices->payment_method = $request->payment_method;
        $invoices->notes = $request->notes;
        $email = auth('customers')->user()->email;
        $invoices->save();
//        dd($invoices->id);
        foreach ($cart->items as $key){
            $invoice_details = new Invoice_details();
            $invoice_details->invoice_id = $invoices->id;
            $invoice_details->pro_id = $key['item']->id;
            $invoice_details->unit_price = $key['price'];
            $invoice_details->amount = $key['quantity'];
            $invoice_details->save();
        }

        if ($invoices->id) {
            $customer = auth('customers')->user();
            $email = auth('customers')->user()->email;
            $code = bcrypt(md5(time() . $email));
            $url = route('verify-order', ['id' => $invoices->id, 'code' => $code]);

            $invoices->verify_code = $code;
            $invoices->save();
            $data = [
                'route' => $url,
                'invoice' => $invoices,
                'products' => $cart->items,
                'customer' => $customer
            ];
            Mail::send('emails.send_email', $data, function ($message) use ($email) {
                $message->to($email, 'Xác nhận hoá đơn')->subject('Xác nhận hoá đơn');
            });
        }

        Session::get('cart');
        Session::forget('cart');
//        $data = ['hoten'=>auth('customers')->user()->name];
//        Mail::send('emails.send_email', $data, function ($msg){
//            $msg->from('tinhnt03091998@gmail.com', 'Tinh Nguyen');
//            $msg->to('tinhnt.gha@gmail.com', 'TinhNT')->subject('Your Order Information');
//        });
        return redirect()->route('page-index')->with('message', 'Đặt hàng thành công');
    }

    public function getVerifyOrder(Request $request){
        $code = $request->code;
        $id = $request->id;

        $checkInvoice = Invoices::where([
            'verify_code' => $code,
            'id' => $id
        ])->first();

        if (!$checkInvoice){
            return redirect()->route('page-index')->with('error','Xin lỗi ! Đường dẫn xác nhận hoá đơn không tồn tại. Vui lòng thử lại hoặc liên hệ lại với cửa hàng . Xin cảm ơn!');
        }

        $checkInvoice->verify_status = 1;
        $checkInvoice->verify_time = Carbon::now();
        $checkInvoice->save();

        return redirect()->route('page-index')->with('message','Xác nhận hoá đơn thành công. Cảm ơn quý khách đã tin dùng sản phẩm của chúng tôi. Chúng tôi sẽ giao hàng đến với bạn sớm nhất có thể .Xin cảm ơn !');
    }

    //login
    public function getLogin(){
        return view('web.login.login');
    }

    //sign up
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
        return redirect()->route('login')->with('Success', 'Create user account successfully');
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
//        var_dump($credentals);
//        var_dump(Auth::attempt($credentals));
        if (auth('customers')->attempt($credentals)){
            return redirect()->route('page-index')->with(['flag'=>'success','message'=>'Login successfully']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Login unsuccessfully']);
        }
    }

    //log out
    public function postLogout(){
        auth('customers')->logout();
        return redirect()->route('login');
    }

    //search
    public function getSearch(Request $request){
        $products = Products::where('name', 'like', '%'.$request->search.'%')
                              ->orWhere('selling_price', $request->search)
                              ->get();
        return view('web.search.search', compact('products'));
    }




}
