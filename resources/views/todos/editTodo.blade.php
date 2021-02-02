@extends('adminlte::page')

@section('content_header')
    <h1>Edit Todo</h1>
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
                            <button type="submit" id="btntodoSubmit" class="btn btn-info btn-flat text-white">Update</button>
                            <button type="submit" id="btntodoCancel" class="btn btn-primary btn-flat text-white">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

