@extends('admin.layouts.employee.master')

@section('content')
  <!-- Page Heading -->

           <div class="container-fluid">

                    <!-- Page Heading -->
                 

                            

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                  <div class=" float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department">
                            <i class="fa fa-plus"></i> Add Department</a>
                    </div>
                        </div>
                     
                      {!! Toastr::message() !!}
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped custom-table mb-0 datatable" 
                                 id="datatable">
                            <thead>
                                <tr>
                                    <th  hidden class=""></th>
                                    <th style="width:auto">#</th>
                                    <th >Department Name</th>
                                    <th >descraption</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $key=>$items )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td hidden class="id">{{ $items->id }}</td>
                                   
                                    <td class="department">{{ $items->name }}</td>

                                    <td class="description">{{ $items->description }}</td>
                                    <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle"
                                             data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item  edit_department" 
                                            href="#" data-toggle="modal" data-target="#edit_department"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item delete_department" 
                                            href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            </div>
                        </div>
                    </div>

                </div> 

                <div id="add_department" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('saveRecordDepartment') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Department Name <span class="text-danger">*</span></label>
                                <input class="form-control @error('department') is-invalid @enderror" type="text" id="department" name="name">
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <div class="form-group">
                                <label>description<span class="text-danger">*</span></label>
                                <input class="form-control @error('description') is-invalid @enderror"
                                 type="text" id="descraption" name="description">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Department Modal -->
                 <!-- Edit Department Modal -->
        <div id="edit_department" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateRecordDepartment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="e_id" value="">
                            <div class="form-group">
                                <label>Department Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="department_edit" name="department" value="" placeholder="{{ $items->name }}">
                            </div>
                             <div class="form-group">
                                <label>description <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="department_desc" name="description" value="">
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Department Modal -->
              <!-- Delete Department Modal -->
        <div class="modal custom-modal fade" id="delete_department" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Department</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('deleteRecordDepartment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" class="e_id" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary continue-btn submit-btn">Delete</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

@section('js')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>
<script>
        $(document).on('click','.edit_department',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#department_edit').val(_this.find('.department').text());
            $('#department_desc').val(_this.find('.description').text());
        });
    </script>
    {{-- delete model --}}
    <script>
        $(document).on('click','.delete_department',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>
    
@endsection

@endsection