@extends('adminlte::page')

@section('title', 'Form Item')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Edit Form Item</h1>
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
                <form action="/formitem/{{ $id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sectionTitle" class="text-sm">Section Title</label>
                                    <select name="sectionTitle" id="sectionTitle" class="form-control form-control-sm rounded-0">
                                        <option value="">Select Section</option>
                                        @foreach($formsections as $formsection)
                                            <option value="{{$formsection->id}}" {{ $formitems->section_id == $formsection->id ? 'selected' : '' }}>
                                            {{$formsection->section_title}}</option>
                                        @endforeach
                                    </select>
                                    @error('sectionTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemTitle" class="text-sm">Form Item Title</label>
                                    <input type="text" name="formItemTitle" id="formItemTitle" class="form-control form-control-sm rounded-0" value="{{ $formitems->title }}">
                                    @error('formItemTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemPoint" class="text-sm">Point</label>
                                    <input type="number" name="formItemPoint" id="formItemPoint" class="form-control form-control-sm rounded-0" value="{{ $formitems->points }}">
                                    @error('formItemPoint')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemComment" class="text-sm">Is Comment</label>
                                    <select name="formItemComment" id="formItemComment" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($formitems->is_comment == 1) {{ 'selected' }} @endif>YES</option>
                                        <option value="0" @if($formitems->is_comment == 0) {{ 'selected' }} @endif>NO</option>
                                    </select>
                                    @error('formItemComment')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemPicture1" class="text-sm">Is Picture 1</label>
                                    <select name="formItemPicture1" id="formItemPicture1" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($formitems->is_picture_1 == 1) {{ 'selected' }} @endif>YES</option>
                                        <option value="0" @if($formitems->is_picture_1 == 0) {{ 'selected' }} @endif>NO</option>
                                    </select>
                                    @error('formItemPicture1')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemPicture2" class="text-sm">Is Picture 2</label>
                                    <select name="formItemPicture2" id="formItemPicture2" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($formitems->is_picture_2 == 1) {{ 'selected' }} @endif>YES</option>
                                        <option value="0" @if($formitems->is_picture_2 == 0) {{ 'selected' }} @endif>NO</option>
                                    </select>
                                    @error('formItemPicture2')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formItemStatus" class="text-sm">Status</label>
                                    <select name="formItemStatus" id="formItemStatus" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($formitems->is_active == 1) {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if($formitems->is_active == 0) {{ 'selected' }} @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <button type="submit" name="btnFormSectionUpdate" class="btn btn-info btn-flat text-white">Update</button>
                            <a href="{{ url('formitem') }}" id="btnFormSectionCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop