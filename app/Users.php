<?php

namespace App;
use App\BaseModel;
class Users extends BaseModel
{
	protected $primaryKey='userid';
	protected $table = "users";
	public $timestamps = false;
	protected $hidden = ['password','entered_by', 'created_at'];
	protected $fillable = ['empid','orgid','usertypeid','mobile','username','status','send_sms','entered_by'];
	protected $rules = [
			'orgid'=>'required|string',
			'empid'=>'required|string',
            'mobile'=>'required|string',
            'usertypeid'=>'required|string',
            'username'=>'required|string',
            'password'=>'required|string',
	];
        
}

