<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CommunicationReceiver;
use App\Communication;
use App\Management;
use App\Department;

use Yajra\Datatables\Datatables;

class DepartmentController extends Controller
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
    	return view('departments.index');
    }

    public function getFormNewDepartments()
    {
    	$managements = Management::all();
    	return view('departments.create')->with(compact('managements'));
    }

    public function create(Request $request)
    {
    	$this->validate($request, [
            'management_id' => 'required|exists:managements,id',
            'description_department' => 'required|string|max:25',
            ]);

    	$create = new Department();
    	$create->description_department = $request->description_department;
    	$create->management_id = $request->management_id;

    	$create->save();

    	return redirect(route('departamento.index'));
    }

    public function getDepartments()
    {
        $departments = Department::with('management');

        return Datatables::of($departments)
            ->addColumn('action', function ($department) {
                return '<a href="/departamento/update/'.$department->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }

    public function getUpdate($id)
    {
        $departments = Department::with('management')->find($id);
        $managements = Management::all();

        return view('departments.update')->with(compact('departments', 'managements'));
    }

    public function postUpdateDepartment(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'id' => 'required|exists:departments,id',
            'description_department' => 'required|string|max:25|unique:departments,description_department',
            'management_id' => 'required|exists:managements,id',
            ]);

        $update = Department::find($request->id);
        $update->description_department = $request->description_department;
        $update->management_id = $request->management_id;

        $update->save();

        //return view('departments.index');
        return redirect(route('departamento.index'));

    }
}
