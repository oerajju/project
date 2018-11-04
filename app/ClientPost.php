<?php

namespace App;
use App\BaseModel;
class ClientPost extends BaseModel
{
	protected $primaryKey='cpostid';
	protected $table = "client_post";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','level','approved','disabled'];
	protected $rules = [
			'nameen'=>'required|string',
            'namenp'=>'required|string',
            'nameen'=>'string|nullable',
            'level'=>'required|string',
	];
        
}

