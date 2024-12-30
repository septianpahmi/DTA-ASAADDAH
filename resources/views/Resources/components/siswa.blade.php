@include('Resources.partial.header')
@include('Resources.partial.navbar')
@include('Resources.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-users"></i> Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Siswa</li>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-siswa">
                                New Siswa
                            </button>
                        </div>
                        @extends('Resources.layouts.modal')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>TTL</th>
                                        <th>Gender</th>
                                        <th>Orang Tua</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nis }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->tmp_lahir }},
                                                {{ \Carbon\Carbon::parse($item->tgl_lahir)->translatedFormat('d - m - Y') }}
                                            </td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->idUser->name }}</td>
                                            <td>
                                                <div class="btn-group btn-block">
                                                    <button data-toggle="modal"
                                                        data-target="#siswa-edit{{ $item->id }}" type="button"
                                                        class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                    <button type="button"
                                                        url= "{{ route('siswa.delete', $item->id) }}"
                                                        class="btn btn-danger delete" data-id="{{ $item->id }}"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @extends('Resources.layouts.siswa-modal')

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
