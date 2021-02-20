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
                <form action="/formitem" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sectionTitle" class="text-sm">Section Title</label>
                                    <input type="text" name="sectionTitle" id="sectionTitle" class="form-control form-control-sm rounded-0" placeholder="Enter Section Title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formItemTitle" class="text-sm">Form Item Title</label>
                                    <input type="text" name="formItemTitle" id="formItemTitle" class="form-control form-control-sm rounded-0" placeholder="Enter Item Title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="formItemPoint" class="text-sm">Point</label>
                                    <input type="number" name="formItemPoint" id="formItemPoint" class="form-control form-control-sm rounded-0" placeholder="Enter Point">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop