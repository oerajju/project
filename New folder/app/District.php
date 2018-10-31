<?php

namespace App;
use App\BaseModel;
class District extends BaseModel
{
	protected $primaryKey='did';
	protected $table = "district";
	public $timestamps = false;
	protected $fillable = ['zoneid','namenp','nameen','code','district_thm'];
	protected $rules = [
			'district_thm'=>'required|string',
			'zoneid' =>'required|string',
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
	];
        
}

