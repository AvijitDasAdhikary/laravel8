@extends('adminlte::page')

@section('title', 'Form Item Option')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Edit Form Item Option</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('formitemoptions') }}" class="text-info">Form Item Option</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/formitemoptions/{{ $id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formItemTitle" class="text-sm">Item</label>
                                    <select name="formItemTitle" id="formItemTitle" class="form-control form-control-sm rounded-0">
                                        <option value="">Select Item</option>
                                        @foreach($formitems as $formitem)
                                            <option value="{{$formitem->id}}" {{ $formitemoptions->item_id == $formitem->id ? 'selected' : '' }}>
                                            {{$formitem->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('formItemTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="masterFormLabel" class="text-sm">Option</label>
                                    <select name="masterFormLabel" id="masterFormLabel" class="form-control form-control-sm rounded-0">
                                        <option value="">Select Option</option>
                                        @foreach($masterformoptions as $masterformoption)
                                            <option value="{{$masterformoption->id}}" {{ $formitemoptions->option_id ==  $masterformoption->id ? 'selected' : '' }}>
                                            {{$masterformoption->label}}</option>
                                        @endforeach
                                    </select>
                                    @error('masterFormLabel')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formItemOptionStatus" class="text-sm">Status</label>
                                    <select name="formItemOptionStatus" id="formItemOptionStatus" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($formitemoptions->is_active == 1) {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if($formitemoptions->is_active == 0) {{ 'selected' }} @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <button type="submit" name="btnFormItemOptionUpdate" class="btn btn-info btn-flat text-white">Update</button>
                            <a href="{{ url('formitemoptions') }}" id="btnFormItemOptionCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop