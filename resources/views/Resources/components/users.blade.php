@include('Resources.partial.header')
@include('Resources.partial.navbar')
@include('Resources.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-user"></i> Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header text-right">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-users">
                                New Users
                            </button>
                        </div>
                        @extends('Resources.layouts.modal')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                @if ($item->role == 'Admin')
                                                    <button
                                                        class="btn btn-sm btn-block btn-outline-success">Admin</button>
                                                @endif
                                                @if ($item->role == 'Orang Tua')
                                                    <button class="btn btn-block btn-sm btn-outline-primary">Orang
                                                        Tua</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group btn-block">
                                                    <button data-toggle="modal"
                                                        data-target="#users-edit{{ $item->id }}" type="button"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                    <button type="button" url= "{{ route('users.delete', $item->id) }}"
                                                        class="btn btn-danger delete" data-id="{{ $item->id }}"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @extends('Resources.layouts.users-modal')

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@include('Resources.partial.footer')
