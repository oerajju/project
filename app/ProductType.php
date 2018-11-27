<?php

namespace App;
use App\BaseModel;
class ProductType extends BaseModel
{
	protected $primaryKey='ptid';
	protected $table = "product_type";
	public $timestamps = false;
	protected $fillable = ['nameen','namenp'];
	protected $rules = [
            'nameen'=>'required|string',
            'namenp'=>'required|string',
	];
        
}

