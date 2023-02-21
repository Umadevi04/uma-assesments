@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::model($product, ['method' => 'PATCH', 'route' => ['webadmin.products.update', $product->id]]) !!}

                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'exampleInputName']) !!}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Detail</label>
                                {!! Form::text('detail', null, [
                                    'placeholder' => 'Detail',
                                    'class' => 'form-control',
                                    'id' => 'exampleInputDetail1',
                                ]) !!}
                            </div>  
                            <div class="form-group">
                                <label>Select Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $key => $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                            {{ $item->detail }}
                                            
                                        </option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="form-group">
                                <label>Select SubCategory</label>
                                <select name="sub_category_id" class="form-control">
                                    @foreach ($subcategories as $key => $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $product->sub_category_id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                            {{ $item->detail }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>                       
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>&nbsp;
                                <a class="btn btn-sm btn-success" href="{{ route('webadmin.products.index') }}"> Back</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection