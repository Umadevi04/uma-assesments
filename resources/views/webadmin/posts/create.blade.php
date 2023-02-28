@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Post</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'webadmin.posts.store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                <label for="exampleInputName"> Post Title</label>
                                {!! Form::text('postTitle', null, [
                                    'placeholder' => 'Post Title',
                                    'class' => 'form-control',
                                    'id' => 'exampleInputName',
                                ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="exampleInputImage"> Post Image </label>
                                {!! Form::file('image', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label for="exampleInputDescription"> Post Description </label>
                                {!! Form::textarea('postDescription', null, [
                                    'placeholder' => 'Post Description',
                                    'class' => 'form-control',
                                    'id' => 'exampleInputDescription',
                                ]) !!}
                            </div>

                            {{-- <div class="form-group">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                                <div class="form-check form-switch ">
                                    <input class ="form-check-input" type="checkbox" name="active"
                                        id="flexSwitchCheckDefault" checked data-toggle="toggle" data-on="1"
                                        data-off="0">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" name="is_commentable" class="custom-control-input" id="customSwitch3" data-on="1" data-off="0">
                                    <label class="custom-control-label" for="customSwitch3">Is Commentable</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button> &nbsp;
                            <a class="btn btn-sm btn-success" href="{{ route('webadmin.posts.index') }}"> Back</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
