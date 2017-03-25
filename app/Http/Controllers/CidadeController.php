<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Cidade;
use Validator;
use Input;
use Session;
use Redirect;
use View;

class CidadeController extends Controller{

    public function index(){

        $cidades = Cidade::all();
        return view('cidade.index', ['cidades' => $cidades]);
    }

    public function create(){
        return view('cidade.create');
    }

    public function store(Request $request){

        //dd($request->cidade);
        $validator = Validator::make($request->all(), [
            'cidade' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('cidade/create')
            ->withErrors($validator);
        } else {
            // store
            $cidade = new Cidade;
            $cidade->cidade = Input::get('cidade');
            $cidade->save();

            // redirect
            Session::flash('message', 'Successfully created cidade!');
            return Redirect::to('cidade');
        }
    }

        public function edit($id){
        // get the nerd
            $cidade = Cidade::find($id);

        // show the edit form and pass the nerd
            return View::make('cidade.edit')
            ->with('cidade', $cidade);
        }

        public function update($id){

            $rules = array(
                'cidade'       => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('cidade/edit/' . $id)
                ->withErrors($validator);
            } else {
            // store
                $cidade = Cidade::find($id);
                $cidade->cidade       = Input::get('cidade');
                $cidade->save();

            // redirect
                Session::flash('message', 'Successfully updated cidade!');
                return Redirect::to('cidade');
            }
        }

    public function destroy($id){
        // delete
        $cidade = Cidade::find($id);
        $cidade->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the cidade!');
        return Redirect::to('cidade');
    }

}

?>