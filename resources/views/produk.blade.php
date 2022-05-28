@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA PRODUK</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
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
                    <h3 class="card-title">Data Produk</h3>
                    <button type="button" class="btn btn-info float-right btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-square"></i> Tambah Produk</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listUser as $data )
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{"Rp. ".number_format($data->harga)  }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>{{ $data->category_id }}</td>
                                <td>{{ $data->image }}</td>
                                <td>
                                    <a href="#">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="#">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card card-primary">

                        <!-- form start -->
                        <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Produk</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Produk" name="name">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Harga Produk</label>
                                    <input type="text" class="form-control" placeholder="Harga Produk" name="harga">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="category_id">
                                        <option value="1">option 1</option>
                                        <option value="1">option 2</option>
                                        <option value="1">option 3</option>
                                        <option value="1">option 4</option>
                                        <option value="1">option 5</option>
                                        </select>
                                    </div>
                                </div>
                              </div>
                                <div class="form-group">
                                    <label>Deskripsi Produk</label>
                                    <textarea class="form-control" rows="3" placeholder="Keterangan Produk" name="deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                <label>Pilih Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                    <label class="custom-file-label">Choose File</label>
                                    </div>
                                </div>
                                </div>
                          </div>
                          <!-- /.card-body -->
          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info btn-sm">Tambah</button>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
