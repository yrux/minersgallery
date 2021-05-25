<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Category, Product, Feedback, Newsletter, blogs, imagetable, Image, Metatag};
// use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use File;

class importImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
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
                            $imagetable->img_path = 'Uploads/products/'.$imag->filename;
                            File::copy(public_path('imports/products_pictures/products_pictures/'.$imag->filename),storage_path('app/public/Uploads/products/'.$imag->filename)
                            );
                            $imagetable->save();
                            $imagetable = new imagetable;
                            $imagetable->table_name='productsthumb';
                            $imagetable->ref_id=$productid;
                            $imagetable->type=1;
                            $imagetable->img_path = 'Uploads/products/'.$imag->thumbnail;
                            File::copy(
                                public_path('imports/products_pictures/products_pictures/'.$imag->thumbnail),
                                storage_path('app/public/Uploads/products/'.$imag->thumbnail)
                            );
                            $imagetable->save();
                            $imagetable = new imagetable;
                            $imagetable->table_name='productsenlarge';
                            $imagetable->ref_id=$productid;
                            $imagetable->type=1;
                            $imagetable->img_path = 'Uploads/products/'.$imag->enlarged;
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
                    $imagetable->img_path = 'Uploads/products/'.$imag->filename;
                    File::copy(
                        public_path('imports/products_pictures/products_pictures/'.$imag->filename),
                        storage_path('app/public/Uploads/products/'.$imag->filename)
                    );
                    $imagetable->save();
                    $imagetable = new imagetable;
                    $imagetable->table_name='productsthumbextra';
                    $imagetable->ref_id=$productid;
                    $imagetable->type=2;
                    $imagetable->img_path = 'Uploads/products/'.$imag->thumbnail;
                    File::copy(
                        public_path('imports/products_pictures/products_pictures/'.$imag->thumbnail),
                        storage_path('app/public/Uploads/products/'.$imag->thumbnail)
                    );
                    $imagetable->save();
                    $imagetable = new imagetable;
                    $imagetable->table_name='productsenlargeextra';
                    $imagetable->ref_id=$productid;
                    $imagetable->type=2;
                    $imagetable->img_path = 'Uploads/products/'.$imag->enlarged;
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
    }
}
