<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Communication;
use App\CommunicationReceiver;
use App\User;
use App\Management;
use App\Department;
use App\Role;

use Yajra\Datatables\Datatables;

class UserController extends Controller
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
    	return view('users.user');
    }

    public function getUsers()
    {
        $users = User::with('institution', 'management', 'department', 'role');

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="update/'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            //->removeColumn('password')
            ->make(true);
    }

    public function getUpdate($id)
    {
        $users = User::with('institution', 'management', 'department', 'role')->find($id);
        $roles = Role::all();
        $managements = Management::all();
        $departments = Department::all();

        return view('users.update')->with(compact('users','roles', 'managements', 'departments'));

    }
}
