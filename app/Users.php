<?php

namespace App;
use App\BaseModel;
use DB;
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
	function getUserDetails($userid){
		$model = DB::table($this->getTable().' as u')->select(['u.userid','u.username','org.namenp as orgname','si.namenp as staffname'])->join('organization_str as org','org.orgid','u.orgid')
					->join('staff_info as si','si.staffid','u.empid')->where('u.userid',$userid)
					->first();
					return $model;
	}
        
}

