<?php

namespace App;
use App\BaseModel;
class Country extends BaseModel
{
	protected $primaryKey='cid';
	protected $table = "country";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','code'];
	protected $rules = [
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
	];
        
}

