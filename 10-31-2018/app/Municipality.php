<?php

namespace App;
use App\BaseModel;
class Municipality extends BaseModel
{
	protected $primaryKey='mid';
	protected $table = "municipality";
	public $timestamps = false;
	protected $fillable = ['mid','namenp','nameen','code','districtid','approved','disabled'];
	protected $rules = [
			'districtid'=>'required|string',
			'election_no' =>'string|nullable',
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
	];
        
}

