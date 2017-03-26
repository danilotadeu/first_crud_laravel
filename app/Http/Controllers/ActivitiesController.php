<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Activities;
use App\Models\Status;
use Validator;
use Input;
use Session;
use Redirect;
use View;

class ActivitiesController extends Controller{

    public function index(Request $request){

        // dd($request->all());
        $activities = Activities::orderBy('created_at', 'desc')
                                            ->with('status');

        if(!empty(Input::get('status_id'))){
             $activities = $activities->where('status_id','=',Input::get('status_id'));
        }

        if(!is_null(Input::get('situation')) && Input::get('situation') != ""){
             $activities = $activities->where('active','=',Input::get('situation'));
        }

        return view('activities.index', ['activities' => $activities->get(),'status'=>Status::all()->pluck('status','id')]);
    }

    public function create(){
        return view('activities.create',['status'=>Status::all()->pluck('status','id')]);
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:600',
            'date_start' => 'required|date',
            'date_end' => 'required_if:status_id,==,4|date',
        ]);

        if ($validator->fails()) {
            return Redirect::to('activities/create')
            ->withErrors($validator)
            ->withInput();
        } else {
            // store
            $activities = new Activities;
            $activities->name = Input::get('name');
            $activities->date_start = Input::get('date_start');
            $activities->date_end = !empty(Input::get('date_end'))?Input::get('date_end'):null;
            $activities->description = Input::get('description');
            $activities->status_id = Input::get('status_id');
            $activities->save();

            // redirect
            Session::flash('message', 'A atividade foi cadastrada com sucesso!');
            return Redirect::to('activities');
        }
    }

        public function edit($id){

            $activities = Activities::with('status')->find($id);
            if(!empty($activities)){
                if($activities->status->status != 'Concluído'){
                    return view('activities.edit',['activities'=> $activities,'status'=>Status::all()->pluck('status','id')]);
                }else{
                    Session::flash('message', 'A atividade foi concluída, impossível edita-la!');
                    return Redirect::to('activities');
                }
            }else{
                Session::flash('message', 'A atividade não foi encontrada!');
                return Redirect::to('activities');
            }
        }

        public function update($id){

            $validator = Validator::make(Input::all(), [
                'name' => 'required|max:255',
                'description' => 'required|max:600',
                'date_start' => 'required|date',
                'date_end' => 'required_if:status_id,==,4|date',
            ]);

            if ($validator->fails()) {
                return Redirect::to('activities/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
            } else {
            // store
                $activities = Activities::find($id);
                $activities->name = Input::get('name');
                $activities->date_start = Input::get('date_start');
                $activities->date_end = Input::get('date_end');
                $activities->description = Input::get('description');
                $activities->status_id = Input::get('status_id');
                $activities->save();

            // redirect
                Session::flash('message', 'A atividade foi alterada com sucesso!');
                return Redirect::to('activities');
            }
        }

}

?>