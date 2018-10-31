<?php

namespace App;
use App\BaseModel;
class OrgType extends BaseModel
{
	protected $primaryKey='orgtypeid';
	protected $table = "org_type";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','code'];
	protected $rules = [
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
	];
        
}

