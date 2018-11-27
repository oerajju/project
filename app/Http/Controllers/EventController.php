<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;
class EventController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeEvent(Request $request) {
        //return $request->all();
        $model = new Event();
         if ($model->validate($request->all())) {
            $req = $request->except(['_token','rprid']);
            $model->fill($req);
            if($model->save()){
                foreach($request->input('rprid') as $r){
                    $row = \App\ResourcePersonResp::find($r);
                    $row->eventid =$model->id;
                    $row->save();
                }
            }

            return response()->json($this->successMessage());
        } else {
            return response()->json($this->errorMessage($model->errors), 500);
            // return response()->json(['status'=>'error','title'=>'Error','text'=>'Cannot save data'],500);
        }
    }

    public function storeParticipantForm(Request $request) {
        return $request->all();
        $model = new Event();
         if ($model->validate($request->all())) {
            $req = $request->except(['_token','rprid']);
            $model->fill($req);
            if($model->save()){
                foreach($request->input('rprid') as $r){
                    $row = \App\ResourcePersonResp::find($r);
                    $row->eventid =$model->id;
                    $row->save();
                }
            }

            return response()->json($this->successMessage());
        } else {
            return response()->json($this->errorMessage($model->errors), 500);
            // return response()->json(['status'=>'error','title'=>'Error','text'=>'Cannot save data'],500);
        }
    }
    
}
