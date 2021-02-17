@extends('adminlte::page')

@section('title', 'Master Form Options')

@section('content_header')
    {{-- <h1>Master Form Options</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Master Form Options</h1>
            <a href="/masterformoptions/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add New Option</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Master Form Options</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="col-12">
        <div class="card rounded-0">
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover mt-5" id="masterformoptionListView">
                    <thead>
                        <tr>
                            <th class="bg-info">Label</th>
                            <th class="bg-info">Status</th>
                            <th class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($masterformoptions as $masterformoption)
                            <tr>
                                <td>
                                    @php
                                        if($masterformoption->label == 'YES')
                                            $btnClass = "success";
                                        elseif($masterformoption->label == 'NO')
                                            $btnClass = "danger";
                                        elseif($masterformoption->label == 'OUT')
                                            $btnClass = "danger";
                                        elseif($masterformoption->label == 'IN')
                                            $btnClass = "success";
                                        elseif($masterformoption->label == 'COS')
                                            $btnClass = "warning";
                                        elseif($masterformoption->label == 'R')
                                            $btnClass = "secondary";
                                        elseif($masterformoption->label == 'DEF')
                                            $btnClass = "info";
                                    @endphp
                                    <span class="btn btn-{{$btnClass}} btn-sm btn-flat rounded-0">{{$masterformoption->label}}</span>
                                </td>
                                <td>
                                    @if($masterformoption->is_active == 1)
                                        <span class="btn btn-success btn-sm 
                                        rounded-0">Active</span>
                                    @elseif($masterformoption->is_active == 0)
                                        <span class="btn btn-warning btn-sm rounded-0">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/masterformoptions/{{ $masterformoption->id }}/edit" class="btn btn-sm btn-primary rounded-0">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger rounded-0" onclick="deletedData({{ $masterformoption->id }});">Delete</button>
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
            $('#masterformoptionListView').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: 2 }
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
                        url: "/masterformoptions/"+id,
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
                                        window.location = "{{ url('masterformoptions') }}"
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
