<?php

namespace App;
use App\BaseModel;
class ParticipantForm extends BaseModel
{
	protected $primaryKey='pid';
	protected $table = "participant_form";
	public $timestamps = false;
	protected $fillable = ['participant_firstname','participant_lastname','participant_parentorgid','participant_eventid','participant_remarks','participant_dates','participant_tran_date','participant_producttype','participant_email','participant_gender','participant_maritialstatus','participant_age','participant_dob','participant_initiator','participant_temp_district','participant_per_country','participant_per_district','participant_per_address','participant_birth_district','participant_phone','participant_mobile','participant_qualification','participant_occupation','participant_paidamount','participant_paymentmethod','participant_receivedby','participant_receiveddate','entered_by'];
	protected $rules = [
			'participant_firstname'=>'required|string',
			'participant_lastname'=>'required|string',
			'participant_parentorgid'=>'required|string',
			'participant_eventid'=>'required|string',
			'participant_dates'=>'required|string',
			'participant_tran_date'=>'required|string',
			'participant_producttype'=>'required|string',
			'participant_temp_district'=>'required|string',
			'participant_per_country'=>'required|string',
			'participant_paymentmethod'=>'required|string',
			'participant_paidamount'=>'required|string',
			'participant_initiator'=>'required|string',
			'participant_dob'=>'required|string',
			'participant_mobile'=>'required|string',
			'participant_gender'=>'required|string',
			'participant_maritialstatus'=>'required|string',
			'participant_age'=>'required|string',
			'participant_remarks'=>'string|nullable',
			'participant_birth_district'=>'string|nullable',
			'participant_per_district'=>'string|nullable',
			'participant_occupation'=>'string|nullable',
			'participant_qualification'=>'string|nullable',
            'participant_email'=>'string|nullable',
            'participant_receiveddate'=>'string|nullable',
            'participant_receivedby'=>'string|nullable',
            'participant_phone'=>'required|string',
            'entered_by'=>'required|string',
            'participant_per_address'=>'required|string',
	];
        
}

