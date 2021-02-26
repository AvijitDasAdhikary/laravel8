<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormItemOption;
use App\Models\FormItem;
use App\Models\masterFormOptions;
use App\Models\Forms;
use App\Models\FormSection;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class FormItemOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formitemoptions = FormItemOption::with('ItemId','OptionId')->get();
        return view('form_item_options.view',compact('formitemoptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forms = Forms::get();
        $formsections = FormSection::get();
        $formitems = FormItem::get();
        $masterformoptions = masterFormOptions::get();
        return view('form_item_options.create',compact('formitems','masterformoptions','forms','formsections'));
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
            'masterFormLabel' => 'required',
        ])->validate();
        
        $option_id = $request->input('masterFormLabel'); 
        foreach($option_id as $option)
        {
            $formitemoptions = new FormItemOption();
            $formitemoptions->item_id = $request->formItemTitle;
            $formitemoptions->option_id = $option;
            $formitemoptions->is_active = $request->formItemOptionStatus;
            $formitemoptions->save();
        }
        return redirect('formitemoptions');
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
        $masterformoptions = masterFormOptions::get();
        $formitemoptions = FormItemOption::findOrFail($id);
        return view('form_item_options.edit', compact('formitemoptions','id','formitems','masterformoptions'));
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
            'formItemTitle' => 'required',
            'masterFormLabel' => 'required',
        ])->validate();

        $option_id = $request->input('masterFormLabel'); 
        foreach($option_id as $option)
        {
            $formitemoptions = FormItemOption::findOrFail($id);
            $formitemoptions->item_id = $request->formItemTitle;
            $formitemoptions->option_id = $option;
            $formitemoptions->is_active = $request->formItemOptionStatus;
            $formitemoptions->save();
        }

        return redirect('formitemoptions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formitemoptions = FormItemOption::findOrFail($id);
        $formitemoptions->delete();

        return Response::json(array('success' => true), 200); 
    }

    public function getFormTitle($formId){
        $formtitles = FormSection::where(['form_id'=>$formId])->get();
        $returndata = [];
        foreach($formtitles as $formtitle){
            $returndata[] = [
                'id' => $formtitle->id,
                'title' => $formtitle->section_title,
            ];
        }
        return Response::json($returndata,200);
    }

    public function getSectionTitle($SectionId){
        $formsections = FormItem::where(['section_id'=>$SectionId])->get();
        $returndata = [];
        foreach($formsections as $formsection){
            $returndata[] = [
                'id' => $formsection->id,
                'title' => $formsection->title,
            ];
        }
        return Response::json($returndata,200);
    }
}
