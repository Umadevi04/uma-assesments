@extends('webadmin.layouts.admin_layout')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Show Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- <div class="pull-right">
                                <a class="btn btn-sm btn-success" href="{{ route('webadmin.users.index') }}"> Back</a>
                            </div> --}}

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Email:</strong>
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Roles:</strong>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-sm btn-success" href="{{ route('webadmin.users.index') }}"> Back</a>
                                        </div>
                                    </div>
                                </div>
                            {{-- </table> --}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <!-- /.content -->
    </div>

@endsection
