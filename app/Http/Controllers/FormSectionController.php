<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormSection;
use App\Models\Forms;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class FormSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formsections = FormSection::with('formId')->get();
        return view('form_section.view', compact('formsections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forms = Forms::get();
        return view('form_section.create', compact('forms'));
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
            'formTitle' => 'required',
            'sectionTitle' => 'required',
            'parentID' => 'required',
        ])->validate();

        $formsections = new FormSection();
        $formsections->form_id = $request->formTitle;
        $formsections->section_title = $request->sectionTitle;
        $formsections->parent_id = $request->parentID;
        $formsections->is_active = $request->sectionStatus;
        $formsections->save();

        return redirect('formsection');
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
        $forms = Forms::get();
        $formsections = FormSection::findOrFail($id);
        return view('form_section.edit', compact('formsections','id','forms'));
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
            'formTitle' => 'required',
            'sectionTitle' => 'required',
            'parentID' => 'required',
        ])->validate();
        
        $formsections = FormSection::findOrFail($id);
        $formsections->form_id = $request->formTitle;
        $formsections->section_title = $request->sectionTitle;
        $formsections->parent_id = $request->parentID;
        $formsections->is_active = $request->sectionStatus;
        $formsections->save();

        return redirect('formsection');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formsections = FormSection::findOrFail($id);
        $formsections->delete();

        return Response::json(array('success' => true), 200); 
    }
}
