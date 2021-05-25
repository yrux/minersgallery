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
    public function importProducts(){
        \App\Jobs\importImages::dispatch();
        return;
        $images = \collect(json_decode(file_get_contents(public_path('imports/SC_product_pictures.json'))));
        $productsJson = \collect(json_decode(file_get_contents(public_path('imports/SC_products.json'))));
        $products = Product::whereNotIn('id',imagetable::where('table_name','like',"'%product%'")->get()->pluck('ref_id'))->get()->pluck('id');
        // dd($products);
        foreach($products as $productid){
            $image = $images->where('productID',$productid)->all();
            foreach($image as $imag){
                // dump($imag->thumbnail);
                // dump($imag->enlarged);
                // dd($imag->filename);
                try {
                    $defaultImage = $productsJson->where('productID', $productid)->first();
                    if($defaultImage){
                        if($imag->photoID==$defaultImage->default_picture){
                            $imagetable = new imagetable;
                            $imagetable->table_name='productsmain';
                            $imagetable->ref_id=$productid;
                            $imagetable->type=1;
                            $imagetable->img_path =storage_path('app/public/Uploads/products/'.$imag->filename);
                            File::copy(public_path('imports/products_pictures/products_pictures/'.$imag->filename),storage_path('app/public/Uploads/products/'.$imag->filename)
                            );
                            $imagetable->save();
                            $imagetable = new imagetable;
                            $imagetable->table_name='productsthumb';
                            $imagetable->ref_id=$productid;
                            $imagetable->type=1;
                            $imagetable->img_path =storage_path('app/public/Uploads/products/'.$imag->thumbnail);
                            File::copy(
                                public_path('imports/products_pictures/products_pictures/'.$imag->thumbnail),
                                storage_path('app/public/Uploads/products/'.$imag->thumbnail)
                            );
                            $imagetable->save();
                            $imagetable = new imagetable;
                            $imagetable->table_name='productsenlarge';
                            $imagetable->ref_id=$productid;
                            $imagetable->type=1;
                            $imagetable->img_path =storage_path('app/public/Uploads/products/'.$imag->enlarged);
                            File::copy(
                                public_path('imports/products_pictures/products_pictures/'.$imag->enlarged),
                                storage_path('app/public/Uploads/products/'.$imag->enlarged)
                            );
                            $imagetable->save();
                            continue;
                        }
                    }
                    $imagetable = new imagetable;
                    $imagetable->table_name='productsmainextra';
                    $imagetable->ref_id=$productid;
                    $imagetable->type=2;
                    $imagetable->img_path =storage_path('app/public/Uploads/products/'.$imag->filename);
                    File::copy(
                        public_path('imports/products_pictures/products_pictures/'.$imag->filename),
                        storage_path('app/public/Uploads/products/'.$imag->filename)
                    );
                    $imagetable->save();
                    $imagetable = new imagetable;
                    $imagetable->table_name='productsthumbextra';
                    $imagetable->ref_id=$productid;
                    $imagetable->type=2;
                    $imagetable->img_path =storage_path('app/public/Uploads/products/'.$imag->thumbnail);
                    File::copy(
                        public_path('imports/products_pictures/products_pictures/'.$imag->thumbnail),
                        storage_path('app/public/Uploads/products/'.$imag->thumbnail)
                    );
                    $imagetable->save();
                    $imagetable = new imagetable;
                    $imagetable->table_name='productsenlargeextra';
                    $imagetable->ref_id=$productid;
                    $imagetable->type=2;
                    $imagetable->img_path =storage_path('app/public/Uploads/products/'.$imag->enlarged);
                    File::copy(
                        public_path('imports/products_pictures/products_pictures/'.$imag->enlarged),
                        storage_path('app/public/Uploads/products/'.$imag->enlarged)
                    );
                    $imagetable->save();
                } catch (\Exception $ex){
                    // dd($ex);
                }
            }
        }
        return;
        foreach($products as $product){
            // $product->categoryID;
            // $product->Price;
            // $product->sort_order;
            // $product->default_picture;
            // $product->viewed_times;
            // $product->weight;
            // $product->shipping_freight;
            // $product->name_en;
            // $product->slug;
            // $product->brief_description_en;
            // $product->description_en;
            // $product->meta_title_en;
            // $product->meta_description_en;
            // $product->meta_keywords_en;
            // $product->ordering_available;
            // $images = $products->where('productID',$product->productID)->all();
            if($product->Price){
                $Product = new Product;
                $Product->id=$product->productID;
                $Product->category_id=$product->categoryID;
                $Product->price=$product->Price;
                $Product->weight=$product->weight;
                $Product->views=$product->viewed_times;
                $Product->sort_order=$product->sort_order;
                $Product->shipping_freight=$product->shipping_freight;
                $Product->in_stock=$product->in_stock;
                $Product->name=$product->name_en;
                $Product->slug=$product->slug;
                $Product->sku=$product->product_code;
                $Product->brief_description=$product->brief_description_en;
                $Product->description=$product->description_en;
                $Product->is_active=$product->ordering_available;
                if($Product->save()){
                    $Metatag = new Metatag;
                    $Metatag->page_uri = 'product/'.$product->slug;
                    $Metatag->meta_title = !empty($product->meta_title_en)?$product->meta_title_en:'';
                    $Metatag->meta_keywords = !empty($product->meta_keywords_en)?$product->meta_keywords_en:'';
                    $Metatag->meta_description = !empty($product->meta_description_en)?$product->meta_description_en:'';
                    $Metatag->save();
                    // foreach($images as $image){
                        // $imagetable = new imagetable;
                    // }
                }
            }
        }
    }
    public function importCategory(){
        $data = public_path('imports/SC_categories.json');
        $read = json_decode(file_get_contents($data));
        foreach($read as $rea){
            // dump($rea->categoryID, $rea->parent, $rea->sort_order, $rea->viewed_times, $rea->slug, $rea->name_en, $rea->description_en);
            // dump(intval($rea->categoryID));
            $Category = new Category;
            $Category->parent_id=intval($rea->parent);
            $Category->id = $rea->categoryID;
            $Category->sort_order=$rea->sort_order;
            $Category->views=$rea->viewed_times;
            $Category->slug=$rea->slug;
            $Category->description=$rea->description_en;
            $Category->name=$rea->name_en;
            $Category->past_category_id=$rea->categoryID;
            $Category->save();
            // Category::create([
            //     'parent_id'=>intval($rea->parent),
            //     'sort_order'=>$rea->sort_order,
            //     'views'=>$rea->viewed_times,
            //     'slug'=>$rea->slug,
            //     'description'=>$rea->description_en,
            //     'name'=>$rea->name_en,
            //     'past_category_id'=>$rea->categoryID,
            // ]);
        }
    }
}
