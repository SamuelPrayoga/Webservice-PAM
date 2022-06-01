@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA TRANSAKSI</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-warning">Data Transaksi Pending</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Kode Pembayaran</th>
                                <th>Total</th>
                                <th>Bank</th>
                                <th>Status</th>
                                <th style="width: 130px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->kode_payment }}</td>
                                    <td>{{ 'Rp. ' . number_format($data->total_transfer) }}</td>
                                    <td>{{ $data->bank }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <a href="{{route ('transaksiBatal', $data->id) }}" type="button" class="btn btn-danger btn-xs">Batal</a>
                                        
                                        <a href="{{route ('transaksiConfirm', $data->id) }}" type="button" class="btn btn-success btn-xs">Proses</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <br>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-success">Data Transaksi Selesai dan Batal</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Kode Pembayaran</th>
                                <th>Total</th>
                                <th>Bank</th>
                                <th>Status</th>
                                <th style="width: 130px"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selesai as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->kode_payment }}</td>
                                    <td>{{ 'Rp. ' . number_format($data->total_transfer) }}</td>
                                    <td>{{ $data->bank }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                         {{-- <a href="{{route ('transaksiBatal', $data->id) }}" type="button" class="btn btn-danger btn-xs">Batal</a> --}}
                                        @if($data->status == "Terkirim")
                                                <a href="{{route ('transaksiSelesai', $data->id) }}" type="button" class="btn btn-block btn-primary btn-xs">Selesai</a>
                                            @elseif ($data->status == "Proses")
                                                <a href="{{route ('transaksiKirim', $data->id) }}" type="button" class="btn btn-block btn-success btn-xs">Send</a>
                                            @elseif ($data->status == "Selesai" || $data->status == "Batal" )
                                                <a href="#" type="button" class="btn btn-block btn-info btn-xs">Detail</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
