<?php

namespace App;
use App\BaseModel;
class Post extends BaseModel
{
	protected $primaryKey='pid';
	protected $table = "post";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','level','approved','disabled'];
	protected $rules = [
			'nameen'=>'required|string',
            'namenp'=>'required|string',
            'nameen'=>'string|nullable',
            'level'=>'required|string',
	];
        
}

