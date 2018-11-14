<?php

namespace App;
use App\BaseModel;
class MenuSetup extends BaseModel
{
	protected $primaryKey='menuid';
	protected $table = "menus";
	public $timestamps = false;
	protected $fillable = ['menu_parent_id','menu_namenp','menu_nameen','menu_url','menu_icon'];
	protected $rules = [
			'menu_parent_id' =>'required|string',
            'menu_namenp'=>'required|string',
            'menu_nameen'=>'required|string',
            'menu_url'=>'string|nullable',
            'menu_icon' =>'string|nullable',
	];
        
}

