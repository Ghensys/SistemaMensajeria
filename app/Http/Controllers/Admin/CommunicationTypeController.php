<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CommunicationReceiver;
use App\Communication;
use App\Management;
use App\Department;
use App\CommunicationType;
use App\Reply;

use Yajra\Datatables\Datatables;

class CommunicationTypeController extends Controller
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

    public function index()
    {
    	return view('communication_types.index');
    }

    public function getFormNewCommunicationTypes()
    {
    	return view('communication_types.create');
    }

    public function create(Request $request)
    {
    	$this->validate($request, [
            'description_communication_type' => 'required|string|max:25|min:8',
            'reply_id' => 'required|exists:replies,id',
            ]);

    	$create = new CommunicationType();
    	$create->description_communication_type = $request->description_communication_type;
    	$create->reply_id = $request->reply_id;

    	$create->save();

    	return redirect(route('tipo_mensaje.index'));
    }

    public function getCommunicationType()
    {
        $communication_types = CommunicationType::all();

        return Datatables::of($communication_types)
            ->addColumn('action', function ($communication_type) {
                return '<a href="/tipo_mensaje/update/'.$communication_type->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

    public function getUpdate($id)
    {
        $communication_types = CommunicationType::find($id);
        $replies = Reply::all();

        return view('communication_types.update')->with(compact('communication_types', 'replies'));
    }

    public function postUpdateCommunicationType(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'id' => 'required|exists:communication_types,id',
            'description_communication_type' => 'required|string|max:25|unique:communication_types,description_communication_type',
            'reply_id' => 'required|exists:replies,id',
            ]);

        $update = CommunicationType::find($request->id);
        $update->description_communication_type = $request->description_communication_type;
        $update->reply_id = $request->reply_id;

        $update->save();

        return redirect(route('tipo_mensaje.index'));

    }
}
