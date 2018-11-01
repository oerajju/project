<?php

namespace App;
use App\BaseModel;
class ProductCategory extends BaseModel
{
	protected $primaryKey='pcid';
	protected $table = "product_category";
	public $timestamps = false;
	protected $fillable = ['name','description','approved','disabled'];
	protected $rules = [
            'name'=>'required|string',
            'description'=>'string|nullable',
	];
        
}

