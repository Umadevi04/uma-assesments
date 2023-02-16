<form>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="name" class="form-control" id="exampleInputName" placeholder="Enter Name">
          </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<!-- /.card -->






{{-- <div class="form-group row">
    {{ Form::label('name', 'User Name *', ['class' => 'col-sm-3 col-form-label  ']) }}
    <div class="col-sm-9">
        {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('email', 'Email *', ['class' => 'col-sm-3 col-form-label  ']) }}
    <div class="col-sm-9">
        {{ Form::text('email', old('email'), ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('password', 'Password *', ['class' => 'col-sm-3 col-form-label  ']) }}
    <div class="col-sm-9">
        {{ Form::password('password', ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-3 col-form-label  ']) }}
    <div class="col-sm-9">
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-actions">
    <div class="form-group row">
        <div class="col-md-9 ml-md-auto btn-list">
            <input class="btn btn-primary btn-rounded" type="submit" value="Submit" name="submit">
            <a class="btn btn-outline-default btn-rounded" href="{{ route('webadmin.users.index') }}">Cancel</a>
        </div>
    </div>
</div> --}}
