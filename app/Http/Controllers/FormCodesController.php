<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormCodes;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Department;


class FormCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formcodes = FormCodes::with('departmentId')->get();
        return view('form_codes.view', compact('formcodes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();
        return view('form_codes.create', compact('departments'));
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
            'departmentID' => 'required',
            'formCode' => 'required',
            'formDescription' => 'required',
        ])->validate();

        $formcodes = new FormCodes();
        $formcodes->department_id = $request->departmentID;
        $formcodes->form_code = $request->formCode;
        $formcodes->description = $request->formDescription;
        $formcodes->is_active = $request->formStatus;
        $formcodes->save();

        return redirect('formcodes');
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
        $formcodes = FormCodes::findOrFail($id);
        return view('form_codes.edit', compact('formcodes','id','departments'));
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
        $formcodes = FormCodes::findOrFail($id);

        $formcodes->department_id = $request->departmentID;
        $formcodes->form_code = $request->formCode;
        $formcodes->description = $request->formDescription;
        $formcodes->is_active = $request->formStatus;
        $formcodes->save();

        return redirect('formcodes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formcodes = FormCodes::findOrFail($id);
        $formcodes->delete();

        return Response::json(array('success' => true), 200); 
    }
}
