@extends('adminlte::page')

@section('content_header')
    {{-- <h1>Edit Todo</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Edit Todo</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('todos') }} " class="text-info">Todo</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/todos/{{ $id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="todoName">Name</label>
                                    <input type="text" name="todoName" value="{{ $todos->name }}" class="form-control rounded-0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="todoimage">Image</label>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="todoStatus">Status</label>
                                    <select name="todoStatus" id="todoStatus" class="form-control rounded-0">
                                        <option value="1" @if($todos->status == 1) {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if($todos->status == 0) {{ 'selected' }} @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <!-- <input type="submit" name="todoSubmit" class="btn btn-m btn-primary rounded-0"> -->
                            <button type="submit" id="btntodoUpdate" class="btn btn-info btn-flat text-white">Update</button>
                            <a href="{{ url('todos') }}" id="btntodoCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

