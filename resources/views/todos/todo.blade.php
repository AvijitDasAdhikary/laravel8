@extends('adminlte::page')

@section('content_header')
    <h1>Todo Lists</h1>
@stop

@section('content')
    <table class="table table-sm table-bordered table-hover">
        <thead>
            <tr>
                <th># ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->id }}</td>
                    <td>{{ $todo->name }}</td>
                    <td>
                        @if($todo->status == 1)
                            <span class="btn btn-success btn-sm rounded-0">Active</span>
                        @elseif($todo->status == 0)
                            <span class="btn btn-warning btn-sm rounded-0">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="/todos/{{ $todo->id }}/edit" class="btn btn-sm btn-primary rounded-0">Edit</a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@stop