<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Management;
use App\Department;
use App\User;

class ServiceController extends Controller
{
    public function getDepartments(Request $request, $id)
    {
        if ($request->ajax())
        {
            $departments = Department::SelectDepartments($id);
            return response()->json($departments);
        }
    }

    public function getUsers(Request $request, $id)
    {
        if ($request->ajax())
        {
            $users = User::SelectUsers($id);
            return response()->json($users);
        }
    }
}
