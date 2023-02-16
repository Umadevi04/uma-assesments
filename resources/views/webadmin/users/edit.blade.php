@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['webadmin.users.update', $user->id]]) !!}

                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'exampleInputName']) !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                {!! Form::text('email', null, [
                                    'placeholder' => 'Email',
                                    'class' => 'form-control',
                                    'id' => 'exampleInputEmail1',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                {!! Form::password('password', [
                                    'placeholder' => 'Password',
                                    'class' => 'form-control',
                                    'id' => 'exampleInputPassword1',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label>Select Multiple</label>
                                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>&nbsp;
                                <a class="btn btn-sm btn-success" href="{{ route('webadmin.users.index') }}"> Back</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
