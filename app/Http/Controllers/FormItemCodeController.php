<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormItemCode;
use App\Models\FormItem;
use App\Models\FormCodes;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class FormItemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formitemcodes = FormItemCode::with('formItemId','formCodeId')->get();
        return view('form_item_codes.view', compact('formitemcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formitems = FormItem::get();
        $formcodes = FormCodes::get();
        return view('form_item_codes.create',compact('formitems','formcodes'));
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
            'formItemTitle' => 'required',
            'formCode' => 'required',
        ])->validate();

        $formitemcodes = new FormItemCode();
        $formitemcodes->item_id = $request->formItemTitle;
        $formitemcodes->code_id = $request->formCode;
        $formitemcodes->is_active = $request->formItemCodeStatus;
        $formitemcodes->save();

        return redirect('formitemcodes');
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
        $formitems = FormItem::get();
        $formitemcodes = FormItemCode::findOrFail($id);
        return view('form_item_codes.edit', compact('formitemcodes','id','formitems'));
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
        $formitemcodes = FormItemCode::findOrFail($id);
        $formitemcodes->delete();

        return Response::json(array('success' => true), 200); 
    }
}
