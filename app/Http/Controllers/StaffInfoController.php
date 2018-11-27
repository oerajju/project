<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffInfo;
use App\District;
use App\OrgType;
use DB;
class StaffInfoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('staff-info.index');
        }

    public function showList(Request $request){
        return view('staff-info.list');
    }

    public function listData(Request $request) {
        $model = new StaffInfo();
        $entry = $request->input("entry");
        $search = $request->input("search", null);
        $page = $request->input("page", null);
        // return [$pgno,$srch];
        if ($page == null) {
            $page = 1;
        }
        if ($search == null) {
            $rwrd = DB::table($model->getTable().' as si')->select(['si.staffid','si.nameen','si.namenp','p.nameen as postnameen','p.namenp as postnamenp'])->join('post as p','p.pid','=','si.postid')->paginate($entry, ['*'], 'page', $page);
        } else {
            $rwrd = DB::table($model->getTable().' as si')->select(['si.staffid','si.nameen','si.namenp','p.nameen as postnameen','p.namenp as postnamenp'])->join('post as p','p.pid','=','si.postid')->where('si.nameen', 'LIKE', "%$search%")->orwhere('si.namenp', 'LIKE', "%$search%")->orwhere('p.namenp', 'LIKE', "%$search%")->paginate($entry, ['*'], 'page', $page);
        }
        return $rwrd;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $parent = \App\Organization::all();
        $post = \App\Post::all();
        $product = \App\Product::all();
        $specialization = \App\ExpertType::all();
        return view('staff-info.create')->with('parent', $parent)
                                        ->with('post', $post)
                                        ->with('product',$product)
                                        ->with('specialization', $specialization);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //return $request->all();
         $model = new StaffInfo();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token','specid']);
            $model->fill($req);
            if($model->save()){
                foreach($request->input('specid') as $s){
                    $row =\App\StaffSpecialization::find($s);
                    $row->staffid =$model->staffid;
                    $row->save();
                }
            }

            return response()->json($this->successMessage());
        } else {
            return response()->json($this->errorMessage($model->errors), 500);
            // return response()->json(['status'=>'error','title'=>'Error','text'=>'Cannot save data'],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // $model = AdmType::find($id);
        // return view('admtype.show')
        //                 ->with('admtype', $model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
         $model = StaffInfo::find($id);
         return response()->json($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $model = new StaffInfo();
        if ($model->validate($request->except(['staffid']))) {
            $model = StaffInfo::find($id);
            $req = $request->except(['staffid', '_token']);
            $model->fill($req);
            if($model->save()){
                foreach($request->input('specid') as $s){
                    $row =\App\StaffSpecialization::find($s);
                    $row->staffid =$model->staffid;
                    $row->save();
                }
            }
            return response()->json($this->successMessage());
        } else {
            return response()->json($this->errorMessage($model->errors), 500);
            //return response()->json(['status'=>'error','title'=>t_label('Error'),'text'=>t_message('Cannot save data')],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $model = StaffInfo::find($id);
        if ($model->delete()) {
            return response()->json($this->successMessage('Item deleted successfully.'));
        } else {
            return response()->json($this->errorMessage('Cannot remove item, Try agian later.'));
        }
    }

    public function specRecord(Request $request) {
        $model = new \App\StaffSpecialization();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            if($model->save()){
                $data = new \App\StaffSpecialization();
                $data = $data->addedStaffSpec($model);
            }
            return response()->json($data);
        } else {
            return response()->json($this->errorMessage($model->errors), 500);
            //return response()->json(['status'=>'error','title'=>t_label('Error'),'text'=>t_message('Cannot save data')],500);
        }
    }
    public function removeSpecRow($id){
        $model = \App\StaffSpecialization::find($id);
        if ($model->delete()) {
            return response()->json($this->successMessage('Item deleted successfully.'));
        } else {
            return response()->json($this->errorMessage('Cannot remove item, Try agian later.'));
        }
    }
    public function getSpecializationOfStaff($staffid){
        $data = new \App\StaffSpecialization();
        $model = \App\StaffSpecialization::where('staffid', $staffid)->get();
        foreach($model as $m){
        $data1[] = $data->addedStaffSpec($m);
        }
        return $data1;
    }

    public function getSelectOptions() {
         $model = new Staffinfo();
         $data = DB::table($model->getTable().' as si')->select(['si.staffid','si.nameen as staffnameen','si.namenp as staffnamenp','si.orgid','org.nameen','org.namenp'])->join('organization_str as org','org.orgid','=','si.orgid')->get();
         return response()->json($data);
    }
    public function specPersonRecord(Request $request) {
        $model = new \App\ResourcePersonResp();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            if($model->save()){
                $data = new \App\ResourcePersonResp();
                $data = $data->addedRePerResp($model);
            }
            return response()->json($data);
        } else {
            return response()->json($this->errorMessage($model->errors), 500);
            //return response()->json(['status'=>'error','title'=>t_label('Error'),'text'=>t_message('Cannot save data')],500);
        }
    }


}
