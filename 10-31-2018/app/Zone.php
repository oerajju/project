<?php

namespace App;
use App\BaseModel;
class Zone extends BaseModel
{
	protected $primaryKey='zid';
	protected $table = "zone";
	public $timestamps = false;
	protected $fillable = ['regionid','namenp','nameen','code'];
	protected $rules = [
			'regionid' =>'required|string',
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
	];
        
}

