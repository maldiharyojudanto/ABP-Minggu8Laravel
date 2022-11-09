<!--<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Add Produk</title>
    </head>
    <body>
        <div class="container">
            <h1>Add Produk</h1>
            <div class="card my-4">
                <div class="card-header">Masukkan detail produk</div>
                <div class="card-body">
                    <form action="/produk" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama"/>
                            <small class="form-text text-muted">Masukkan nama produk, dapat berupa string input.</small>
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" placeholder="Masukkan stok"/>
                            <small class="form-text text-muted">Masukkan jumlah stok, berupa integer (angka) input.</small>
                        </div>

                        <div class="form-group">
                            <label>Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                @foreach ($brand as $item)
                                <option value="{{$item->id}}">{{$item->nama_brand}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pilih brand, berupa pilihan dropdown.</small>
                        </div>

                        <div class="form-group">
                            <label>Gudang</label>
                            <select name="gudang_id" id="gudang_id" class="form-control">
                                @foreach ($gudang as $item)
                                <option value="{{$item->id}}">{{$item->nama_gudang}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pilih gudang, berupa pilihan dropdown.</small>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Masukkan harga"/>
                            <small class="form-text text-muted">Masukkan harga barang, berupa integer (angka) input.</small>
                        </div>

                        <button type="submit" onclick="return alert('{{ __('Berhasil!') }}')" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Produk</title>
    @include('tema.head')
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- sidebar mulai -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class="fas fa-shoe-prints me-2"></i>Espatu
            </div>

            <div class="list-group list-group-flush my-2">
                <a href="/produk" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-list me-2"></i>Produk
                </a>
                <a href="/brand" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-star me-2"></i>Brand
                </a>
                <a href="/gudang" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-truck me-2"></i>Gudang
                </a>
            </div>
            
        </div>
        <!-- sidebar selesai -->

        <!-- page -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"> Produk</h2>
                </div>
            </nav>

            <!-- content -->
            <div class="container-fluid px-4">
                <h3 class="fs-4 mb-3">Add Produk</h3>

                <div class="col">
                    <div class="card mb-2">
                        <div class="card-header">Masukkan Detail Produk</div>
                            <div class="card-body">
                                <form action="/produk" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama" required/>
                                    </div>

                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stok" class="form-control" placeholder="Masukkan stok" required/>
                                    </div>

                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            @foreach ($brand as $item)
                                            <option value="{{$item->id}}">{{$item->nama_brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Gudang</label>
                                        <select name="gudang_id" id="gudang_id" class="form-control">
                                            @foreach ($gudang as $item)
                                            <option value="{{$item->id}}">{{$item->nama_gudang}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control" placeholder="Masukkan harga" required/>
                                    </div>

                                    <button type="submit" onclick="return alert('{{ __('Berhasil!') }}')" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- isi selesai -->
        </div>
        <!-- page selesai -->
    </div>
    @include('tema.script')
</body>
</html>