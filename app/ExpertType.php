<?php

namespace App;
use App\BaseModel;
class ExpertType extends BaseModel
{
	protected $primaryKey='etid';
	protected $table = "expert_type";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','pid'];
	protected $rules = [
            'namenp'=>'required|string',
            'pid'=>'required|string',
            'nameen'=>'string|nullable',
	];
        
}

