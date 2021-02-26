@extends('adminlte::page')

@section('title', 'Form Item')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Form Item</h1>
            <a href="/formitem/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add New Item</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Form Item</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="col-12">
        <div class="card rounded-0">
            <div class="card-body">
                <table class="table table-hover table-sm table-bordered mt-5" id="formItemListView">
                    <thead>
                        <tr>
                            <th class="bg-info">Form Title</th>
                            <th class="bg-info">Section Title</th>
                            <th class="bg-info">Form Item</th>
                            <th class="bg-info">Point</th>
                            <th class="bg-info">Comment</th>
                            <th class="bg-info">Picture 1</th>
                            <th class="bg-info">Picture 2</th>
                            <th class="bg-info">Status</th>
                            <th class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formitems as $formitem)
                            <tr>
                                <td>{{ App\Models\Forms::where(['id'=>$formitem->formSectionId->id])->first()->title }}</td>
                                <td>{{ $formitem->formSectionId->section_title }}</td>
                                <td>{{ $formitem->title }}</td>
                                <td>{{ $formitem->points }}</td>
                                <td>
                                    @if($formitem->is_comment == 1)
                                        <span class="text-success font-weight-bold">YES</span>
                                    @elseif($formitem->is_comment == 0)
                                        <span class="text-warning font-weight-bold">NO</span>
                                    @endif
                                </td>
                                <td>
                                    @if($formitem->is_picture_1 == 1)
                                        <span class="text-success font-weight-bold">YES</span>
                                    @elseif($formitem->is_picture_1 == 0)
                                        <span class="text-warning font-weight-bold">NO</span>
                                    @endif
                                </td>
                                <td>
                                    @if($formitem->is_picture_2 == 1)
                                        <span class="text-success font-weight-bold">YES</span>
                                    @elseif($formitem->is_picture_2 == 0)
                                        <span class="text-warning font-weight-bold">NO</span>
                                    @endif
                                </td>
                                <td>
                                    @if($formitem->is_active == 1)
                                        <span class="btn btn-success btn-sm rounded-0">Active</span>
                                    @elseif($formitem->is_active == 0)
                                        <span class="btn btn-warning btn-sm rounded-0">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/formitem/{{ $formitem->id }}/edit" class="btn btn-primary btn-sm rounded-0">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger rounded-0" onclick="deletedData({{ $formitem->id }});">Delete</button>
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
            $('#formItemListView').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: 8 }
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
                        url: "/formitem/"+id,
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
                                        window.location = "{{ url('formitem') }}"
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