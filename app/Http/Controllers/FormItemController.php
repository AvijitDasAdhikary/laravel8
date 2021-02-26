<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormItem;
use App\Models\FormSection;
use App\Models\Forms;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class FormItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formitems = FormItem::with('formSectionId')->get();
        return view('form_item.view', compact('formitems'));
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
        return view('form_item.create',compact('formsections','forms'));
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
            'sectionTitle' => 'required',
            'formItemTitle' => 'required',
            'formItemPoint' => 'required',
            'formItemComment' => 'required',
            'formItemPicture1' => 'required',
            'formItemPicture2' => 'required',
        ])->validate();

        $formitems = new FormItem();
        $formitems->section_id = $request->sectionTitle;
        $formitems->title = $request->formItemTitle;
        $formitems->points = $request->formItemPoint;
        $formitems->is_comment = $request->formItemComment;
        $formitems->is_picture_1 = $request->formItemPicture1;
        $formitems->is_picture_2 = $request->formItemPicture2;
        $formitems->is_active = $request->formItemStatus;
        $formitems->save();

        return redirect('formitem');
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
        $formsections = FormSection::get();
        $formitems = FormItem::findOrFail($id);
        return view('form_item.edit', compact('formitems','id','formsections','forms'));
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
            'sectionTitle' => 'required',
            'formItemTitle' => 'required',
            'formItemPoint' => 'required',
            'formItemComment' => 'required',
            'formItemPicture1' => 'required',
            'formItemPicture2' => 'required',
        ])->validate();

        $formitems = FormItem::findOrFail($id);
        $formitems->section_id = $request->sectionTitle;
        $formitems->title = $request->formItemTitle;
        $formitems->points = $request->formItemPoint;
        $formitems->is_comment = $request->formItemComment;
        $formitems->is_picture_1 = $request->formItemPicture1;
        $formitems->is_picture_2 = $request->formItemPicture2;
        $formitems->is_active = $request->formItemStatus;
        $formitems->save();

        return redirect('formitem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formitems = FormItem::findOrFail($id);
        $formitems->delete();

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
}
