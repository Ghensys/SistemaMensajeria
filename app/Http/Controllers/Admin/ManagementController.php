<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CommunicationReceiver;
use App\Communication;
use App\Institution;
use App\Management;

use Yajra\Datatables\Datatables;

class ManagementController extends Controller
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
    	return view('managements.index');
    }

    public function getFormNewManagement()
    {
    	$institutions = Institution::all();
    	return view('managements.create')->with(compact('institutions'));
    }

    public function create(Request $request)
    {
    	$this->validate($request, [
            'institution_id' => 'required|exists:institutions,id',
            'description_management' => 'required|string|max:25',
            ]);

    	$create = new Management();
    	$create->description_management = $request->description_management;
    	$create->institution_id = $request->institution_id;

    	$create->save();

    	return redirect(route('gerencia.index'));
    }

    public function getManagements()
    {
        $managements = Management::with('institution');

        return Datatables::of($managements)
            ->addColumn('action', function ($management) {
                return '<a href="/gerencia/update/'.$management->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
            })
            ->addColumn('action2', function ($management) {
                return '<a href="/gerencia/update/'.$management->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Eliminar</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            //->removeColumn('password')
            ->make(true);
    }

    public function getUpdate($id)
    {
        $managements = Management::with('institution')->find($id);

        return view('managements.update')->with(compact('managements'));
    }

    public function postUpdateManagement(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'id' => 'required|exists:managements,id',
            'description_management' => 'required|string|max:25|unique:managements.description_management',
            ]);

        $update = Management::find($request->id);

        $update->description_management = $request->description_management;

        $update->save();

        return redirect(route('gerencia.index'));
    }
}
