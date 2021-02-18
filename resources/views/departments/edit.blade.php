@extends('adminlte::page')

@section('content_header')
    {{-- <h1>Edit Department</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Edit Department</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('departments') }} " class="text-info">Departments</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/departments/{{ $id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="todoName" class="text-sm">Name</label>
                                    <input type="text" name="departmentName" value="{{ $departments->name }}" class="form-control form-control-sm rounded-0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentAlias" class="text-sm">Alias</label>
                                    <input type="text" name="departmentAlias" id="departmentAlias" value="{{ $departments->alias }}" class="form-control form-control-sm rounded-0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentDescription" class="text-sm">Description</label>
                                    <input type="text" name="departmentDescription" id="departmentDescription" value="{{ $departments->description }}" class="form-control form-control-sm rounded-0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentStatus" class="text-sm">Status</label>
                                    <select name="departmentStatus" id="departmentStatus" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($departments->is_active == 1) {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if($departments->is_active == 0) {{ 'selected' }} @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-bold rounded-0 p-2 d-none" id="addDepartmentProcessMsgBox">
                                <div class="alert alert-dismissable alert-info">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Processing ...</strong>
                                </div>
                            </div>
                            <div class="col-md-6 text-bold rounded-0 p-2 d-none" id="addDepartmentSuccessMsgBox">
                                <div class="alert alert-dismissable alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Department Updated Successfully.</strong>
                                </div>
                            </div>
                            <div class="col-md-6 text-bold rounded-0 p-2 d-none" id="addDepartmentErrorMsgBox">
                                <div class="alert alert-dismissable alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Error Occurred. Try Again Later.</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <button type="submit" id="btndepartmentUpdate" class="btn btn-info btn-flat text-white">Update</button>
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
    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: "{{ url('/departments') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#addDepartmentProcessMsgBox').removeClass("d-none");
                    $('#addDepartmentErrorMsgBox').addClass("d-none");
                },
                success: function (response) {
                    console.log(response);
                    $('#addDepartmentProcessMsgBox').addClass("d-none");
                    $('#addDepartmentErrorMsgBox').addClass("d-none");
                    $('#addDepartmentSuccessMsgBox').removeClass("d-none");
                    var delay = 1500;
                    setTimeout(function(){ window.location = '{!! url('/departments') !!}'; }, delay);
                },
                error: function (response) {
                    console.log(response);
                    $('#addDepartmentProcessMsgBox').addClass("d-none");
                    $('#addDepartmentSuccessMsgBox').addClass("d-none");
                    $('#addDepartmentErrorMsgBox').removeClass("d-none");
                }
            }); 
        });
    </script>
@stop

