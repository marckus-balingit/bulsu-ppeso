@extends('layouts.admin')

@section('title', config('app.company_name').' - Course')

@section('content_header')
{{-- <h1>Users</h1> --}}
@stop

@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a> System Setup</a></li>
        <li class="breadcrumb-item">College</li>
        <li class="breadcrumb-item">Course</li>
    </ol>
</div>
@endsection
  
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ $college->name }}</h3>
                </div>
                
                <div class="card-body">
                    <a href="{{ route('college.index') }}" class="btn btn-danger btn-sm"> Back</a>
                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add New Course</button>
                    <div class="btn-group float-right mr-1" role="group">
                        <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-import"></i> Bulk Upload</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                          <a class="dropdown-item" href="#">Download Template</a>
                          <a class="dropdown-item" href="#">Import Template</a>
                        </div>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($college->course as $course)
                                    <tr>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->diffForHumans() }}</td>
                                        <td>
                                            <button class="btn btn-outline-success btn-sm btnEdit"
                                                data-id ="{{ $course->id}}"
                                                data-name ="{{ $course->name}}"
                                            ><i class="fa fa-edit"></i></button>
                                            <form action="" method="post" class="d-inline" id="frm-course-delete">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="college_id" value="{{ $college->id }}">
                                                <button type="button" class="btn btn-outline-danger btn-sm btnDelete"
                                                onclick="deleteFunction('course','{{ route('course.destroy',$course->id) }}','{{ $course->name }}')"
                                                ><i class="fa fa-trash"></i></button>
                                            </form>
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
                    <h5 class="modal-title" id="modal-title">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('course.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="college_id" value="{{ $college->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" class="form-control" placeholder="Course" required name="name">
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
                    <h5 class="modal-title" id="modal-title">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="frm-edit">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="college_id" value="{{ $college->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" class="form-control" placeholder="Course" required name="name" id="frm-name">
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
            var url = '{{ route("course.update", ":id") }}';
            url = url.replace(':id',id);

            $("#frm-name").val(name);
            $("#frm-edit").attr("action",url);

            $("#modal-edit").modal();
        });
    });
</script>
@endsection