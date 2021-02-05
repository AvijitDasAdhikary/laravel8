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
                <!-- <div class="container mt-0"> -->
                    <!-- <h4>Select Number of Rows</h4>
                    <div class="form-group">
                        <select name="maxRows" id="maxRows" class="form-control"  style="width:150px;">
                            <option value="">Show All</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                    </div> -->
                    <table class="table table-sm table-bordered table-hover mt-5" id="todoList">
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
                <!-- </div> -->
            </div>
            <!-- <div class="card-footer pagination-container"> -->
                <!-- <ul class="pagination float-right"> -->
                    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                <!-- </ul> -->
            <!-- </div> -->

            {{-- Pagination --}}
            <div class="card-footer">
                <ul class="pagination float-right">
                    {!! $todos->links() !!}
                </ul>
            </div>
        </div>
    </div>
@stop


@section('css')

@stop

<!-- @section('plugins.Datatables', true) -->
@section('plugins.Sweetalert2', true)

@section('js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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

    //var table = '#todoList'
    // $('#maxRows').on('change',function(){
    //     $('.pagination').html('')
    //     var trnum = 0
    //     var maxRows = parseInt($(this).val())
    //     var totalRows = $(table+' tbody tr').length
    //     $(table+' tr:gt(0)').each(function(){
    //         trnum++
    //         if(trnum > maxRows){
    //             $(this).hide()
    //         }
    //         if(trnum <= maxRows){
    //             $(this).show()
    //         }
    //     })
    //     if(totalRows > maxRows){
    //         var pagenum = Math.ceil(totalRows/maxRows)
    //         for(var i=1; i<=pagenum;){
    //             $('.pagination').append('<li class="page-item" data-page="'+i+'">\<span class="page-link">'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
    //         }
    //     }
    //     $('.pagination li:first-child').addClass('active')
    //     $('.pagination li').on('click',function(){
    //         var pagenum = $(this).attr('data-page')
    //         var trIndex = 0;
    //         $('.pagination li').removeClass('active')
    //         $(this).addClass('active')
    //         $(table+' tr:gt(0)').each(function(){
    //             trIndex++
    //             if(trIndex > (maxRows*pagenum) || trIndex <= ((maxRows*pagenum)-maxRows)){
    //                 $(this).hide()
    //             }else{
    //                 $(this).show()
    //             }
    //         })
    //     })
    // })


</script>
@stop