<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Helper;
use Session;
use App\Models\{Category, Product, imagetable, Image, Metatag, blogs, ProductInquiry};
use App\Http\Requests\{yTableproduct_inquiryRequest };
class ProductController extends IndexController
{
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('recentBlogs', blogs::where('is_deleted',0)->where('is_active',1)->orderBy('id','desc')->limit(4)->get());
        View()->share('leftCatalogue', Category::where('is_deleted',0)->where('is_active',1)->where('parent_id',1)->orderBy('name','asc')->get());
    }
    public function detail (Product $product){
        $product->views = ($product->views+1);
        $product->save();
        $breadcrumbs = $this->readyBreadCrumbs($product->category);
        return view('shop.product.detail')
        ->with('title',$product->name)->with(compact('product','breadcrumbs'));
    }
    public function saveInquiry (Product $product, yTableproduct_inquiryRequest $request){
        ProductInquiry::create($request->only(['email','name','message']));
        return back()->with('notify_success','Thank you for inquiry');
    }
    public function addcart (Product $product, Request $request){
        if($request->qty){
            if(intval($request->qty)>0){
                $cart = Session::get('cart');
                if(!isset($cart[$product->id])){
                    $cart[$product->id] = ['product'=>$product,'qty'=>0,'row_price'=>$product->price,'subtotal'=>0];
                }
                $cart[$product->id]['qty'] = intval($request->qty);
                $cart[$product->id]['subtotal'] = (intval($request->qty)*$cart[$product->id]['row_price']);
                Session::put('cart',$cart);
                if(isset($request->redirectTo)){
                    return redirect()->route('cart.index')->with('notify_success','Product added to Cart');
                }
                return back()->with('notify_success','Product added to Cart');
            }
        }
        return back()->with('notify_error','Quantity is Required');
    }
}
