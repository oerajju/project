<?php

namespace App;
use App\BaseModel;
class FocalPerson extends BaseModel
{
	protected $primaryKey='fpersonid';
	protected $table = "client_focal_person";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','corgid','phone','mobile','email','post','approved','disabled','entered_by'];
	protected $rules = [
			'corgid'=>'required|string',
			'namenp'=>'required|string',
            'nameen'=>'required|string',
            'phone'=>'string|nullable',
            'mobile'=>'required|string',
            'post'=>'required|string',
	];
        
}

