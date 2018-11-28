<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;
use App\Post;
use App\Organization;
use App\StaffInfo;
use App\ProductType;
use App\ProductCategory;
use App\Product;
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
        $organization = Organization::all();
        $protype = ProductType::all();
        $proCategory = ProductCategory::all();
        $product = Product::all();
        $staff = StaffInfo::all();
        return view('report.participantlist')->with('organization', $organization)
                                        ->with('protype', $protype)
                                        ->with('proCategory', $proCategory)
                                        ->with('product', $product)
                                        ->with('staff', $staff);
    }
    public function participantCount(){
        $organization = Organization::all();
        $protype = ProductType::all();
        $proCategory = ProductCategory::all();
        $product = Product::all();
        $staff = StaffInfo::all();
        return view('report.participantcount')->with('organization', $organization)
                                        ->with('protype', $protype)
                                        ->with('proCategory', $proCategory)
                                        ->with('product', $product)
                                        ->with('staff', $staff);
    }
    public function getEmployee(Request $req){
        $type = 'xlsx';
        $reportname = 'कर्मचारी सूचि';
        $org = $req->input('orgid');
        $post = $req->input('post');
        $gender = $req->input('gender');
        $name = $req->input('name');
        $check = $req->input('download');
        $orgname = (new Organization())->getOrgName($org);
        $staff_info = DB::table('staff_info as em')->select(['or.namenp as सँस्था','em.employeeno as कर्मचारी नं.','em.nameen as Employee Name[English]','em.namenp as नाम (नेपाली)','em.gender as लिङ्ग','em.dob as जन्म मिति','p.namenp as पद','em.phone as फोन','em.mobile as मोबाइल','em.email as ईमेल'])
                   ->join('organization_str as or','or.orgid','=','em.orgid')
                   ->join('post as p','p.pid','=','em.postid')
                    ->where('em.orgid','=', $org)
                    ->orWhere('or.parent_orgid','=', $org)
                    ->orderBy('or.namenp');
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
            return (new \App\Report())->csv($reportname, $staff_info,$type);
        }else{
            return view('view_first')->with('staff', $staff_info)
                                     ->with('reportname', $reportname)
                                    ->with('orgname', $orgname);
        }
    }

    public function searchParticipantList(Request $req){
        $type = 'xlsx';
        $reportname = 'सहभागीको सूची';
        $org = $req->input('orgid');
        $proType = $req->input('product_type');
        $proCat = $req->input('product_cat');
        $product = $req->input('product');
        $teacher = $req->input('teacher');
        $startDate = $req->input('start_date');
        $endDate = $req->input('end_date');
        $check = $req->input('download');
        $orgname = (new Organization())->getOrgName($org);
        $staff_info = DB::table('participant_form as pf')->select(['pf.participant_firstname as Name','pf.participant_email as ईमेल','pf.participant_phone as फोन','pf.participant_mobile as मोबाइल','pf.participant_gender as लिङ्ग','pf.participant_occupation','pf.participant_age as Age','pf.participant_dob as जन्म मिति','participant_per_address as Per. Address','d.nameen as Temp. Address','pf.participant_per_country as Country','pf.participant_dates as Instruction Date','pf.participant_initiator as Name Of Teacher','pf.participant_producttype as Product Type','pf.participant_paidamount as Paid Amount','pf.participant_paymentmethod as Payment Mode','pf.participant_receivedby as Payment Collect By','pf.participant_remarks as Remarks'])
                   ->join('organization_str as or','or.orgid','=','pf.participant_parentorgid')
                   ->join('district as d','d.did','=','pf.participant_temp_district')
                    ->where('pf.participant_parentorgid','=', $org)
                    ->orWhere('or.parent_orgid','=', $org)
                    ->orderBy('or.namenp');
            // if(!empty($proType)){
            //     $staff_info->where('em.postid', $post);
            // }
            // if(!empty($gender)){
            //     $staff_info->where('em.gender', $gender);
            // }
            // if(!empty($name)){
            //     $staff_info->where('em.namenp', $name);
            // }
            $staff_info = json_decode(json_encode($staff_info->get()), true);
            if($check == 'on'){
            return (new \App\Report())->csv($reportname, $staff_info,$type);
        }else{
            return view('view_first')->with('staff', $staff_info)
                                    ->with('reportname', $reportname)
                                    ->with('orgname', $orgname);
        }
    }
}
