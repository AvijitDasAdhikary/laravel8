@extends('adminlte::page')

@section('title', 'Form Codes')

@section('content_header')
    {{-- <h1>Form Codes</h1> --}}
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

@section('content')
    <div class="col-12">
        <div class="card rounded-0">
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover mt-5" id="formCodeListView">
                    <thead>
                        <tr>
                            <th class="bg-info">Department</th>
                            <th class="bg-info">Form Code</th>
                            <th class="bg-info">Description</th>
                            <th class="bg-info">Status</th>
                            <th class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formcodes as $formcode)
                            <tr>
                                <td>{{ $formcode->departmentId->name }}</td>
                                <td>{{ $formcode->form_code }}</td>
                                <td>{{ $formcode->description }}</td>
                                <td>
                                    @if($formcode->is_active == 1)
                                        <span class="btn btn-success btn-sm rounded-0">Active</span>
                                    @elseif($formcode->is_active == 0)
                                        <span class="btn btn-warning btn-sm rounded-0">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/formcodes/{{ $formcode->id }}/edit" class="btn btn-sm btn-primary rounded-0">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger rounded-0" onclick="deletedData({{ $formcode->id }});">Delete</button>
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

        $(function () {
            $('#formCodeListView').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: 4 },
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
                        url: "/formcodes/"+id,
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
                                        window.location = "{{ url('formcodes') }}"
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