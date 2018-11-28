<?php

namespace App;
use App\BaseModel;
use DB;
class StaffSpecialization extends BaseModel
{
    protected $primaryKey='id';
    protected $table = "staff_specialization";
    public $timestamps = false;
    protected $fillable = ['productid','expertid','remarks','staffid'];
    protected $rules = [
            'productid'=>'required|string',
            'expertid'=>'required|string',
            'staffid'=>'string|nullable',
            'remarks' =>'string|nullable',
    ];
    
    public function addedStaffSpec($model){
        $product = DB::table('product')->select('product_name')->where('pid', $model->productid)->first();
        $spec = DB::table('expert_type')->select('namenp')->where('etid', $model->expertid)->first();
        $data['product'] = $product->product_name;
        $data['spec'] = $spec->namenp;
        $data['remarks'] = $model->remarks;
        $data['id'] = $model->id;
        return $data;
    }
    public function addedResPerResp($model){
        //$product = DB::table('product')->select('product_name')->where('pid', $model->productid)->first();
        $spec = DB::table('expert_type')->select(['etid','namenp'])->where('etid', $model->expertid)->first();
        //$data['product'] = $product->product_name;
        $data['id']=$spec->etid;
        $data['spec'] = $spec->namenp;
        $data['remarks'] = $model->remarks;
        return $data;
    }
}

