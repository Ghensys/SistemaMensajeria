<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Management;
use App\Department;
use App\User;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*public function GetManagements()
    {
        $managements = Management::all();
        $data = [];
        $data[0] = [
            'id'    => 0,
            'text'  => 'Seleccione',
        ];

        foreach ($managements as $key => $value)
        {
            $data[$key+1] = [
                'id'    => $value->id,
                'text'  => $value->description_management,
            ];
        }

        return response()->json($data);
    }*/

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
