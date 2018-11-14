<?php

namespace App;
use App\BaseModel;
use DB;
class UserType extends BaseModel
{
	protected $primaryKey='utid';
	protected $table = "user_type";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','level','descriptionnp','descriptionen','approved','disabled'];
	protected $rules = [
            'nameen'=>'required|string',
            'level'=>'required|string',
            'namenp'=>'string|nullable',
	];
}

