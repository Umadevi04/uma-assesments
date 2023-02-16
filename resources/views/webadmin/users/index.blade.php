@extends('webadmin.layouts.admin_layout')
@section('content')
    <div class="content-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Users-Index</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="pull-right">
                                <a class="btn btn-sm btn-success" href="{{ route('webadmin.users.create') }}"> Create New
                                    User</a>
                            </div>
                            {{-- <div class="widget-body clearfix"> --}}
                                {!! $dataTable->table(['class' => 'table table-striped table-responsive', 'id' => 'datatable-buttons']) !!}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('webadmin.layouts.partials.datatable_scripts')
@endsection
