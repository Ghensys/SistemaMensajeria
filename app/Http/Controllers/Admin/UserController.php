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
        $departments = Department::where('management_id', $users->management_id)->get();

        return view('users.update')->with(compact('users','roles', 'managements', 'departments'));
    }

    public function postUpdateUser(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'management_id' => 'required|exists:managements,id',
            'department_id' => 'required|exists:departments,id',
            'role_id' => 'required|exists:roles,id',
            ]);

        $update_user = User::find($request->id);

        $update_user->name = $request->name;
        $update_user->email = $request->email;
        $update_user->management_id = $request->management_id;
        $update_user->department_id = $request->department_id;
        $update_user->role_id = $request->role_id;

        $update_user->save();

        return redirect(route('usuario.index'));
    }
}
