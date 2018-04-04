<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Management;
use App\CommunicationType;
use App\Communication;
use App\Http\Controllers\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getNewCommunication()
    {
        //$managements = Management::where('institution_id', 1)->get();
        //$managements = Management::all();
        //$departments = Department::all();
        $communication_types = CommunicationType::all();
        //$priorities = Priority::all();




        return view('new_communication')->with(compact('communication_types'));

        /*Route::get('/ajax-departamento', function() 
        {
            $gerencia = $request->input('gerencia');
        });*/
    }

    public function postNewCommunication(Request $request)
    {
        //Communication::create()
        //dd($request->all()) ;
        $this->validate($request, [
            'communication_type' => 'required|exists:communication_types,id',
            'title' => 'required|min:10',
            'content' => 'required|min:4',
            ]);

        $communication = new Communication();
        $communication->communication_type_id = $request->input('communication_type');
        $communication->created_by_id = auth()->user()->id;
        $communication->title = $request->input('title');
        $communication->content = $request->input('content');
        $communication->save();

        $managements = Management::all();
        //$departments = Department::pluck('description_department', 'id');

        return view('communication_receiver')->with(compact('managements', 'communication'));

    }
}
