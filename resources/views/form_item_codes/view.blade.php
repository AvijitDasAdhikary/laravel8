@extends('adminlte::page')

@section('title', 'Form Item Code')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Form Item Code</h1>
            <a href="/formitemcodes/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add New Item Code</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Form Item Code</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="col-12">
        <div class="card card-info card-outline rounded-0">
            <div class="card-body">
                <table class="table table-hover table-sm table-bordered mt-5" id="formItemCodeListView">
                    <thead>
                        <tr>
                            <th class="bg-info">Item</th>
                            <th class="bg-info">Code</th>
                            <th class="bg-info">Status</th>
                            <th class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formitemcodes as $formitemcode)
                            <tr>
                                <td>
                                    <span class="text-secondary font-weight-bold">
                                        {{ $formitemcode->formItemId->title }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-success font-weight-bold">
                                        {{ $formitemcode->formCodeId->form_code }}
                                    </span>
                                </td>
                                <td>
                                    @if($formitemcode->is_active == 1)
                                        <span class="btn btn-success btn-sm rounded-0">Active</span>
                                    @elseif($formitemcode->is_active == 0)
                                        <span class="btn btn-warning btn-sm rounded-0">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/formitemcodes/{{ $formitemcode->id }}/edit" class="btn btn-primary btn-sm rounded-0">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger rounded-0" onclick="deletedData({{ $formitemcode->id }});">Delete</button>
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
            $('#formItemCodeListView').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: 3 }
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
                        url: "/formitemcodes/"+id,
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
                                        window.location = "{{ url('formitemcodes') }}"
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