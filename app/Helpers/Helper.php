<?php
namespace App\Helpers;
use DB;
class Helper {
  public static function OneColData($table,$col,$condition,$modifiedCol=""){
    $where = $condition=='' ? '' : ' WHERE '.$condition;
    $data = collect(\DB::select("SELECT ".$col." FROM ".$table." ".$where))->first();
    if($data){
      if($modifiedCol!=""){
        return $data->$modifiedCol;
      }
      return $data->$col;
    }else{
      return '';
    }
  }
  public static function fireQuery($query){
    return DB::select($query);
  }
  public static function getPaginator($pageLimit=20){
    //$pageLimit = 20;
    $pageNo=0;
    if(isset($_GET['pageNo'])){
      $pageNo = intval($_GET['pageNo']);
    }
    $pageNo = $pageNo==1 ? 0 : $pageNo;
    $limit = (($pageLimit*$pageNo));
    if($pageNo>1){
      $limit = $limit - $pageLimit;   
    }
    $querylimit = " limit ".$limit.",".$pageLimit;
    return $querylimit;
  }
  public static function firstRow($query){
    return collect(\DB::select($query))->first();
  }
  public static function returnFlag($id,$col='flag_value'){
  if($id){
    $data =  self::returnRow("m_flag","id=".$id);
    if($data){
    return $data->$col;
    }
    else {
    return '';
    }
  }else {
    return '';
    }
  }
  public static function returnRow($table,$where){
    $whereCond = $where=='' ? '' : ' WHERE '.$where;
    $data = collect(\DB::select("SELECT * FROM ".$table." ".$whereCond))->first();
    return $data;
  }
  public static function returnMod($modelName){
    $model_name = 'App\Models\\'.$modelName;
    return $model_name::where('is_deleted',0);
  }
}