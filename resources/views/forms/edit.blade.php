@extends('adminlte::page')

@section('title', 'Forms')

@section('content_header')
    {{-- <h1>Edit Forms</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Edit Form</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('forms') }}" class="text-info">Forms</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/forms/{{ $id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="department" class="text-sm">Department</label>
                                    <select name="department" id="department" class="form-control form-control-sm rounded-0">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" 
                                            {{ $forms->department_id == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formTitle" class="text-sm">Title</label>
                                    <input type="text" name="formTitle" id="formTitle" value="{{ $forms->title }}" class="form-control form-control-sm rounded-0">
                                    @error('formTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formsDescription" class="text-sm">Description</label>
                                    
                                    <input type="text" name="formsDescription" id="formsDescription" value="{{ $forms->description }}" class="form-control form-control-sm rounded-0">
                                    @error('formsDescription')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formStatus" class="text-sm">Status</label>
                                    <select name="formStatus" id="formStatus" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($forms->is_active == 1) {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if($forms->is_active == 0) {{ 'selected' }} @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <button type="submit" name="btnFormsUpdate" class="btn btn-info btn-flat text-white">Update</button>
                            <a href="{{ url('forms') }}" id="btnFormsCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop