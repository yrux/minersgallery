<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;
use Session;
use App\Models\{Category, Product, imagetable, Image, Metatag, blogs, Coupon, Order, OrderProducts};
use App\Http\Requests\{yTableorderRequest};
class CartController extends Controller
{
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('recentBlogs', blogs::where('is_deleted',0)->where('is_active',1)->orderBy('id','desc')->limit(4)->get());
        View()->share('leftCatalogue', Category::where('is_deleted',0)->where('is_active',1)->where('parent_id',1)->orderBy('name','asc')->get());
    }
    public function index (){
        $cart = Session::get('cart');
        if(count($cart)>0){
            $coupon = 0;
            if(Session::has('coupon')){
                $coupon = Session::get('coupon');
            }
            return view('shop.cart')->with(compact('cart','coupon'))
            ->with('title','Cart');
        }
        return redirect()->route('home')->with('notify_error','No products in cart');
    }
    public function clear (Product $product) {
        if($product->id){
            $cart = Session::get('cart');
            if(isset($cart[$product->id])){
                unset($cart[$product->id]);
                Session::put('cart',$cart);
            }
            return redirect()->route('cart.index')->with('notify_success','Product Removed');
        }else {
            Session::forget('cart');
            return redirect()->route('category',['root'])->with('notify_success','Cart Cleared');
        }
    }
    public function coupon (Request $request) {
        $coupon = Helper::returnMod('Coupon')->where('code',$request->code)->first();
        if($coupon){
            Session::put('coupon',$coupon->discount);
            return back()->with('notify_success','Coupon Added');
        }else{
            Session::forget('coupon');
        }
        return back()->with('notify_error','Invalid Coupon');
    }
    public function checkout(){
        $cart = Session::get('cart');
        if(count($cart)>0){
            $coupon = 0;
            if(Session::has('coupon')){
                $coupon = Session::get('coupon');
            }
            return view('shop.checkout')->with(compact('cart','coupon'))
            ->with('title','Checkout');
        }
        return redirect()->route('home')->with('notify_error','No products in cart');
    }
    public function makeOrder (yTableorderRequest $request){
        $cart = Session::get('cart');
        if(count($cart)>0){
            $coupon = 0;
            if(Session::has('coupon')){
                $coupon = Session::get('coupon');
            }
            $data=$request->only(['first_name','last_name','company','address','city','zip','country','phone','email','notes']);
            $data['discount'] = $coupon;
            $data['order_rowtotal'] = 0;
            $data['order_products'] = count($cart);
            foreach($cart as $car){
                $data['order_rowtotal']+=$car['subtotal'];
            }
            $data['order_total']=$data['order_rowtotal'];
            if($coupon>0){
                $discountAmount = (($data['order_total']/100)*$coupon);
                $data['order_total'] = $data['order_total']-$discountAmount;
            }
            $order = Order::create($data);
            $arr = [];
            foreach($cart as $cark=>$car){
                $arr[] = [
                    'order_id'=>$order->id,
                    'product_id'=>$cark,
                    'qty'=>$car['qty'],
                    'price'=>$car['row_price'],
                    'rowtotal'=>$car['subtotal'],
                ];
            }
            $order->products()->createMany($arr);
            Session::forget('cart');
            return redirect()->route('order.thankyou',[$order->id])->with('notify_success','Thank you for the Order');
        }
        return redirect()->route('home')->with('notify_error','No products in cart');
    }
    public function thankyou (Order $order) {
        return view('shop.thankyou')->with('title','Order #'.$order->id)
        ->with(compact('order'));
    }
}
