<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Redirect,Response;
use Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        return view('departments.view', compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'departmentName'  =>  'required',
            'departmentAlias' =>  'required',
            'departmentDescription' => 'required',
        ],[
            'departmentName.required' => 'Please select Department Name',
            'departmentAlias.required' => 'Please select Alias',
            'departmentDescription.required' => 'Please select Description',
        ]);

        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);
        }
        $departments = new Department();
        $departments->name = $request->departmentName;
        $departments->alias = $request->departmentAlias;
        $departments->description = $request->departmentDescription;
        $departments->is_active = $request->departmentStatus;
        $departments->save();

        return redirect('departments');
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
        $departments = Department::findOrFail($id);
        return view('departments.edit', compact('departments','id'));
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
        $departments = Department::findOrFail($id);

        $departments->name = $request->departmentName;
        $departments->alias = $request->departmentAlias;
        $departments->description = $request->departmentDescription;
        $departments->is_active = $request->departmentStatus;
        $departments->save();

        return redirect('departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departments = Department::findOrFail($id);
        $departments->delete();

        return Response::json(array('success' => true), 200); 
    }
}
