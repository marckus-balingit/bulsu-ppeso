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
                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-user"><i class="fa fa-plus"></i> Add New College</button>
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
                                        <td></td>
                                        <td>{{ $college->diffForHumans() }}</td>
                                        <td>
                                            <a href="" class="btn btn-outline-primary btn-sm" ><i class="fa fa-book"></i></a>
                                            <button class="btn btn-outline-success btn-sm btnEdit"><i class="fa fa-edit"></i></button>
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

    
    <div class="modal fade" id="modal-user">
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
@endsection

@section('js')
<script>
    $(function(){
        $("#table").DataTable();
    });
</script>
@endsection