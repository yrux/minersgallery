<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request;
use Helper;
use App\Models\{Category, Product, Feedback, Newsletter, blogs, imagetable, Image, Metatag};
use App\Http\Requests\{yTablenewsletterRequest, yTablefeedbacksRequest};
// use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Arr;
class IndexController extends Controller
{
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('recentBlogs', blogs::where('is_deleted',0)->where('is_active',1)->orderBy('id','desc')->limit(4)->get());
        View()->share('leftCatalogue', Category::where('is_deleted',0)->where('is_active',1)->where('parent_id',1)->orderBy('name','asc')->get());
    }
    public function index(){
        $products = Cache::remember('homeProduct', 600, function () {
            return Product::orderBy('id','desc')->where('is_active',1)->where('is_deleted',0)->limit(64)->get();
        });
        $categories = Cache::remember('homeCategory', 600, function () {
            return Category::where('show_on_home',1)->where('is_active',1)->where('is_deleted',0)->get();
        });
        return view('welcome')->with('title','Home ― Miners Gallery')
        ->with(compact('products','categories'));
    }
    public function feedback(){
        return view('feedback')->with('title','Feedback ― Miners Gallery');
    }
    public function auxpage_2(){
        return view('auxpage_2')->with('title','Shipping and Handling ― Miners Gallery');
    }
    public function auxpage_3(){
        return view('auxpage_3')->with('title','About/Contact/Privacy ― Miners Gallery');
    }
    public function auxpage_4(){
        return view('auxpage_4')->with('title','Metaphysical Characteristics of Crystals and Gemstones ― Miners Gallery');
    }
    public function blogs(){
        $blogs = Helper::returnMod('blogs')->where('is_active',1)->orderBy('id','desc')->paginate(10);
        return view('blogs.index')->with('title','Blogs ― Miners Gallery')->with(compact('blogs'));
    }
    public function blog(blogs $blog){
        return view('blogs.detail')->with('title',$blog->blog_title.' ― Miners Gallery')->with(compact('blog'));
    }
    public function newsletter(yTablenewsletterRequest $request){
        Newsletter::create($request->only('email'));
        return back()->with('notify_success','Newsletter Added');
    }
    public function feedbacksave(yTablefeedbacksRequest $request){
        Feedback::create($request->only(['email','name','subject','description']));
        return back()->with('notify_success','Thank you for inquiry');
    }
    public function category (Category $category) {
        if(empty($_GET['page'])){
            $arr = array_merge([$category->slug,'page'=>1],$_GET);
            return redirect()->route('category',$arr);
        }
        $breadcrumbs = $this->readyBreadCrumbs($category);
        $catids = Arr::pluck($breadcrumbs,'id');
        $allChilds = $this->getAllChilds($category->childs);
        $products=Product::whereIn('category_id',$allChilds)->where('is_active',1)->where('is_deleted',0);
        if(!empty($_GET['q'])){
            $products = $products->where('name','like',"%".$_GET['q']."%");
        }
        if(!empty($_GET['price_from'])){
            $products = $products->where('price','>=',$_GET['price_from']);
        }
        if(!empty($_GET['price_to'])){
            $products = $products->where('price','<=',$_GET['price_to']);
        }
        if(!empty($_GET['sortBy'])){
            switch ($_GET['sortBy']) {
                case 'name':
                    switch ($_GET['type']) {
                        case 'asc':
                            $products = $products->orderBy('name',$_GET['type']);
                            break;
                        case 'desc':
                            $products = $products->orderBy('name',$_GET['type']);
                            break;
                    }
                    break;
                case 'price':
                    switch ($_GET['type']) {
                        case 'asc':
                            $products = $products->orderBy('price',$_GET['type']);
                            break;
                        case 'desc':
                            $products = $products->orderBy('price',$_GET['type']);
                            break;
                    }
                    break;
            }
        }
        $products=$products->paginate(10);
        return view('shop.list')
        ->with(compact('breadcrumbs','category','products'))
        ->with('title','Shop');
    }
    public static function getAllChilds ($categories) {
        $childs = [];
        foreach($categories as $categorie){
            array_push($childs,$categorie->id);
            if($categorie->childs){
                array_push($childs,...self::getAllChilds($categorie->childs));
            }
        }
        return $childs;
    }
    public static function readyBreadCrumbs ($category) {
        $first = ['name'=>'Home','url'=>url('/')];
        $arr = self::makeBreadCrumbs($category);
        array_pop($arr);
        $arr = array_reverse($arr);
        $t = array_merge([$first],$arr);
        return $t;
    }
    public static function makeBreadCrumbs ($category){
        $arr = [];
        $arr[0] = ['name'=>$category->name, 'url'=>route('category',$category->slug),'id'=>$category->id];
        if($category->parent){
            array_push($arr,...self::makeBreadCrumbs($category->parent));
        }
        return $arr;
    }
    // public function importProducts(){
    //     \App\Jobs\importImages::dispatch();
    // }
}
