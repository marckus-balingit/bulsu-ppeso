@extends('layouts.admin')

@section('title', config('app.company_name').' - Specialization')

@section('content_header')
{{-- <h1>Users</h1> --}}
@stop

@section('breadcrumb')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a> System Setup</a></li>
        <li class="breadcrumb-item">Job Specialization</li>
    </ol>
</div>
@endsection
  
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline">
                <div class="card-header">
                    <h3 class="card-title">Job Specialization</h3>
                </div>
                
                <div class="card-body">
                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Add New Specialization</button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specials as $special)
                                    <tr>
                                        <td>{{ $special->id }}</td>
                                        <td>{{ $special->name }}</td>
                                        <td>{{ $special->created_at }}</td>
                                        <td>
                                        <button class="btn btn-outline-success btn-sm btnEdit" data-id="{{ $special->id }}" data-name="{{ $special->name }}"><i class="fa fa-edit"></i></button>
                                            <form action="" method="post" class="d-inline" id="frm-specialization-delete">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $special->id }}">
                                                <button type="button" class="btn btn-outline-danger btn-sm btnDelete"
                                                onclick="deleteFunction('specialization','{{ route('study.destroy',$special->id) }}','{{ $special->name }}')"
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
                    <h5 class="modal-title" id="modal-title">Add Specialization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('study.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Specialization</label>
                            <input type="text" class="form-control" placeholder="Name" required name="name">
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
                    <h5 class="modal-title" id="modal-title">Edit Specialization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="frm-edit">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Specialization</label>
                            <input type="text" class="form-control" placeholder="Name" required name="name" id="frm-name">
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
            var url = '{{ route("study.update", ":id") }}';
            url = url.replace(':id',id);

            $("#frm-name").val(name);
            // $("#frm-file_logo").val(file_logo);
            $("#frm-edit").attr("action",url);

            $("#modal-edit").modal();
        });
    });
</script>
@endsection