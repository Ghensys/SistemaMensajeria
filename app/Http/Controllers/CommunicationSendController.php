<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationReceiver;
use App\Communication;

class CommunicationSendController extends Controller
{
    public function show()
    {
    	$communications = Communication::join('communication_receivers','communication_receivers.communication_id', '=', 'communications.id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communications.user_id', auth()->user()->id)->orderBy('communications.id', 'desc')->get();

    	return view('send')->with(compact('communications'));;

    }
}
