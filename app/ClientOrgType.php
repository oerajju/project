<?php

namespace App;
use App\BaseModel;
class ClientOrgType extends BaseModel
{
	protected $primaryKey='cotid';
	protected $table = "client_orgtype";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','code','approved','disabled'];
	protected $rules = [
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
	];
        
}

