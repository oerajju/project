<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Organization;
use DB;
class ReportController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employeeList(){
        $org = Organization::all();
        $post = Post::all();
        return view('report.employeelist')->with('org', $org)
                                        ->with('post', $post);
    }
    public function participantList(){
        return view('report.participantlist');
    }
    public function participantCount(){
        return view('report.participantcount');
    }
    public function getEmployee(Request $req){
        $org = $req->input('orgid');
        $post = $req->input('post');
        $gender = $req->input('gender');
        $name = $req->input('name');
        $model = DB::table('staff_info as em')->select(['or.namenp as orgname','em.employeeno','em.nameen as employee Name[English]','em.namenp as Employee Name[Nepali]','em.gender','em.dob','p.namenp as post','em.phone','em.mobile','em.email'])
                   ->join('organization_str as or','or.orgid','=','em.orgid')
                   ->join('post as p','p.pid','=','em.postid')
                    ->where('em.orgid','=', $org);

            if(!empty($post)){
                $model->where('p.pid', $post);
            }
            if(!empty($gender)){
                $model->where('em.gender', $gender);
            }
            if(!empty($name)){
                $model->where('em.namenp', $name);
            }
        return $model->get();
    }
}
