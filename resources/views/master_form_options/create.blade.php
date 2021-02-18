@extends('adminlte::page')

@section('title', 'Master Form Options')

@section('content_header')
    {{-- <h1>Master Form Options</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Create Master Form Options</h1>
            <a href="/masterformoptions" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Back To View</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('masterformoptions') }}" class="text-info">Master Form Options</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/masterformoptions" method="POST">

                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="masterFormLabel" class="text-sm">Label</label>
                                    <input type="text" name="masterFormLabel" id="masterFormLabel" placeholder="Enter Label" class=" form-control form-control-sm rounded-0" value="{{ old('label') }}">
                                    @error('masterFormLabel')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="masterFormStatus" class="text-sm">Status</label>
                                    <select name="masterFormStatus" id="masterFormStatus"   class="form-control form-control-sm rounded-0">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <input type="submit" name="btnmasterFormSubmit" value="Submit" class="btn btn-info btn-flat text-white">
                            <!-- <button type="submit" id="btndepartmentSubmit" class="btn btn-info btn-flat text-white">Submit</button> -->
                            <a href="{{ url('masterformoptions') }}" id="btnmasterFormCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop