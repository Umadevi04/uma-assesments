@extends('webadmin.layouts.admin_layout')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Show Roles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            {{ $role->name }}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Roles:</strong>
                                            @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $v)
                                                <label class="badge badge-success">{{ $v->name }}</label>
                                            @endforeach
                                        @endif
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-sm btn-success" href="{{ route('webadmin.roles.index') }}"> Back</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

