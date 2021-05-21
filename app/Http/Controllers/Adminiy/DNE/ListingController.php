<?php
namespace App\Http\Controllers\Adminiy\DNE;
use App\Http\Controllers\Adminiy\IndexController;
use View;
use DB;
use Illuminate\Support\Str;
use Artisan;
use Helper;
use App\Models\ytables;
use App\Models\imagetable;
use File;
use App\Http\Requests\yTableRequest;
use Storage;
use Schema;

class ListingController extends IndexController
{
    public function __construct()
    {
        View()->share('v',config('app.vadminiy'));
    }
    /*Create listing*/
    public function ylisting($jsfile){
        $listingId = 0;
        $listDebug = isset($_GET['debug'])?'const ydebugger=true;':'const ydebugger=false;';
        if(!Str::contains($jsfile,'-')){
            return redirect()->route('adminiy.panel')->with('notify_message','There is a standard for this to work , for instance "tablename-listing" , You route should follow the standard');
        }
        if(!Str::endsWith($jsfile,'listing')){
            return redirect()->route('adminiy.panel')->with('notify_message','Your route should end with "listing", Follow the route listing Standards');
        }
        $path=public_path('admin/listings/'.$jsfile.'.js');
        $tablename = explode('-', $jsfile);
        $jsFileRoute = 'admin/listings/'.$jsfile.'.js';
        if(!Schema::hasTable($tablename[0])){
            return redirect()->route('adminiy.panel')->with('notify_message','Table does not exist');
        }
        if(!File::exists($path)){
            ytables::where('js_file',$jsFileRoute)->delete();
            $ytables = new ytables;
            $ytables->js_file = $jsFileRoute;
            $ytables->page_heading = Str::title($tablename[0]);
            $ytables->page_message = '';
            $ytables->new_url = 'adminiy/crud/'.$tablename[0];
            $ytables->is_deleted = 0;
            $ytables->fast_crud = 1;
            $ytables->page_limit = '10';
            $ytables->table_name=$tablename[0];
            $ytables->model_name='';//Str::title($tablename[0]);
            $exitCode = Artisan::call('make:request',['name'=>'yTable'.$tablename[0].'Request']);
            $exitCode_model = Artisan::call('make:model',['name'=>'Model\\'.$tablename[0]]);
            if(!empty($_GET['eventGenerate'])){
                Artisan::call('make:event',['name'=>$tablename[0].'Event']);
                Artisan::call('make:listner',['name'=>$tablename[0].'Notification']);
            }
            $ytables->save();
            $appendTo = "const tablename='{$tablename[0]}';";
            $contents = Storage::disk('publicr')->get('admin/listings/default.js');
            Storage::disk('publicr')->put($jsFileRoute, $appendTo.$listDebug.$contents);
        }
        $listingData = ytables::where('js_file',$jsFileRoute)->first();
        if(!$listingData){
            unlink($path);
            header("Refresh:0");
        }
        $menuActive = $listingData->table_name.'_ytmenu';
        $menuArray = array($menuActive);
        return view('adminiy.adminiy-listing')->with('title',Str::title($listingData->page_heading).' Listing')->with(compact('listingData'))->with('FastCrudHeading',Str::title($listingData->page_heading).' CRUD')->with('table',$tablename[0])->with($menuActive,true)->with(compact('menuArray'));
    }
    /*Create listing end*/
    /*fetching list data start*/
    public function ytable(yTableRequest $request){
        $uniqueCol = $request->uniqueCol;
        $validated = $request->validated();
        if($validated){
            /*Defining Variables*/
            $table = $request->table;
            $colsHierarchy = \collect($request->cols);
            $pagelimit = !isset($request->limit)?10:$request->limit;
            $page = !isset($request->page)?1:$request->page;
            $clausesHierarchy = !isset($request->clauses)?[]:$request->clauses;
            $joins = !isset($request->joins)?[]:$request->joins;
            $q = !isset($request->q)?'':$request->q;
            $model = Helper::returnMod($table);
            /*Defining Variables end*/
            /*Generating Query*/
                $colsarray = collect([]);
                /*Setting Columns*/
                foreach($colsHierarchy as $cols){
                    if(isset($cols['alias'])){
                        $colsarray->push($cols['column'].' as '.$cols['alias']);
                        continue;
                    }
                    $colsarray->push($cols['column']);
                }
                /*Setting Columns End*/
                /*Building Query*/
                // $model=$model->select($colsarray->implode(','));
                $clauses = '';
                $where='';
                $order='';
                $group='';
                /*Setting where group order clauses*/
                foreach($clausesHierarchy as $clauseType=>$clauseData){
                    $clauses='';
                    // if(gettype($clauseData)=='array'){
                    //     /*Mostly used for where clauses*/
                    //     $clauses.=" {$clauseType} ";
                    //     foreach($clauseData as $subClauseKey=>$subClauseValue){
                    //         if(gettype($subClauseValue)=='string'){
                    //             $clauses.= " {$subClauseKey} {$subClauseValue} ";
                    //         } else if(gettype($subClauseValue)=='array') {
                    //             foreach($subClauseValue as $subClauseValueK=>$subClauseValueV){
                    //                 if(gettype($subClauseValueV)=='array'){
                    //                     /*Gets into this condition where where clause have these types of conditions
                    //                     [
                    //                       "col" => "is_deleted"
                    //                       "condition" => "="
                    //                       "value" => "'0'"
                    //                     ]
                    //                     */
                    //                     $rtcol=$subClauseValueV['col'];
                    //                     $rtcondition=$subClauseValueV['condition'];
                    //                     $rtvalue=$subClauseValueV['value'];
                    //                     $clauses.=" {$subClauseKey} {$rtcol}{$rtcondition}{$rtvalue} ";
                    //                 } else {
                    //                     $clauses.=" {$subClauseValueK} {$subClauseValueV} ";
                    //                 }
                    //             }
                    //         }
                    //     }
                    // } else if (gettype($clauseData)=='string'){
                    //     $clauses = " {$clauseType} {$clauseData} ";
                    // }
                    switch ($clauseType) {
                        case "where":
                            if(gettype($clauseData)=='array'){
                                foreach($clauseData as $subClauseKey=>$subClauseValue){
                                    if(gettype($subClauseValue)=='array') {
                                        foreach($subClauseValue as $subClauseValueK=>$subClauseValueV){
                                            if(gettype($subClauseValueV)=='array'){
                                                /*Gets into this condition where where clause have these types of conditions
                                                [
                                                  "col" => "is_deleted"
                                                  "condition" => "="
                                                  "value" => "'0'"
                                                ]
                                                */
                                                $rtcol=$subClauseValueV['col'];
                                                $rtcondition=$subClauseValueV['condition'];
                                                $rtvalue=$subClauseValueV['value'];
                                                if(strtolower($rtcondition)=='in'){
                                                    $model=$model->whereIn($rtcol,$rtvalue);
                                                }else{
                                                    $model=$model->where($rtcol,$rtcondition,$rtvalue);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            break;
                        case "order by":
                            foreach($clauseData as $clauseDat){
                                $model=$model->orderBy($clauseDat['column'], $clauseDat['type']);
                            }
                            break;
                        case "group by":
                            foreach($clauseData as $clauseDat){
                                $model=$model->groupBy($clauseDat);
                            }
                            break;
                        default:
                            
                    }
                }
                if($q!=""){
                    $totalWhere = $where==''?' where(':' and(';
                    $totalCols =  count($colsarray);
                    $runtimecols = 0;
                    $model = $model->where(function ($query) use ($colsarray, $q) {
                        foreach($colsarray as $colsWhere){
                            $query->orWhere($colsWhere, 'LIKE', "'%{$q}%'");
                        }
                    });
                    // foreach($colsarray as $colsWhere){
                    //     $runtimecols++;
                    //     $totalWhere.=" $colsWhere LIKE '%{$q}%' ";
                    //     if($runtimecols<$totalCols){
                    //         $totalWhere.=" OR ";
                    //     }
                    // }
                    // $totalWhere.=')';
                    // $where.=$totalWhere;
                }
                /*Setting where group order clauses end*/
                /*SETTING LIMIT*/
                // $page = $page==1 ? 0 : $page;
                // $limit = (($pagelimit*$page));
                // if($page>1){
                //     $limit = $limit - $pagelimit;   
                // }
                // $query=$query.$where.$order.$group;
                // dd($model->count());
                // $count = $model->count();

                // $query .= " limit ".$limit.",".$pagelimit;
                /*SETTING LIMIT END*/
                /*Building Query End*/
                /*Fetching*/
                $model=$model->select($colsarray->toArray());
                $model = $model->paginate($pagelimit);
                // dd($data);
                /*Fetching End*/
            /*Generating Query End*/
            /*Generating Result*/
            // $totalPages=ceil($count/$pagelimit);
            echo json_encode(array(
                'status'=>'1',
                'data'=>$model->items(),
                'limit'=>$model->perPage(),
                "count"=>$model->total(),
                "currentPage"=>$model->currentPage(),
                "totalPages"=>$model->lastPage(),
            ));
            /*Generating Result End*/
        }
    }
    /*fetching list data end*/
}
