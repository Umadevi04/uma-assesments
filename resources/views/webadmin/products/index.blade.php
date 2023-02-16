@extends('webadmin.layouts.admin_layout')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Products-Index</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="pull-right">
                    <a class="btn btn-sm btn-success" href="{{ route('webadmin.products.create') }}"> Create New Product</a>
                </div>
                <br>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Number</th>
                  <th>Name</th>
                  <th>Details</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->detail }}</td>
                      <td>
                        <form action="{{ route('webadmin.products.destroy',$product->id) }}" method="POST">
                            <a class="btn btn-sm btn-info" href="{{ route('webadmin.products.show',$product->id) }}">Show</a>
                            @can('product-edit')
                            <a class="btn btn-sm btn-primary" href="{{ route('webadmin.products.edit',$product->id) }}">Edit</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('product-delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            @endcan
                        </form>
                      </td>
                    </tr>
                   @endforeach
                </tbody>
              </table>
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
{{-- @push('js') --}}
<script>
    $(function () {
    //   $("#example1").DataTable({
    //     "responsive": true, "lengthChange": false, "autoWidth": false,
    //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
