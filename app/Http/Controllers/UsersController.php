<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Organization;
use App\StaffInfo;
use App\UserType;
use DB;
use Hash;
use Session;
class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('users.index');
        }

    public function showList(Request $request){
        return view('users.list');
    }

    public function listData(Request $request) {
        $model = new Users();
        $entry = $request->input("entry");
        $search = $request->input("search", null);
        $page = $request->input("page", null);
        // return [$pgno,$srch];
        if ($page == null) {
            $page = 1;
        }
        if ($search == null) {
            $rwrd = DB::table($model->getTable().' as u')->select(['u.userid as userid','u.username as username','ut.nameen as usertype'])->join('user_type as ut','ut.utid','=','u.usertypeid')->paginate($entry, ['*'], 'page', $page);
        } else {
            $rwrd = DB::table('$model->getTable() as u')->join('user_type as ut','ut.utid','=','u.usertypeid')->where('u.username', 'LIKE', "%$search%")->orwhere('ut.usertype', 'LIKE', "%$search%")->paginate($entry, ['*'], 'page', $page);
        }
        return $rwrd;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $parent = Organization::all();
        $emp = StaffInfo::all();
        $usertype = UserType::all();
        return view('users.create')->with('emp', $emp)
                                   ->with('usertype', $usertype)
                                   ->with('parent', $parent);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //return $request->all();
         $model = new Users();
        if ($model->validate($request->all())) {
            $req = $request->except(['_token','password']);
            $model->fill($req);
            $model->password = hash::make($request->input(["password"]));
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
         $model = Users::find($id);
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
        $model = new Users();
        if ($model->validate($request->except(['userid']))) {
            $model = Users::find($id);
            $req = $request->except(['userid', '_token','password']);
            $model->fill($req);
            if(!empty($request->input(['password']))){
                $model->password = hash::make($request->input(['password']));
            }
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
        $model = Users::find($id);
        if ($model->delete()) {
            return response()->json($this->successMessage('Item deleted successfully.'));
        } else {
            return response()->json($this->errorMessage('Cannot remove item, Try agian later.'));
        }
    }

    public function getSelectOptions() {
        // $model = new Users();
        // $data = $model->getSelectedData(['id', 'name'], 'name', "id,=,1");
        // return $data;
    }
    public function changePasswordIndex(){
        $users = (new Users())->getUserDetails(session('userid'));
        return view('users.changepassword')->with('users', $users);
    }
    public function storeChangePassword($userid,Request $request){
        $users = Users::find($userid);
        $hash_password = Hash::make($request->input('new_password'));
        //return $hash_password;
        if(Hash::check($request->input('cur_password'), $users->password)){
            $users->password = $hash_password;
            $users->save();
            return response()->json($this->successMessage('Password successfully changed.'));
        }else {
            return response()->json($this->errorMessage('Wrong Current Password!!'),500);
        }
    }

}
