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
            $count_receiver = CommunicationReceiver::where('status_communication_id', 1)->where('user_receiver_id', auth()->user()->id)->count();

            $count_send = Communication::join('communication_receivers', 'communication_receivers.communication_id', '=', 'communications.id')->with('communication', 'user')->where('communications.user_id', auth()->user()->id)->where('communication_receivers.status_communication_id', 3)->orderBy('communications.id', 'desc')->count();

            view()->share('count_receiver', $count_receiver);
            view()->share('count_send', $count_send);
            
            return $next($request);
        });
    }

    public function getMessage($id)
    {
        //$comm = CommunicationReceiver::join('communications', 'communications.id', '=', 'communication_receivers.communication_id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communications.id', $id)->get();

        $data = Communication::with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communications.id', $id)->get();

        /*if ($comm[0]->status_communication['id'] == 1)
        {
            $update = CommunicationReceiver::where('id', $id)->first();
            $update->read = Carbon::now();
            $update->status_communication_id = 2;
            $update->save();
        }*/

        return view('message')->with(compact(/*'comm', */'data'));
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
        $communication_receiver = new CommunicationReceiver();
        $communication_receiver->communication_id = $request->input('communication_id');
        $communication_receiver->user_id = auth()->user()->id;
        $communication_receiver->user_receiver_id = $request->input('user_receiver');
        $communication_receiver->content = $request->input('reply');

        if ($request->file('file'))
        {
            $doc = $request->file('file');
            $file_route = time().'_'.$doc->getClientOriginalName();
            Storage::disk('messageFiles')->put($file_route, file_get_contents($doc->getRealPath()));
            $communication->doc_file = $file_route;
        }

        $communication_receiver->status_communication_id = 1;
        $communication_receiver->priority_id = 0;
        $communication_receiver->save();






        return redirect()->route('ver_mensaje', ['id' => $request->input('communication_receiver_id')]);
    }
}
