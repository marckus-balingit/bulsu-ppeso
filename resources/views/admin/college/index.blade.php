@extends('layouts.admin')

@section('title', config('app.company_name').' - College')

@section('content_header')
{{-- <h1>Users</h1> --}}
@stop

@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a> System Setup</a></li>
        <li class="breadcrumb-item">College</li>
    </ol>
</div>
@endsection
  
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline">
                <div class="card-header">
                    <h3 class="card-title">College</h3>
                </div>
                
                <div class="card-body">
                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add New College</button>
                    <div class="btn-group float-right mr-1" role="group">
                        <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-import"></i> Bulk Upload</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                          <a class="dropdown-item" href="{{ asset('templates/College Template (Bulk Upload).xlsx') }}">Download Template</a>                          
                          <button class="dropdown-item" data-toggle="modal" data-target="#modal-upload">Import Template</button>
                        </div>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{-- <th>Logo</th> --}}
                                    <th>Name</th>
                                    <th>Abbreviation</th>
                                    <th>Courses</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colleges as $college)
                                    <tr>
                                        {{-- <td></td> --}}
                                        <td>{{ $college->name }}</td>
                                        <td>{{ $college->abbreviate() }}</td>
                                        <td>
                                            <ul>
                                                @forelse ($college->course as $course)
                                                    <li>{{ $course->name }}</li>
                                                @empty
                                                    <li>No Courses</li>
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td>{{ $college->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('college.show',$college->id) }}" class="btn btn-outline-primary btn-sm" ><i class="fa fa-book"></i></a>
                                            <button class="btn btn-outline-success btn-sm btnEdit"
                                                data-id ="{{ $college->id}}"
                                                data-abbreviation ="{{ $college->abbreviation}}"
                                                data-name ="{{ $college->name}}"
                                            ><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-outline-danger btn-sm btnDelete"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Add College</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('college.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>College</label>
                            <input type="text" class="form-control" placeholder="College" required name="name">
                        </div>
                        <div class="form-group">
                            <label>Abbreviation</label>
                            <input type="text" class="form-control" placeholder="Abbreviation" required name="abbreviation">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" class="form-control-file" id="customFile" placeholder="Logo" name="file_logo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit College</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="frm-edit">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>College</label>
                            <input type="text" class="form-control" placeholder="College" required name="name" id="frm-name">
                        </div>
                        <div class="form-group">
                            <label>Abbreviation</label>
                            <input type="text" class="form-control" placeholder="Abbreviation" required name="abbreviation" id="frm-abbreviation">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" class="form-control-file" id="customFile" placeholder="Logo" name="file_logo" id="frm-file_logo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-upload">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">College Bulk Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('college.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="uploaded-file">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(function(){
        $("#table").DataTable();

        $(document).on('click','.btnEdit',function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var abbreviation = $(this).data('abbreviation');
            // var file_logo = $(this).data('file_logo');
            var url = '{{ route("college.update", ":id") }}';
            url = url.replace(':id',id);

            $("#frm-name").val(name);
            $("#frm-abbreviation").val(abbreviation);
            // $("#frm-file_logo").val(file_logo);
            $("#frm-edit").attr("action",url);

            $("#modal-edit").modal();
        });
    });
</script>
@endsection