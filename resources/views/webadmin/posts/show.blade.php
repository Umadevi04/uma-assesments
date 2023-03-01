@extends('webadmin.layouts.admin_layout')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Show Posts</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-xl-12 col-xl-12">
                                    <div class="form-group">
                                        <strong>Post Title:</strong>
                                        {{ $post->postTitle }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Post Image:</strong>
                                        <img src="/image/{{ $post->image }}" />
                                    </div>
                                    <div class="form-group">
                                        <strong>Post Description:</strong>
                                        {{ $post->description }}
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-sm btn-success" href="{{ route('webadmin.posts.index') }}">
                                        Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Comments</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-xl-12 col-xl-12">
                                    {!! Form::open(['route' => 'webadmin.posts.store', 'method' => 'POST']) !!}
                                    <div class="form-group">
                                        <label for="exampleInputDescription"> Comment: </label>
                                        {!! Form::textarea('description', null, [
                                            'placeholder' => 'Leave Your Comment Here',
                                            'class' => 'form-control',
                                            'id' => 'exampleInputDescription',
                                            'rows' => '3',
                                            'cols' => '50',
                                        ]) !!}
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-sm btn-success">Submit</a>
                                    </div>
                                </div>
                                <div id="comment-form">
                                    @foreach ($comments as $comment)
                                        <div class="comment">
                                            <h4>{{ $comment->user->name }}</h4>
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                    @endforeach
                                </div>
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
    </div>
    <!-- /.row -->
@endsection
