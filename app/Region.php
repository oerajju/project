<?php

namespace App;
use App\BaseModel;
class Region extends BaseModel
{
	protected $primaryKey='rid';
	protected $table = "region";
	public $timestamps = false;
	protected $fillable = ['countryid','namenp','nameen','code'];
	protected $rules = [
			'countryid' =>'required|string',
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
	];
        
}

