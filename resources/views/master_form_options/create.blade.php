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
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="masterFormLabel" class="text-sm">Label</label>
                                    <input type="text" name="masterFormLabel" id="masterFormLabel" placeholder="Enter Label" class=" form-control form-control-sm rounded-0" value="{{ old('label') }}">
                                    @error('masterFormLabel')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="inputColorCode" class="text-sm">Select Color</label>
                                    <input type="text" class="form-control form-control-sm text-sm rounded-0" name="inputColorCode" id="inputColorCode" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="masterFormColorClass" class="text-sm">Color Class</label>
                                    <select name="masterFormColorClass" id="masterFormColorClass"   class="form-control form-control-sm rounded-0">
                                        <option value="">Select Color Class</option>
                                        <option value="1">Primary</option>
                                        <option value="2">Secondary</option>
                                        <option value="3">Success</option>
                                        <option value="4">Danger</option>
                                        <option value="5">Warning</option>
                                        <option value="6">Info</option>
                                        <option value="7">Dark</option>
                                        <option value="8">Light</option>
                                    </select>
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