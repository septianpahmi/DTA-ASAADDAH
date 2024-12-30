@include('Resources.partial.header')
@include('Resources.partial.navbar')
@include('Resources.partial.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-credit-card"></i> Payment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payment</li>
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
                        <div class="card-header d-flex justify-content-end">
                            <!-- Dropdown Kirim Email -->

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>No.Ref</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                        <th>Tgl Tagihan</th>
                                        <th>Tgl Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ Str::limit($item->no_ref, 6) }}</td>
                                            <td>{{ $item->idSiswa->nis }}</td>
                                            <td>{{ $item->idSiswa->nama }}</td>
                                            <td>{{ $item->idSiswa->kelas }}</td>
                                            <td>{{ 'Rp. ' . number_format($item->nominal, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($item->status == 'Berhasil')
                                                    <button class="btn btn-sm btn-outline-success">Berhasil</button>
                                                @endif
                                                @if ($item->status == 'Menunggu Pembayaran')
                                                    <button class="btn btn-sm btn-outline-info">Menunggu</button>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal_tagihan)->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $item->tanggal_pembayaran }}
                                            </td>
                                            <td>
                                                @if ($item->status === 'Berhasil')
                                                    <div class="btn-group btn-sm">
                                                        <a type="button" class="btn btn-info"
                                                            href= "{{ route('payment.invoice', $item->id) }}"><i
                                                                class="fas fa-print"></i> Invoice</a>

                                                    </div>
                                                @endif

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
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@include('Resources.partial.footer')
