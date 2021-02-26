@extends('adminlte::page')

@section('title', 'Form Item')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Create Form Item</h1>
            <a href="/formitem" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Back To View</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('formitem') }}" class="text-info">Form Item</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/formitem" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formTitle" class="text-sm">Form Title</label>
                                    <select name="formTitle" id="formTitle" class="form-control form-control-sm rounded-0" onChange="getFormTitle(this.value)" required>
                                        <option value="">Select Form</option>
                                        @foreach($forms as $form)
                                            <option value="{{$form->id}}">{{$form->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('formTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sectionTitle" class="text-sm">Section Title</label>
                                    <select name="sectionTitle" id="sectionTitle" class="form-control form-control-sm rounded-0">
                                        <option value="">Select Section</option>
                                    </select>
                                    @error('sectionTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemTitle" class="text-sm">Form Item Title</label>
                                    <input type="text" name="formItemTitle" id="formItemTitle" class="form-control form-control-sm rounded-0" placeholder="Enter Item Title">
                                    @error('formItemTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemPoint" class="text-sm">Point</label>
                                    <input type="number" name="formItemPoint" id="formItemPoint" class="form-control form-control-sm rounded-0" placeholder="Enter Point">
                                    @error('formItemPoint')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemComment" class="text-sm">Is Comment</label>
                                    <select name="formItemComment" id="formItemComment" class="form-control form-control-sm rounded-0">
                                        <option value="1" selected>YES</option>
                                        <option value="0">NO</option>
                                    </select>
                                    @error('formItemComment')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemPicture1" class="text-sm">Is Picture 1</label>
                                    <select name="formItemPicture1" id="formItemPicture1" class="form-control form-control-sm rounded-0">
                                        <option value="1" selected>YES</option>
                                        <option value="0">NO</option>
                                    </select>
                                    @error('formItemPicture1')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemPicture2" class="text-sm">Is Picture 2</label>
                                    <select name="formItemPicture2" id="formItemPicture2" class="form-control form-control-sm rounded-0">
                                        <option value="1" selected>YES</option>
                                        <option value="0">NO</option>
                                    </select>
                                    @error('formItemPicture2')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemStatus" class="text-sm">Status</label>
                                    <select name="formItemStatus" id="formItemStatus" class="form-control form-control-sm rounded-0">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <input type="submit" name="btnFormItemSubmit" value="Submit" class="btn btn-info btn-flat text-white">
                            <a href="{{ url('formitem') }}" id="btnFormItemCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
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
    <script>
        function getFormTitle(formId){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#sectionTitle").html(" ");
            $.ajax({
                url: "{{url('formitem/create')}}/"+formId,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(response){
                    var option = '<option value="">Select Form</option>';
                    response.map(function(el){
                        option +='<option value="'+el.id+'">'+el.title+'</option>';
                    })
                    $("#sectionTitle").append(option);
                }
            })
        }
    </script>
@stop