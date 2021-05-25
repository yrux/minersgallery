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
        $products = Product::orderBy('id','desc')->limit(64)->get();
        return view('welcome')->with('title','Home ― Miners Gallery')
        ->with(compact('products'));
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
    public function importProducts(){
        \App\Jobs\importImages::dispatch();
    }
}
