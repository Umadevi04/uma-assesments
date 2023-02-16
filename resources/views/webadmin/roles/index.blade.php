@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Roles-Index</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="pull-right">
                                <a class="btn btn-sm btn-success" href="{{ route('webadmin.roles.create') }}"> Create New
                                    Role</a>
                            </div>
                            <br>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('webadmin.roles.show', $role->id) }}">Show</a>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('webadmin.roles.edit', $role->id) }}">Edit</a>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['webadmin.roles.destroy', $role->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                {!! Form::close() !!}
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
    </div>

    <script>
        $(function() {
            //   $("#example1").DataTable({
            //     "responsive": true, "lengthChange": false, "autoWidth": false,
            //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
