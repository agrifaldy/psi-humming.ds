@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Table Example</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Homestay</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Harga</th>
                            <th>Check In</th>
                            <th>Check out</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($booking as $b)
                            <tr>
                                <td>{{$b->id}}</td>
                                <td>{{$b->homestay->nama_homestay}}</td>
                                <td>{{$b->user->name}}</td>
                                <td>{{$b->user->email}}</td>
                                <td>{{$b->user->no_hp}}</td>
                                <td>{{$b->total_harga}}</td>
                                <td>{{$b->check_in}}</td>
                                <td>{{$b->check_out}}</td>
                                <td>
                                    <a href="{{route('dashboard.booking.edit', $b -> id)}}" class="btn btn-primary a-btn-slide-text">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        <span><strong>Hapus</strong></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
        </p>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>
@stop
