@extends('adminlte::page')

@section('title', 'Todo')

@section('content_header')
    {{-- <h1>Todo Lists</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Todo Lists</h1>
            <a href="todos/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add Todo</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Todo</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="col-12">
        <div class="card rounded-0">
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover" id="todoList">
                    <thead>
                        <tr>
                            <th class="bg-info">Name</th>
                            <th class="bg-info">Status</th>
                            <th class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todos as $todo)
                            <tr>
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
                                    <button type="button" class="btn btn-sm btn-danger rounded-0" onclick="deletedData({{ $todo->id }});">Delete</button>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop


@section('css')

@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        $('#todoList').DataTable({
            responsive: true,
            columnDefs: [
                { orderable: false, targets: 2 },
            ]
        });
    });

    function deletedData(id){
        swal.fire({
            title: "Are you sure?",
            text: "Deleted data can't undone!!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: "Yes, I'm sure!",
            cancelButtonText: "No, I'm not sure!",
            confirmButtonColor: '#00802b',
            cancelButtonColor: '#cc3300'
        }).then((willDelete) => {
            if (willDelete.value) {
                $.ajax({
                    url: "/todos/"+id,
                    type: "DELETE",
                    success: function(response){
                        console.log(response)
                        if(response.success == true){
                            swal.fire({
                                icon: "success",
                                title: "Deleted Done!!",
                                type: 'success'
                            }).then((willDelete) => {
                                if(willDelete.value){
                                    window.location = "{{ url('todos') }}"
                                }
                            })
                        }
                    }
                });
            }
        });
    }
</script>
@stop