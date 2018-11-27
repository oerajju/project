<?php

namespace App;
use App\BaseModel;
use DB;
class Event extends BaseModel
{
	protected $primaryKey='id';
	protected $table = "event";
	public $timestamps = false;
	protected $fillable = ['event_name','start_date','end_date','product_category','product','organizer','organizer_for','address','remarks','entered_by'];
	protected $rules = [
            'event_name'=>'required|string',
            'start_date'=>'required|string',
            'end_date'=>'required|string',
            'product_category'=>'required|string',
            'product'=>'required|string',
            'organizer'=>'required|string',
            'address'=>'required|string',
            'entered_by'=>'string|nullable',
            'organizer_for'=>'string|nullable',
            'remarks' =>'string|nullable',
	];
}
