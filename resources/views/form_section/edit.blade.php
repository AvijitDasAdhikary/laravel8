@extends('adminlte::page')

@section('title', 'Form Section')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Edit Form Section</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('formsection') }}" class="text-info">Form Section</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary rounded-0">
                <form action="/formsection/{{ $id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="formTitle" class="text-sm">Form Title</label>
                                    <select name="formTitle" id="formTitle" class="form-control form-control-sm rounded-0">
                                        <option value="">Select Form</option>
                                        @foreach($forms as $form)
                                            <option value="{{$form->id}}" {{ $formsections->form_id == $form->id ? 'selected' : '' }}>
                                            {{$form->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('formTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sectionTitle" class="text-sm">Section Title</label>
                                    <input type="text" name="sectionTitle" id="sectionTitle" value="{{ $formsections->section_title }}" class="form-control form-control-sm rounded-0">
                                    @error('sectionTitle')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="parentID" class="text-sm">parent ID</label>
                                    <input type="number" name="parentID" id="parentID" value="{{ $formsections->parent_id }}" class="form-control form-control-sm rounded-0">
                                    @error('parentID')
                                        <div class="alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sectionStatus" class="text-sm">Status</label>
                                    <select name="sectionStatus" id="sectionStatus" class="form-control form-control-sm rounded-0">
                                        <option value="1" @if($formsections->is_active == 1) {{ 'selected' }} @endif>Active</option>
                                        <option value="0" @if($formsections->is_active == 0) {{ 'selected' }} @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-n4">
                        <div class="form-group">
                            <button type="submit" name="btnFormSectionUpdate" class="btn btn-info btn-flat text-white">Update</button>
                            <a href="{{ url('formsection') }}" id="btnFormSectionCancel" class="btn btn-primary btn-flat text-white">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop