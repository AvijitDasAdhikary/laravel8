@extends('adminlte::page')

@section('title', 'Form Section')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Form Section</h1>
            <a href="/formsection/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add New Section</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Form Section</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="col-12">
        <div class="card card-info card-outline rounded-0">
            <div class="card-body">
                <table class="table table-hover table-sm table-bordered mt-5" id="formSectionListView">
                    <thead>
                        <tr>
                            <th class="bg-info">Form Title</th>
                            <th class="bg-info">Section Title</th>
                            <th class="bg-info">Parent ID</th>
                            <th class="bg-info">Status</th>
                            <th class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($formsections as $formsection)
                        <tr>
                            <td>{{ $formsection->formId->title }}</td>
                            <td>{{ $formsection->section_title }}</td>
                            <td>{{ $formsection->parent_id }}</td>
                            <td>
                                @if($formsection->is_active == 1)
                                    <span class="btn btn-success btn-sm rounded-0">Active</span>
                                @elseif($formsection->is_active == 0)
                                    <span class="btn btn-warning btn-sm rounded-0">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="/formsection/{{ $formsection->id }}/edit" class="btn btn-primary btn-sm rounded-0">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger rounded-0" onclick="deletedData({{ $formsection->id }});">Delete</button>
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){
            $('#formSectionListView').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: 4 }
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
                        url: "/formsection/"+id,
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
                                        window.location = "{{ url('formsection') }}"
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