<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;
use App\District;
use App\OrgType;
use DB;
use Response;
class UserTypeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('user-type.index');
        }

    public function showList(Request $request){
        return view('user-type.list');
    }

    public function listData(Request $request) {
        $model = new UserType();
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
        $parent = UserType::all();
        return view('user-type.create')->with('parent', $parent);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //return $request->all();
         $model = new UserType();
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
         $model = UserType::find($id);
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
        $model = new UserType();
        if ($model->validate($request->except(['mid']))) {
            $model = UserType::find($id);
            $req = $request->except(['mid', '_token']);
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
        $model = UserType::find($id);
        if ($model->delete()) {
            return response()->json($this->successMessage('Item deleted successfully.'));
        } else {
            return response()->json($this->errorMessage('Cannot remove item, Try agian later.'));
        }
    }

    public function getMenuList($usertypeid) {
        $model = new \App\UserMenus();
        $data = $model->getAllMenus($usertypeid);
        return response()->json($data);
    }
    public function managePermission(Request $request){
        $usertypeid = $request->input('usertypeid');
        $model = \App\UserMenus::where('usertypeid', $usertypeid);
        $model->delete();
        foreach($request->input('menu') as $m){
                    $row =new \App\UserMenus();
                    $row->usertypeid =$usertypeid;
                    $row->menuid = $m;
                    $row->save();
                }
                return response()->json($this->successMessage());
    }

}
