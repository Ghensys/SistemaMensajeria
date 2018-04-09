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
    	$update = CommunicationReceiver::where('id', $id)->first();
    	$update->read = Carbon::now();
    	$update->status_communication_id = 2;
    	$update->save();

    	$comm = CommunicationReceiver::join('communications', 'communications.id', '=', 'communication_receivers.communication_id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communication_receivers.id', $id)->get();


    	return view('message')->with(compact('comm'));

    }
}
