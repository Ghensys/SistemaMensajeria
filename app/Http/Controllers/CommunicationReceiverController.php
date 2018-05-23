<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationReceiver;
use App\Communication;
use App\Http\Controllers\Auth;
use App\User;
use App\StatusRead;

use View;

class CommunicationReceiverController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next)
        {
            $count_receiver = CommunicationReceiver::where('status_communication_id', 1)->where('user_receiver_id', auth()->user()->id)->count();

            $count_send = Communication::join('communication_receivers', 'communication_receivers.communication_id', '=', 'communications.id')->with('communication', 'user')->where('communications.user_id', auth()->user()->id)->where('communication_receivers.status_communication_id', 3)->orderBy('communications.id', 'desc')->count();

            view()->share('count_receiver', $count_receiver);
            view()->share('count_send', $count_send);

            return $next($request);
        });
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
        $communication_receiver->user_id = auth()->user()->id;
        $communication_receiver->user_receiver_id = $request->input('user');
        $communication_receiver->status_communication_id = 1;
        $communication_receiver->priority_id = 0;
        $communication_receiver->save();

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
    
        $communications = CommunicationReceiver::/*join('communications', 'communications.id', '=', 'communication_receivers.communication_id')->*/with('communication', 'user', 'user_receiver', 'status_communication', 'priority', 'communication_type', 'status_read')->where('communication_receivers.user_receiver_id', auth()->user()->id)->orderBy('communication_receivers.id', 'desc')->get();

        //$communications = CommunicationReceiver::with('communication', 'user', 'status_communication', 'priority', 'communication_type', 'status_read')->where('communication_receivers.user_receiver_id', auth()->user()->id)->orderBy('communication_receivers.id', 'desc')->get();

        //$communications = Communication::join('communication_receivers', 'communication_receivers.communication_id', '=', 'communications.id')->with('user', 'user_receiver', 'status_communication', 'communication_type')->where('communication_receivers.user_receiver_id', auth()->user()->id)->orderBy('communications.id', 'desc')->get();

        /*
        Consulta en proceso (SEGUIR REVISANDO)
        $communications = Communication::leftJoin('communication_receivers','communication_receivers.communication_id','=','communications.id')->with('status_read','communication')->where('communication_receivers.user_receiver_id', auth()->user()->id)->get();
        
        */

        //return $communications;
        
        return view('inbox')->with(compact('communications'));
    }
}
