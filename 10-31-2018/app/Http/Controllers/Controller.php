<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
   public function errorMessage($message=null,$title=null,$callback=null){
        if($title==null){
            $title="Error";
        }
        if($message==null){
            $message="Operation failed.";
        }
        return $this->prepareMessage(0, $title, $message,$callback);
    }
    public function successMessage($message=null,$title=null,$callback=null){
        if($title==null){
            $title="Success";
        }
        if($message==null){
            $message="Operation Successful.";
        }
        return $this->prepareMessage(1, $title, $message,$callback);
    }
    public function warningMessage($message=null,$title=null){
        if($title==null){
            $title="Warning";
        }
        if($message==null){
            $message="Operation succeeded with warning.";
        }
        return $this->prepareMessage(2, $title, $message);
    }
    public function infoMessage($message=null,$title=null){
        if($title==null){
            $title="Info";
        }
        if($message==null){
            $message="";
        }
        return $this->prepareMessage(3, $title, $message);
    }
    
    public function prepareMessage($status,$title,$message,$callBack=null){
        $messageArray = [
            'status'=>$status,
            'title'=>$title,
            'message'=>$message
        ];
        if(!empty($callBack)){
            $messageArray['callback'] = $callBack;
        }
        return $messageArray;
    }
    
    public function standardMessages(){
        return [
            'item_added'=>'',
            'item_updated'=>'',
            'item_deletd'=>'',
            
            'item_add_failed'=>'',
            'item_update_failed'=>'',
            'item_delete_failed'=>''
            
        ];
    }
}
