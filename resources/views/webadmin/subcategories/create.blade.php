@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Sub-Category</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'webadmin.subcategories.store', 'method' => 'POST']) !!}
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'exampleInputName']) !!}
                            </div>
                            <div class="form-group">
                                <label>Select Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $key => $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                {{-- {!! Form::select('category_id', $categories, [], ['class' => 'form-control', 'single']) !!} --}}
                            </div>
                        </div>
                        {{-- </div> --}}
                        {{-- </div> --}}
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button> &nbsp;
                            <a class="btn btn-sm btn-success" href="{{ route('webadmin.subcategories.index') }}"> Back</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
