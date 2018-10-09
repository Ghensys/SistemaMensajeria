<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Management;
use App\CommunicationType;
use App\Communication;
use App\CommunicationReceiver;
use View;
use Storage;
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
        $this->middleware(function ($request, $next)
        {
            $count_receiver = CommunicationReceiver::where('status_communication_id', 1)->where('user_receiver_id', auth()->user()->id)->count();

            view()->share('count_receiver', $count_receiver);

            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bandeja_entrada');
    }

    public function getNewCommunication()
    {
        $communication_types = CommunicationType::all();
        $managements = Management::all();

        return view('new_communication')->with(compact('communication_types', 'managements'));
    }

    public function postNewCommunication(Request $request)
    {
        //dd($request->all()) ;
        $this->validate($request, [
            'management' => 'required|exists:managements,id',
            'department' => 'required|exists:departments,id',
            'user' => 'required|exists:users,id',
            'communication_type' => 'required|exists:communication_types,id',
            'title' => 'required|min:10',
            'content' => 'required|min:20',
            ]);

        $communication = new Communication();
        $communication->communication_type_id = $request->input('communication_type');
        $communication->user_id = auth()->user()->id;
        $communication->title = $request->input('title');
        $communication->status_read_id = 1;

        $communication->save();

        $communication_receiver = new CommunicationReceiver();
        $communication_receiver->communication_id = $communication->id;
        $communication_receiver->user_id = auth()->user()->id;
        $communication_receiver->user_receiver_id = $request->input('user');
        $communication_receiver->content = $request->input('content');

        if ($request->file('file'))
        {
            $doc = $request->file('file');
            $file_route = time().'_'.$doc->getClientOriginalName();
            Storage::disk('messageFiles')->put($file_route, file_get_contents($doc->getRealPath()));
            $communication_receiver->doc_file = $file_route;
        }

        $communication_receiver->status_communication_id = 1;
        $communication_receiver->priority_id = 1;
        $communication_receiver->save();

        return redirect('bandeja_entrada');

    }
}
