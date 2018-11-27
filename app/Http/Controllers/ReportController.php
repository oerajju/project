<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;
use App\Post;
use App\Organization;
use App\StaffInfo;
use DB;
class ReportController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employeeList(){
        $organization = Organization::all();
        $post = Post::all();
        return view('report.employeelist')->with('organization', $organization)
                                        ->with('post', $post);
    }
    public function participantList(){
        return view('report.participantlist');
    }
    public function participantCount(){
        return view('report.participantcount');
    }
    public function getEmployee(Request $req){
        $type = 'xlsx';
        $org = $req->input('orgid');
        $post = $req->input('post');
        $gender = $req->input('gender');
        $name = $req->input('name');
        $check = $req->input('download');
        $orgname = (new Organization())->getOrgName($org);
        $staff_info = DB::table('staff_info as em')->select(['or.namenp as orgname','em.employeeno','em.nameen as Employee Name[English]','em.namenp as Employee Name[Nepali]','em.gender','em.dob','p.namenp as post','em.phone','em.mobile','em.email'])
                   ->join('organization_str as or','or.orgid','=','em.orgid')
                   ->join('post as p','p.pid','=','em.postid')
                    ->where('em.orgid','=', $org);
            if(!empty($post)){
                $staff_info->where('em.postid', $post);
            }
            if(!empty($gender)){
                $staff_info->where('em.gender', $gender);
            }
            if(!empty($name)){
                $staff_info->where('em.namenp', $name);
            }
            $staff_info = json_decode(json_encode($staff_info->get()), true);
            if($check == 'on'){
            return \Excel::create('staff_info', function ($excel) use ($staff_info) {
                $excel->sheet('sheet1', function ($sheet) use ($staff_info) {
                $sheet->fromArray($staff_info);
                //$sheet->setHeight(15);
                $sheet->getStyle('A1:J1')->applyFromArray(array(
                    'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'bold'      =>  true,
                    'align'     =>'center',
                    )
                ));
                $sheet->setBorder('A1:F10', 'thin');
                $sheet->setHeight(1, 30);
                // $cells->setAlignment('center');
                // $cells->setValignment('center');
                $sheet->row(1, function($row) {
                $row->setBackground('#8DB2E3');
                });
                $sheet->prependRow(1 , function($row){
                    $row->setValue('hello Everyone!!!');
                });
                //$sheet->setFreeze(1);
            });
            })->download($type);
        }else{
            return view('view_first')->with('staff', $staff_info)
                                    ->with('orgname', $orgname);
        }
    }
}
