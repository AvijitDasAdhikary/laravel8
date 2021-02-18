@extends('adminlte::page')

@section('title', 'Forms')

@section('content_header')
    {{-- <h1>Forms</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Forms</h1>
            <a href="/forms/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add New Form</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Forms</li>
            </ol>
        </div>
    </div>
@stop