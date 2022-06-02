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
                    <button type="button" class="btn btn-info float-right btn-xs" data-toggle="modal"
                        data-target="#exampleModal"><i class="fas fa-plus-square"></i> Tambah Produk</button>
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
                                <th style="width: 145px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($listUser as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ 'Rp. ' . number_format($data->harga) }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>{{ $data->category_id }}</td>
                                    <td>{{ $data->image }}</td>
                                    <td>
                                        <a type="button" class="btn btn-warning btn-xs" data-mdata="{{$data}}" data-toggle="modal"
                                        data-target="#edit"><i class="fas fa-edit"></i> Edit</a>

                                        <a type="button" class="btn btn-danger btn-xs"  data-id="{{ $data->id }}" data-toggle="modal"
                                            data-target="#delete" ><i
                                                class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="card card-primary">

                            <!-- form start -->
                            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Nama Produk" name="name">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Harga Produk</label>
                                                <input type="text" class="form-control" placeholder="Harga Produk"
                                                    name="harga">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="form-control" name="category_id">
                                                    <option value="1">Makanan Kantin</option>
                                                    <option value="2">Minuman Kantin</option>
                                                    <option value="3">Pulsa</option>
                                                    <option value="4">Barang Koperasi</option>
                                                    <option value="5">Makanan/Minuman Koperasi</option>
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
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="image">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info btn-sm">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card card-primary">

                        <!-- form start -->
                        <form action="#" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" id="edt_name"
                                        placeholder="Nama Produk" name="name">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Harga Produk</label>
                                            <input type="text" class="form-control" id="edt_harga" placeholder="Harga Produk"
                                                name="harga">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="category_id">
                                                <option value="1">Makanan Kantin</option>
                                                <option value="2">Minuman Kantin</option>
                                                <option value="3">Pulsa</option>
                                                <option value="4">Barang Koperasi</option>
                                                <option value="5">Makanan/Minuman Koperasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Produk</label>
                                    <textarea class="form-control" rows="3" id="edt_desc" placeholder="Keterangan Produk" name="deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="image">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-dismiss="modal">Close</button>
                                <button type="button" id="btn_simpan" class="btn btn-info btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="modal modal-danger fade" id="delete" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addNewLabel">HapusProduk</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <!-- form start -->
                        <form action="#" method="POST">
                            {{-- {{ csrf_field() }} --}}
                            <div class="modal-body">
                                <input type="hidden" name="id" id="iddata" value="">
                                <p class="text-center">
                                    Apakah anda yakin ingin menghapus produk ini?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm">Hapus</button>
                            </div>
                        </form>
                  </div>
                </div>
              </div>
            <!-- /.row (main row) -->
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('js')
<script>
    $('#delete').on('show.bs.modal', function (event) {
        var data = $(event.relatedTarget)
        var iddata = data.data('id')

        var modal = $(this)
        modal.find('.modal-body #iddata').val(iddata);

        $('#btn_delete').click(function(e){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route('deleteProduct') }}',
                data: {'id': iddata},
                success: function(data){
                    console.log(data)
                   location.reload();
                }
            })
        })
    })


    $('#edit').on('show.bs.modal', function (event) {
        var data = $(event.relatedTarget)
        var iddata = data.data('id')
        let mdata = data.data('mdata')

        let edtName = document.getElementById('edt_name')
        let edtHarga = document.getElementById('edt_harga')
        let edtDesc = document.getElementById('edt_desc')


        var modal = $(this)
        $('#edt_name').val(mdata.name)
        $('#edt_harga').val(mdata.harga)
        $('#edt_desc').val(mdata.deskripsi)
        modal.find('.modal-body #iddata').val(iddata);

        $('#btn_simpan').click(function(e){
           //alert("Name:"+ mdata.name)
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route('updateProduct') }}',
                data: {
                    'id': mdata.id, 
                    'name':edtName.value, 
                    'harga':edtHarga.value, 
                    'deskripsi':edtDesc.value
                },
                success: function(data){
                    console.log(data)
                   location.reload();
                }
            })
        })
    })
</script>

@endsection
