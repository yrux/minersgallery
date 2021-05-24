<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request;
use Helper;
use App\Models\blogs;
use App\Models\Newsletter;
use App\Models\Feedback;
use App\Http\Requests\yTablenewsletterRequest;
use App\Http\Requests\yTablefeedbacksRequest;
class IndexController extends Controller
{
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('recentBlogs', blogs::where('is_deleted',0)->where('is_active',1)->orderBy('id','desc')->limit(4)->get());
    }
    public function index(){
        return view('welcome')->with('title','Home ― Miners Gallery');
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
        Newsletter::create($request->only(['email','name','subject','description']));
        return back()->with('notify_success','Thank you for inquiry');
    }
}
