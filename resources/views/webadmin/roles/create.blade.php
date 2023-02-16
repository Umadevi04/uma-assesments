@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Role</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'webadmin.roles.store', 'method' => 'POST']) !!}
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'exampleInputName']) !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPermission">Permission</label>
                                <br />
                                @foreach ($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}</label> <br />
                                 @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button> &nbsp;
                        <a class="btn btn-sm btn-success" href="{{ route('webadmin.roles.index') }}"> Back</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
