<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Detail Gudang {{ $detail->nama_gudang }}</title>
</head>
<body>
<div class="container">
        <h1>Detail Gudang {{ $detail->nama_gudang }}</h1>
        <div class="p-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Gudang </th>
                        <th>Alamat Gudang</th>
                        <th>Total Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $detail->nama_gudang }}</td>
                        <td>{{ $detail->alamat_gudang }}</td>
                        <td>{{ $detail->produk->pluck('stok')->sum() }}</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Brand</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $detail->produk->pluck('nama_produk') }}</td>
                        <td>{{ $detail->produk->pluck('stok') }}</td>
                        <td>{{ $detail->produk->pluck('harga') }}</td>
                        <td>{{ $detail->produk->pluck('brand_id') }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="/gudang" class="btn btn-secondary mb-2">Back</a>            
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
    <title>Gudang</title>
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
                <a href="/produk" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-list me-2"></i>Produk
                </a>
                <a href="/brand" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-star me-2"></i>Brand
                </a>
                <a href="/gudang" class="list-group-item list-group-item-action bg-transparent second-text active">
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
                    <h2 class="fs-2 m-0"> Gudang</h2>
                </div>
            </nav>

            <!-- content -->
            <div class="container-fluid px-4">
                <h3 class="fs-4 mb-3">Detail Gudang</h3>
                <p>Berikut adalah detail gudang {{$detail->nama_gudang}}.</p>
                <a href="/gudang" class="btn btn-secondary mb-4"><i class="fas fa-arrow-left"></i> Back</a>

                <div class="col">
                    <div class="table-responsive">
                        <table class="table bg-white rounded table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Gudang</th>
                                    <th>Alamat Gudang</th>
                                    <th>Total Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $detail->nama_gudang }}</td>
                                    <td>{{ $detail->alamat_gudang }}</td>
                                    <td>{{ $detail->produk->pluck('stok')->sum() }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table bg-white rounded table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Brand</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1; ?>
                                @foreach($produk as $daftar)
                                    @if($daftar->gudang_id === $detail->id)
                                    <tr>
                                        <th scope="row">{{ $number }}.</th>
                                        <td>{{ $daftar->nama_produk }}</td>
                                        <td>{{ $daftar->stok }}</td>
                                        <td>{{ $daftar->harga }}</td>
                                        <td>
                                            @foreach($brand as $merk)
                                                @if($merk->id === $daftar->brand_id)
                                                    {{ $merk->nama_brand }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endif
                                    <?php $number++; ?>
                                @endforeach
                            </tbody>
                        </table>
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