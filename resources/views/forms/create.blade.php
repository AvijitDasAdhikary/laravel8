@extends('adminlte::page')

@section('title', 'Forms')

@section('content_header')
    {{-- <h1>Forms</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Create Form</h1>
            <a href="/forms" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Back To View</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('forms') }}" class="text-info">Forms</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/forms" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="department" class="text-sm">Department</label>
                                    <select name="department" id="department" class="form-control form-control-sm rounded-0">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">
                                            {{$department->name}}</option>
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
                                    <input type="text" name="formTitle" id="formTitle" class="form-control form-control-sm rounded-0" placeholder="Enter Title" value="{{ old('title') }}">
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
                                    <textarea name="formsDescription" id="formsDescription" cols="5" rows="3" class="form-control form-control-sm rounded-0" placeholder="Enter Description" value="{{ old('description') }}"></textarea>
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
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <input type="submit" name="btnFormSubmit" value="Submit" class="btn btn-info btn-flat text-white">
                            <a href="{{ url('forms') }}" id="btnFormCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style type="text/css">
        ::-webkit-input-placeholder { opacity: 1; -webkit-transition: opacity .5s; transition: opacity .5s; }  /* Chrome <=56, Safari < 10 */
        :-moz-placeholder { opacity: 1; -moz-transition: opacity .5s; transition: opacity .5s; } /* FF 4-18 */
        ::-moz-placeholder { opacity: 1; -moz-transition: opacity .5s; transition: opacity .5s; } /* FF 19-51 */
        :-ms-input-placeholder { opacity: 1; -ms-transition: opacity .5s; transition: opacity .5s; } /* IE 10+ */
        ::placeholder { opacity: 1; transition: opacity .5s; } /* Modern Browsers */
            
        *:focus::-webkit-input-placeholder { opacity: 0; } /* Chrome <=56, Safari < 10 */
        *:focus:-moz-placeholder { opacity: 0; } /* FF 4-18 */
        *:focus::-moz-placeholder { opacity: 0; } /* FF 19-50 */
        *:focus:-ms-input-placeholder { opacity: 0; } /* IE 10+ */
        *:focus::placeholder { opacity: 0; } /* Modern Browsers */
    </style>
@stop

@section('js')
    <script type="text/javascript">
        
    </script>
@stop