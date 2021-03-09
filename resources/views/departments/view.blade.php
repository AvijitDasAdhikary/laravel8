@extends('adminlte::page')

@section('title', 'Departments')

@section('content_header')
    {{-- <h1>Departments</h1> --}}
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="d-inline">Departments</h1>
            <a href="/departments/create" class="btn btn-info btn-sm btn-flat d-inline-block ml-2 mt-n2 elevation-2 text-white">Add New Department</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('developer') }}" class="text-info">Home</a></li>
                <li class="breadcrumb-item active">Departments</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="col-12">
        <div class="card card-info card-outline rounded-0">
            <div class="card-body">
                <table class="table table-sm table-bordered table-striped" id="departmentListView">
                    <thead>
                        <tr>
                            <th class="bg-info">Name</th>
                            <th class="bg-info">Alias</th>
                            <th class="bg-info">Description</th>
                            <th class="bg-info">Status</th>
                            <th class="bg-info">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->alias }}</td>
                                <td>{{ $department->description }}</td>
                                <td>
                                    @if($department->is_active == 1)
                                        <span class="btn btn-success btn-sm rounded-0">Active</span>
                                    @elseif($department->is_active == 0)
                                        <span class="btn btn-warning btn-sm rounded-0">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/departments/{{ $department->id }}/edit" class="btn btn-sm btn-primary rounded-0">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger rounded-0" onclick="deletedData({{ $department->id }});">Delete</button>
                                    <button type="button" class="btn btn-sm btn-warning rounded-0" onclick="previewDepartmentData({{ $department->id }});">Preview</button>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Department Preview Modal Starts -->
        <div class="modal fade" id="departmentPreview">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header" style="background-color: goldenrod; height: 60px;">
                        <h4 class="modal-title">Department Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="departmentName">Name</label>
                                        <input type="text" name="departmentName" id="departmentName" class="form-control rounded-0" readonly="readonly" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="departmentAlias">Alias</label>
                                        <input type="text" name="departmentAlias" class="form-control rounded-0" id="departmentAlias" readonly="readonly" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="departmentDescription">Description</label>
                                        <textarea name="departmentDescription" id="departmentDescription" cols="5" rows="3" class="form-control rounded-0" readonly="readonly" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-m btn-flat rounded-0" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Department Preview Modal Ends -->
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
            $('#departmentListView').DataTable({
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
                        url: "/departments/"+id,
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
                                        window.location = "{{ url('departments') }}"
                                    }
                                })
                            }
                        }
                    });
                }
            });
        }

        function previewDepartmentData(id){

            let formData = new FormData();
            formData.append('id', id);
            $.ajax({
                url: "/departments/"+id,
                type: "GET",
                data: formData,
                contentType: false,
                processData: false,
                dataType:'json',
                success: function (response) {
                    if(response.success){
                        // let name = (response.departments.name == null) ? '' : response.departments.name;
                        // let alias = (response.departments.alias == null) ? '' : response.departments.alias;
                        let description = (response.departments.description == null) ? '' : response.departments.description;
                        $('#departmentName').val(''+response.departments.name);
                        $('#departmentAlias').val(''+response.departments.alias);
                        $('#departmentDescription').val(''+description);
                    }
                },
            });
			$('#departmentPreview').modal('show');
		}
    </script>
@stop