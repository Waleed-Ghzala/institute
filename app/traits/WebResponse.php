<?php
namespace App\Traits;

trait WebResponse{
    
    public function response($data=null,$message=null,$status=null){
    $array=[
    'data'=>$data,
    'message'=>$message,
    'status'=>$status,];
    
    return response($array,$status);}
}
