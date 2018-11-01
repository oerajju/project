<?php

namespace App;
use App\BaseModel;
class Product extends BaseModel
{
	protected $primaryKey='pid';
	protected $table = "product";
	public $timestamps = false;
	protected $fillable = ['product_name','description','pcid','approved','disabled'];
	protected $rules = [
			'pcid'=>'required|string',
			'description' =>'string|nullable',
            'product_name'=>'required|string',
	];
        
}

