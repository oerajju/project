<?php

namespace App;
use App\BaseModel;
use DB;
class ResourcePersonResp extends BaseModel
{
	protected $primaryKey='id';
	protected $table = "resourceperson_responsiblity";
	public $timestamps = false;
	protected $fillable = ['evetid','expertid','remarks','staffid'];
	protected $rules = [
            'staffid'=>'required|string',
            'expertid'=>'required|string',
            'eventid'=>'string|nullable',
            'remarks' =>'string|nullable',
	];
    public function addedRePerResp($model){
        $staff = DB::table('staff_info')->select(['namenp as staffname'])->where('staffid', $model->staffid)->first();
        $spec = DB::table('expert_type')->select('namenp as expertname')->where('etid', $model->expertid)->first();
        $data['staff'] = $staff->staffname;
        $data['spec'] = $spec->expertname;
        $data['remarks'] = $model->remarks;
        $data['id'] = $model->id;
        return $data;
    }
}

