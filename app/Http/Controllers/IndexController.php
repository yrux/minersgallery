<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use View;
use Illuminate\Http\Request;
use Helper;
use App\Models\blogs;
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
    public function auxpage_2(){
        return view('auxpage_2')->with('title','Shipping and Handling ― Miners Gallery');
    }
    public function auxpage_3(){
        return view('auxpage_3')->with('title','About/Contact/Privacy ― Miners Gallery');
    }
    public function auxpage_4(){
        return view('auxpage_4')->with('title','Metaphysical Characteristics of Crystals and Gemstones ― Miners Gallery');
    }
}
