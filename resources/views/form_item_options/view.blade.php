@extends('adminlte::page')

@section('title', 'Form Item Option')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Form Item Option</h1>
            <a href="/formitemoptions/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add New Item Option</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Form Item Option</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="col-12">
        <div class="card card-info card-outline rounded-0">
            <div class="card-body">
                <table class="table table-hover table-sm table-bordered mt-5" id="formItemOptionListView">
                    <thead>
                        <tr>
                            <th class="bg-info">Item</th>
                            <th class="bg-info">Option</th>
                            <th class="bg-info">Status</th>
                            <th class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formitemoptions as $formitemoption)
                            <tr>
                                <td>{{ $formitemoption->ItemId->title }}</td>
                                <td>
                                    <span class="btn btn-{{strToLower($formitemoption->OptionId->color_class)}} btn-sm btn-flat rounded-0">{{ $formitemoption->OptionId['label'] }}</span>
                                </td>
                                <td>
                                    @if($formitemoption->is_active == 1)
                                        <span class="btn btn-success btn-sm rounded-0">Active</span>
                                    @elseif($formitemoption->is_active == 0)
                                        <span class="btn btn-warning btn-sm rounded-0">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/formitemoptions/{{ $formitemoption->id }}/edit" class="btn btn-primary btn-sm rounded-0">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger rounded-0" onclick="deletedData({{ $formitemoption->id }});">Delete</button>
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
            $('#formItemOptionListView').DataTable({
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
                        url: "/formitemoptions/"+id,
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
                                        window.location = "{{ url('formitemoptions') }}"
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