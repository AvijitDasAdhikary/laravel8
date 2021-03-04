<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;
use App\Models\Department;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Forms::with('departmentId')->get();
        return view('forms.view', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();
        return view('forms.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        validator::make($request->all(),[
            'department' => 'required',
            'formTitle' => 'required',
            'formsDescription' => 'required',
        ])->validate();

        $forms = new Forms();
        $forms->department_id = $request->department;
        $forms->title = $request->formTitle;
        $forms->description = $request->formsDescription;
        $forms->is_active = $request->formStatus;
        $forms->save();

        return redirect('forms');
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
        $departments = Department::get();
        $forms = Forms::findOrFail($id);
        return view('forms.edit', compact('forms','id','departments'));
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
        validator::make($request->all(),[
            'department' => 'required',
            'formTitle' => 'required|unique:forms,title,'.$id,
            'formsDescription' => 'required',
        ])->validate();
        
        $forms = Forms::findOrFail($id);
        $forms->department_id = $request->department;
        $forms->title = $request->formTitle;
        $forms->description = $request->formsDescription;
        $forms->is_active = $request->formStatus;
        $forms->save();

        return redirect('forms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forms = Forms::findOrFail($id);
        $forms->delete();

        return Response::json(array('success' => true), 200); 
    }
}
