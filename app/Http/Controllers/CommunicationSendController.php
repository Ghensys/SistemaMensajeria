<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunicationReceiver;
use App\Communication;
use View;
use App\Http\Controllers\Auth;

class CommunicationSendController extends Controller
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
    
	public function show()
    {
    	$communications = Communication::join('communication_receivers','communication_receivers.communication_id', '=', 'communications.id')->with('communication', 'user', 'status_communication', 'priority', 'communication_type')->where('communications.user_id', auth()->user()->id)->orderBy('communications.id', 'desc')->get();

    	return view('send')->with(compact('communications'));;

    }
}
