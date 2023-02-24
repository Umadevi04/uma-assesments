@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Posts</h3>
                        </div>
                        {{-- {{dd($data)}} --}}
                        <div class="card-body">
                            {!! Form::model($post, [
                                'method' => 'PUT',
                                'route' => ['webadmin.posts.update', $post->id],
                            ]) !!}

                            <div class="form-group">
                                <label for="exampleInputName">Post Title</label>
                                {!! Form::text('postTitle', null, ['placeholder' => 'Post Title', 'class' => 'form-control', 'id' => 'exampleInputName']) !!}
                            </div>

                            <div class="form-group">
                                <label>Select User</label>
                                <select name="user_id" class="form-control">
                                    @foreach ($users as $key => $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $post->user_id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>&nbsp;
                                <a class="btn btn-sm btn-success" href="{{ route('webadmin.posts.index') }}">
                                    Back</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
