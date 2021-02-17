@extends('adminlte::page')

@section('title', 'Form Codes')

@section('content_header')
    {{-- <h1>Departments</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Form Codes</h1>
            <a href="/formcodes/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add New Code</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Form Codes</li>
            </ol>
        </div>
    </div>
@stop