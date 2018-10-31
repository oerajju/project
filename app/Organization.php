<?php

namespace App;
use App\BaseModel;
class Organization extends BaseModel
{
	protected $primaryKey='orgid';
	protected $table = "organization_str";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','code','orgtypeid','districtid','parent_orgid','vdc','wardno','street','houseno','phone','fax','email','longitude','latitude','website'];
	protected $rules = [
			'parent_orgid'=>'required|string',
			'districtid'=>'required|string',
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
            'orgtypeid'=>'required|string',
            'vdc'=>'required|string',
            'wardno'=>'required|string',
	];
        
}

