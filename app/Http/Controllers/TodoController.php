<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Redirect,Response;
use Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todos = Todo::get();
        $todos = Todo::paginate(5);
        return view('todos.todo', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.createTodo');
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
            'todoName'  =>  'required',
        ],[
            'todoName.required' => 'Please select TodoName',
        ]);

        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);
        }
        $todos = new Todo();
        $todos->name = $request->todoName;
        $todos->status = $request->todoStatus;
        if ($request->hasFile('inputImage')) {
            $document = $request->file('inputImage');
            $documentExtension = $document->getClientOriginalExtension();
            $documentName = time() . '.' . $documentExtension;
            $path = 'uploads/'.date('Y').'/'.date('m').'/'.date('d');
            $document->move(public_path($path), $documentName);
            $dbDocumentPath = $path.'/'.$documentName;
        }else{
            $dbDocumentPath = '';
        }
        $todos->image = $dbDocumentPath;
        $todos->save();

        return redirect('todos');

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
        $todos = Todo::findOrFail($id);
        return view('todos.edittodo', compact('todos','id'));
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
        $todos = Todo::findOrFail($id);

        $todos->name = $request->todoName;
        $todos->status = $request->todoStatus;
        $todos->save();

        return redirect('todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todos = Todo::findOrFail($id);
        $todos->delete();

        return Response::json(array('success' => true), 200);   
    }
}
