<?php

namespace App;
use App\BaseModel;
//use Maatwebsite\Excel\Concerns\FromQuery;
//use Maatwebsite\Excel\Concerns\Exportable;
//use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class StaffInfo extends BaseModel
{
	//use Exportable;
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
 // public function __construct($org, $post = null, $name =null, $gender= null)
 //    {
 //    	$this->orgid = $org; 
 //    	$this->nameen =$name;
 //    	$this->namenp = $name;
 //    	$this->postid = $post;
 //    	$this->gender = $gender; 
 //    }
 
   //  public function query()
   //  {
   //  	return StaffInfo::query()->select(['staffid','nameen','namenp',]);
   //  	$staff_info = StaffInfo::query()->select(['or.namenp as orgname','em.employeeno','em.nameen as employee Name[English]','em.namenp as Employee Name[Nepali]','em.gender','em.dob','p.namenp as post','em.phone','em.mobile','em.email'])
   //                 ->join('organization_str as or','or.orgid','=','em.orgid')
   //                 ->join('post as p','p.pid','=','em.postid')
   //                  ->where('em.orgid','=', $org);
			// if(!empty($this->postid)){
   //              $staff_info->where('em.postid', $this->postid);
   //          }
   //          if(!empty($this->gender)){
   //              $staff_info->where('em.gender', $this->gender);
   //          }
   //          if(!empty($this->namenp)){
   //              $staff_info->where('em.namenp', $this->namenp);
   //          }

   //      return $staff_info;
   //  }
   //  public function headings(): array
   //  {
   //      return [
   //          '#',
   //          'Name',
   //          'Email',
   //          'Created at',
   //          'Updated at'
   //      ];
   //  }
 
        
}

