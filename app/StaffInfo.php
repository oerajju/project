<?php

namespace App;
use App\BaseModel;
class StaffInfo extends BaseModel
{
	protected $primaryKey='staffid';
	protected $table = "staff_info";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','employeeno','orgid','dob','phone','mobile','email','gender','postid','approved','disabled','entered_by'];
	protected $rules = [
			'orgid'=>'required|string',
			'namenp'=>'required|string',
            'nameen'=>'required|string',
            'dob'=>'required|string',
            'phone'=>'string|nullable',
            'gender'=>'required|string',
            'mobile'=>'required|string',
            'postid'=>'required|string',
	];
        
}

