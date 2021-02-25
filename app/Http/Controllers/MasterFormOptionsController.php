<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\masterFormOptions;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class MasterFormOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterformoptions = masterFormOptions::get();
        return view('master_form_options.view', compact('masterformoptions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_form_options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'masterFormLabel' => 'required|unique:master_form_options,label',
            'inputColorCode' => 'required|unique:master_form_options,color_code'
            ],[
                'inputColorCode.required' => 'Please select a color',
                'inputColorCode.unique' => 'duplicate'
        ])->validate();
        

        $masterformoptions = new masterFormOptions();
        $masterformoptions->label = $request->masterFormLabel;
        $masterformoptions->color_code = $request->inputColorCode;
        $masterformoptions->is_active  = $request->masterFormStatus;
        $masterformoptions->save();

        return redirect('masterformoptions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\masterFormOptions  $masterFormOptions
     * @return \Illuminate\Http\Response
     */
    public function show(masterFormOptions $masterFormOptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\masterFormOptions  $masterFormOptions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masterformoptions = masterFormOptions::findOrFail($id);
        return view('master_form_options.edit', compact('masterformoptions','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\masterFormOptions  $masterFormOptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(),[
            'masterFormLabel' => 'required',
            'inputColorCode' => 'required'
            ],[
                'inputColorCode.required' => 'Please select a color',
                'inputColorCode.unique' => 'duplicate'
        ])->validate();
        
        $masterformoptions = masterFormOptions::findOrFail($id);
        $masterformoptions->label = $request->masterFormLabel;
        $masterformoptions->color_code = $request->inputColorCode;
        $masterformoptions->is_active = $request->masterFormStatus;
        $masterformoptions->save();

        return redirect('masterformoptions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\masterFormOptions  $masterFormOptions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masterformoptions = masterFormOptions::findOrFail($id);
        $masterformoptions->delete();

        return Response::json(array('success' => true), 200); 
    }
}
