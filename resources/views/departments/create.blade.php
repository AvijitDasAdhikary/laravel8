@extends('adminlte::page')

@section('title', 'Department')

@section('content_header')
    {{-- <h1>Create Department</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Create Department</h1>
            <a href="/departments" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Back To View</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('departments') }}" class="text-info">Department</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/departments" method="POST">

                    @csrf
                    
                    <div class="card-body">
                        <!-- @if ($errors->any())
                            <div class="alert alert-danger rounded-0 p-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentName" class="text-sm">Name</label>
                                    <input type="text" name="departmentName" id="departmentName" placeholder="Enter Department Name" class=" form-control form-control-sm rounded-0" value="{{ old('name') }}">
                                    @error('departmentName')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentAlias" class="text-sm">Alias</label>
                                    <input type="text" name="departmentAlias" id="departmentAlias"placeholder="Enter Alias" class="form-control form-control-sm rounded-0" value="{{ old('alias') }}">
                                    @error('departmentAlias')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentDescription" class="text-sm">Description</label>
                                    <input type="text" name="departmentDescription" id="departmentDescription"placeholder="Enter Description" class="form-control form-control-sm rounded-0" value="{{ old('description') }}">
                                    @error('departmentDescription')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentStatus" class="text-sm">Status</label>
                                    <select name="departmentStatus" id="departmentStatus"   class="form-control form-control-sm rounded-0">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <input type="submit" name="btndepartmentSubmit" value="Submit" class="btn btn-info btn-flat text-white">
                            <!-- <button type="submit" id="btndepartmentSubmit" class="btn btn-info btn-flat text-white">Submit</button> -->
                            <a href="{{ url('departments') }}" id="btndepartmentCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop

