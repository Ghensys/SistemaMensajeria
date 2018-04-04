<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationReceiver;
use App\Communication;
use App\Http\Controllers\Auth;

class CommunicationReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'management' => 'required|exists:managements,id',
            'department' => 'required|exists:departments,id',
            'user' => 'required|exists:users,id',
            ]);

        $communication_receiver = new CommunicationReceiver();
        $communication_receiver->communication_id = $request->input('communication_id');
        //$communication_receiver->from_id = auth()->user()->id;
        $communication_receiver->user_id = $request->input('user');
        $communication_receiver->status_communication_id = 1;
        $communication_receiver->priority_id = 0;
        $communication_receiver->save();

        //Session::flash('flash_message', 'Mensaje enviado');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$communication_receivers = CommunicationReceiver::where('to_id', Auth::user()->id);
        //$communication_receivers = CommunicationReceiver::all();
        $communications = CommunicationReceiver::where('to_id', auth()->user()->id)->get();
        //$communication = Communication::where('id', $communication_receivers->communication_id)->get();

        //$communications = Communication::join('communication_receivers', 'communication_receivers.communication_id', '=', 'communications.id')->join('communication_receivers.from_id', '=', 'users.id')->join('communication_receivers.to_id', '=', 'users.id')->where('communication_receivers.to_id', auth()->user()->id)->select('communications.*')->get();

        //$communications = CommunicationReceiver::
        
        return view('inbox')->with(compact('communications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
