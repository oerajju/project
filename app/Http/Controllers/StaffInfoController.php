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
            $rwrd = DB::table($model->getTable())->paginate($entry, ['*'], 'page', $page);
        } else {
            $rwrd = DB::table($model->getTable())->where('nameen', 'LIKE', "%$search%")->orwhere('cid', 'LIKE', "%$search%")->orwhere('namenp', 'LIKE', "%$search%")->orwhere('code', 'LIKE', "%$search%")->paginate($entry, ['*'], 'page', $page);
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
        $orgtype = OrgType::all();
        $district = District::all();
        return view('staff-info.create')->with('parent', $parent);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return 'hello';
        //return $request->all();
         $model = new StaffInfo();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token']);
            $model->fill($req);
            $model->save();
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
            $model->save();
            // redirect
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

    public function getSelectOptions() {
        // $model = new StaffInfo();
        // $data = $model->getSelectedData(['id', 'name'], 'name', "id,=,1");
        // return $data;
    }

}
