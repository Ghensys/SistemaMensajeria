<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationReceiver;
use App\Communication;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function getMessage($id)
    {
    	$comm = CommunicationReceiver::join('communications', 'communications.id', '=', 'communication_receivers.communication_id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communication_receivers.id', $id)->get();

    	if ($comm[0]->status_communication['id'] == 1)
    	{
	    	$update = CommunicationReceiver::where('id', $id)->first();
	    	$update->read = Carbon::now();
	    	$update->status_communication_id = 2;
	    	$update->save();
    	}

    	return view('message')->with(compact('comm'));
    }

    public function getMessageSend($id)
    {
        $comm = CommunicationReceiver::join('communications', 'communications.id', '=', 'communication_receivers.communication_id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communication_receivers.id', $id)->get();

        return view('message')->with(compact('comm'));
    }

    public function getReplyMessage($id)
    {
        $comm = CommunicationReceiver::join('communications', 'communications.id', '=', 'communication_receivers.communication_id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communication_receivers.id', $id)->get();

        return view('reply_message')->with(compact('comm'));
    }

    public function postReplyMessage(Request $request)
    {
        $reply = CommunicationReceiver::where('id', $request->id);
        $reply->answer = $request->input('reply_message');

        $reply->save();

        //return view;
    }
}
