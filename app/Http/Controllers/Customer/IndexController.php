<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Helper;
use App\Models\blogs;
class IndexController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('recentBlogs', blogs::where('is_deleted',0)->where('is_active',1)->orderBy('id','desc')->limit(4)->get());
    }
    public function index()
    {
        return view('auth.dashboard.index');
    }
}
