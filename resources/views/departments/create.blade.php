@extends('adminlte::page')

@section('content_header')
    {{-- <h1>Create Department</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Create Department</h1>
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentName">Name</label>
                                    <input type="text" name="departmentName" id="departmentName"placeholder="Enter Department Name" class="form-control rounded-0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentAlias">Alias</label>
                                    <input type="text" name="departmentAlias" id="departmentAlias"placeholder="Enter Alias" class="form-control rounded-0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentDescription">Description</label>
                                    <input type="text" name="departmentDescription" id="departmentDescription"placeholder="Enter Description" class="form-control rounded-0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departmentStatus">Status</label>
                                    <select name="departmentStatus" id="departmentStatus" class="form-control rounded-0">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
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
                                    <strong>Department Added Successfully.</strong>
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
                            <button type="submit" id="btndepartmentSubmit" class="btn btn-info btn-flat text-white">Submit</button>
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
            $('#btndepartmentSubmit').click(function (e) {
                e.preventDefault();
                var departmentName = $('#departmentName').val();
                if(departmentName == ''){
                    alert('Please select Department Name');
                    $('#departmentName').focus();
                    return false;
                }
                var departmentAlias = $('#departmentAlias').val();
                if(departmentAlias == ''){
                    alert('Please select Alias');
                    $('#departmentAlias').focus();
                    return false;
                }
                var departmentDescription = $('#departmentDescription').val();
                if(departmentDescription == ''){
                    alert('Please select Description');
                    $('#departmentDescription').focus();
                    return false;
                }
                var departmentStatus = $('#departmentStatus').val();
                var formData = new FormData();
                formData.append('departmentName', departmentName);
                formData.append('departmentAlias', departmentAlias);
                formData.append('departmentDescription', departmentDescription);
                formData.append('departmentStatus', departmentStatus);
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
        });
    </script>
@stop

