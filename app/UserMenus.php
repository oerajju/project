<?php

namespace App;
use App\BaseModel;
use DB;
class UserMenus extends BaseModel
{
	protected $primaryKey='user_menu_id';
	protected $table = "user_menus";
	public $timestamps = false;
	protected $fillable = ['usertypeid','menuid'];
	protected $rules = [
            'usertypeid'=>'required|string',
            'menuid'=>'required|string',
	];
 
 public function getUserMenus($usertypeid=null){
 	if($usertypeid ==null){
 		$usertypeid = session('user-type');
 	}
 	$model = DB::table('menus as m')->select(['m.menuid','m.menu_namenp','m.menu_nameen','m.menu_parent_id'])->join('user_menus as um','m.menuid','=','um.menuid')->where('m.menu_parent_id', 0)->where('um.usertypeid', $usertypeid)->get();
 	foreach($model as $m=> $k){
 		$data[$m]['parent'] = ['menuid'=>$k->menuid, 'menu_nameen'=>$k->menu_nameen,'menu_namenp'=>$k->menu_namenp];
 		$model1=DB::table('menus as m')->select(['m.menuid','m.menu_nameen','m.menu_namenp','m.menu_parent_id','m.menu_url'])->join('user_menus as um','m.menuid','=','um.menuid')->where('m.menu_parent_id', $k->menuid)->where('um.usertypeid', $usertypeid)->get();
 		foreach($model1 as $sm => $sk){
 			$data[$m]['parent']['childern'][$sm]= ['menuid'=> $sk->menuid,'menu_nameen'=>$sk->menu_nameen, 'menu_namenp' => $sk->menu_namenp,'menu_parent_id' => $sk->menu_parent_id,'menu_url' => $sk->menu_url];
 		$model1 = DB::table('menus as m')->select(['m.menuid','m.menu_nameen','m.menu_namenp','m.menu_parent_id','m.menu_url'])->join('user_menus as um','m.menuid','=','um.menuid')->where('um.usertypeid', $usertypeid)->where('m.menu_parent_id', $sk->menuid)->get();
 		if($model1!='[]'){
 			$data[$m]['parent']['childern'][$sm]['children'] = $model1;
 		}
 		}
 	}
 	//$data['parent'] = $model;
 	$d['menu'] = $data;
 	return $d;
 	//return $model;
 }
 public function getAllMenus($usertypeid){
 	$model = DB::table('menus as m')->select(['menuid','menu_namenp','menu_nameen','menu_parent_id'])->where('menu_parent_id', 0)->get();
 	foreach($model as $m=> $k){
 		$data[$m]['parent'] = ['menuid'=>$k->menuid, 'menu_nameen'=>$k->menu_nameen,'menu_namenp'=>$k->menu_namenp];
 		$model1=DB::table('menus as m')->select(['menuid','menu_nameen','menu_namenp','menu_parent_id','menu_url'])->where('menu_parent_id', $k->menuid)->get();
 		foreach($model1 as $sm => $sk){
 			$data[$m]['parent']['childern'][$sm]= ['menuid'=> $sk->menuid,'menu_nameen'=>$sk->menu_nameen, 'menu_namenp' => $sk->menu_namenp,'menu_parent_id' => $sk->menu_parent_id,'menu_url' => $sk->menu_url];
 		$model1 = DB::table('menus as m')->select(['menuid','menu_nameen','menu_namenp','menu_parent_id','menu_url'])->where('menu_parent_id', $sk->menuid)->get();
 		if($model1!='[]'){
 			$data[$m]['parent']['childern'][$sm]['children'] = $model1;
 		}
 		}
 	}
    $userMenus = UserMenus::select('menuid')->where('usertypeid', $usertypeid)->get();
 	$d['menu'] = $data;
 	$d['usermenus'] = $userMenus;
 	return $d;
 	//return $model;
 }       
}

