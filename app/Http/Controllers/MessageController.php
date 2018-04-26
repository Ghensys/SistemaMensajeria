<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationReceiver;
use App\Communication;
use Carbon\Carbon;
use View;
use App\Http\Controllers\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next)
        {
            $count_receiver = CommunicationReceiver::where('status_communication_id', 1)->where('user_id', auth()->user()->id)->count();

            $count_send = Communication::join('communication_receivers', 'communication_receivers.communication_id', '=', 'communications.id')->with('communication', 'user')->where('communications.user_id', auth()->user()->id)->where('communication_receivers.status_communication_id', 3)->orderBy('communications.id', 'desc')->count();

            view()->share('count_receiver', $count_receiver);
            view()->share('count_send', $count_send);
            
            return $next($request);
        });
    }

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

        if ($comm[0]->user['id'] == auth()->user()->id and $comm[0]->status_communication['id'] == 3)
        {
            $update = CommunicationReceiver::where('id', $id)->first();
            $update->status_communication_id = 4;
            $update->save();
        }

        return view('message')->with(compact('comm'));
    }

    public function getReplyMessage($id)
    {
        $comm = CommunicationReceiver::join('communications', 'communications.id', '=', 'communication_receivers.communication_id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communication_receivers.id', $id)->get();

        return view('reply_message')->with(compact('comm'));
    }

    public function postReplyMessage(Request $request)
    {
        $reply = CommunicationReceiver::where('id', $request->input('communication_receiver_id'))->first();
        $reply->answer = $request->input('reply_message');
        $reply->status_communication_id = 3;
        $reply->save();

        return redirect()->route('ver_mensaje', ['id' => $request->input('communication_receiver_id')]);
    }
}
