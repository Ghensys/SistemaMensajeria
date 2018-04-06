<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationReceiver;
use App\Communication;

class MessageController extends Controller
{
    public function getMessage($id)
    {
    	$comm = CommunicationReceiver::join('communications', 'communications.id', '=', 'communication_receivers.communication_id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communication_receivers.id', $id)->get();


    	return view('message')->with(compact('comm'));
    }
}
