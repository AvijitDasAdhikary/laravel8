@extends('adminlte::page')

@section('title', 'Master Form Options')

@section('content_header')
    {{-- <h1>Edit Master Form Options</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Edit Master Form Options</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('masterformoptions') }} " class="text-info">Master Form Options</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/masterformoptions/{{ $id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="masterFormLabel" class="text-sm">Label</label>
                                    <input type="text" name="masterFormLabel" value="{{ $masterformoptions->label }}" class="form-control form-control-sm rounded-0">
                                    @error('masterFormLabel')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="inputColorCode" class="text-sm">Select Color</label>
                                    <input type="text" class="form-control form-control-sm text-sm rounded-0" name="inputColorCode" id="inputColorCode" value="{{ $masterformoptions->color_code }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="masterFormColorClass" class="text-sm">Color Class</label>
                                    <select name="masterFormColorClass" id="masterFormColorClass" class="form-control form-control-sm rounded-0" required>
                                        <option value="">Select Color Class</option>
                                        <option value="Primary" @if($masterformoptions->color_class == 'Primary') 
                                        {{ 'selected' }} @endif>Primary</option>
                                        <option value="Danger" @if($masterformoptions->color_class == 'Danger') 
                                        {{ 'selected' }} @endif>Danger</option>
                                        <option value="Success" @if($masterformoptions->color_class == 'Success') 
                                        {{ 'selected' }} @endif>Success</option>
                                        <option value="Warning" @if($masterformoptions->color_class == 'Warning') 
                                        {{ 'selected' }} @endif>Warning</option>
                                        <option value="Info" @if($masterformoptions->color_class == 'Info') 
                                        {{ 'selected' }} @endif>Info</option>
                                        <option value="Secondary" @if($masterformoptions->color_class == 'Secondary') 
                                        {{ 'selected' }} @endif>Secondary</option>
                                        <option value="Dark" @if($masterformoptions->color_class == 'Dark') 
                                        {{ 'selected' }} @endif>Dark</option>
                                        <option value="Light" @if($masterformoptions->color_class == 'Light') 
                                        {{ 'selected' }} @endif>Light</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="masterFormStatus" class="text-sm">Status</label>
                                    <select name="masterFormStatus" id="masterFormStatus" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($masterformoptions->is_active == 1) {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if($masterformoptions->is_active == 0) {{ 'selected' }} @endif>Inactive</option>
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
                            <button type="submit" id="btnmasterFormUpdate" class="btn btn-info btn-flat text-white">Update</button>
                            <a href="{{ url('masterformoptions') }}" id="btnmasterFormCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
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
        $(function () {
            $('#inputColorCode').colorpicker({
                format: 'hex',
                extensions: [
                    {
                        name: 'swatches',
                        options: {
                            colors: {
                                'black': '#000000',
                                'red': '#FF1744',
                                'teal': '#00BFA5',
                                'yellow': '#EEFF41',
                                'purple': '#AA00FF',
                                'green': '#00C853',
                                'pink': '#FF4081',
                                'gray': '#9E9E9E',
                                'blue': '#0D47A1',
                                'white': '#ffffff',
                                'orange': '#FF5722',
                                'brown': '#6D4C41',
                                'violet': '#673AB7'
                            },
                            namesAsValues: false
                        }
                    }
                ]
            }).on('colorpickerChange colorpickerCreate', function(e){
                var code = e.color.toString('hex');
                $('#inputColorCode').css({'background-color': code,'color': 'transparent'});
            })
        });
    </script>
@stop

