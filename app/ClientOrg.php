<?php

namespace App;
use App\BaseModel;
class ClientOrg extends BaseModel
{
	protected $primaryKey='corgid';
	protected $table = "client_org_str";
	public $timestamps = false;
	protected $fillable = ['namenp','nameen','code','cotid','districtid','parent_corgid','vdc','wardno','street','houseno','phone','fax','email','longitude','latitude','website'];
	protected $rules = [
			'parent_corgid'=>'required|string',
			'districtid'=>'required|string',
            'namenp'=>'required|string',
            'code'=>'required|string',
            'nameen'=>'string|nullable',
            'cotid'=>'required|string',
            'vdc'=>'required|string',
            'wardno'=>'required|string',
	];
        
}

