@extends('adminlte::page')

@section('content_header')
    {{-- <h1>Create Todo</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Create Todo</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('todos') }}" class="text-info">Todo</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/todos" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="todoName">Name</label>
                                    <input type="text" name="todoName" id="todoName"placeholder="Enter Todo Name" class="form-control rounded-0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="inputImage">Image</label>
                                <div class="input-group input-group-sm">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control-sm" name="inputImage" id="inputImage" onchange="setPreview(this,'close_1');">
                                        <label class="custom-file-label" for="inputImage">Choose Image</label>
                                    </div>
                                    <div class="img-wrap" >
                                        <span class="img-close" id="close_1" onClick="removeImage(1)">&times;</span>
                                    </div>
                                    <img id="preview_1" src="{{ asset('dist/img/preview.png') }}" height="48px" width="48px" alt="No Image" style="margin-top: -8px;" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="todoStatus">Status</label>
                                    <select name="todoStatus" id="todoStatus" class="form-control rounded-0">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-bold rounded-0 p-2 d-none" id="addTodoProcessMsgBox">
                                <div class="alert alert-dismissable alert-info">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Processing ...</strong>
                                </div>
                            </div>
                            <div class="col-md-6 text-bold rounded-0 p-2 d-none" id="addTodoSuccessMsgBox">
                                <div class="alert alert-dismissable alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Todo Added Successfully.</strong>
                                </div>
                            </div>
                            <div class="col-md-6 text-bold rounded-0 p-2 d-none" id="addTodoErrorMsgBox">
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
                            <!-- <input type="submit" name="todoSubmit" class="btn btn-m btn-primary rounded-0"> -->
                            <button type="submit" id="btntodoSubmit" class="btn btn-info btn-flat text-white">Submit</button>
                            <a href="{{ url('todos') }}" id="btntodoCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btntodoSubmit').click(function (e) {
                e.preventDefault();
                var todoName = $('#todoName').val();
                if(todoName == ''){
                    alert('Please select TodoName');
                    $('#todoName').focus();
                    return false;
                }
                var todoStatus = $('#todoStatus').val();
                let inputImage = $('#inputImage').prop('files')[0];
                var formData = new FormData();
                formData.append('todoName', todoName);
                formData.append('todoStatus', todoStatus);
                formData.append('inputImage', inputImage);
                $.ajax({
                    url: "{{ url('/todos') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#addTodoProcessMsgBox').removeClass("d-none");
                        $('#addTodoErrorMsgBox').addClass("d-none");
                    },
                    success: function (response) {
                        console.log(response);
                        $('#addTodoProcessMsgBox').addClass("d-none");
                        $('#addTodoErrorMsgBox').addClass("d-none");
                        $('#addTodoSuccessMsgBox').removeClass("d-none");
                        var delay = 1500;
                        setTimeout(function(){ window.location = '{!! url('/todos') !!}'; }, delay);
                    },
                    error: function (response) {
                        console.log(response);
                        $('#addTodoProcessMsgBox').addClass("d-none");
                        $('#addTodoSuccessMsgBox').addClass("d-none");
                        $('#addTodoErrorMsgBox').removeClass("d-none");
                    }
                });
            });
        });
    </script>
    <script>
        function setPreview(element){
            if (element.files && element.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(element).closest('div.form-group').find('img').attr('src', e.target.result).width(48).height(48);
                };
                reader.readAsDataURL(element.files[0]);
            }
        }

        function removeImage(id){
            console.log(id)
            $('#preview_'+id).attr('src','../../../dist/img/preview.png');
            $('#close1_'+id).css({'display':'none'});
            $('#image2'+id).val("");
        }

        $('.img-wrap .close').on('click', function() {
            var id = $(this).closest('.img-wrap').find('img').data('id');
            alert('remove picture: ' + id);
        });
    </script>
@stop

