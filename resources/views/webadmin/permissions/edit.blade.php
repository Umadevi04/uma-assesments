@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Permissions</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::model($permission, ['method' => 'PATCH', 'route' => ['webadmin.permissions.update', $permission->id]]) !!}

                            <div class="form-group">
                                <label for="exampleInputName">Permission</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'exampleInputName']) !!}
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>&nbsp;
                                <a class="btn btn-sm btn-success" href="{{ route('webadmin.permissions.index') }}"> Back</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
