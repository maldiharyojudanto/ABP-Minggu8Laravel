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
                <a href="/produk" style="text-decoration:none;color:#00739d"><i class="fas fa-shoe-prints me-2"></i>Espatu</a>
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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- content -->
            <div class="container-fluid px-4">
                <h3 class="fs-4 mb-3">List Produk</h3>
                <p>Berikut adalah list produk.</p>
                <button type="button" id="buttonProduk" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add Produk</button>

                <div class="col bg-white rounded mb-4">
                    <div class="table-responsive">
                        <table id="data-table" class="table bg-white rounded table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Brand</th>
                                    <th>Gudang</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Add Modal -->
                <div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajaxModalLabel">Masukkan Detail Produk</h5>
                            </div>
                            <form id="produkForm" name="produkForm">
                                <div class="modal-body">
                                    <input type="hidden" name="produk_id" id="produk_id">

                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Masukkan nama" required/>
                                    </div>

                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan stok" required/>
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
                                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan harga" required/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="closeBtn" class="btn btn-secondary">Close</button>
                                    <button type="submit" id="saveBtn" class="btn btn-primary" >Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Selesai Add Modal -->
            </div>
            <!-- isi selesai -->
        </div>
        <!-- page selesai -->
    </div>
    
    @include('tema.script')

    <script type="text/javascript">
         $(function () {
            /* Pass Header Token */
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /* List DataTable */
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/produk",
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'nama_produk'},
                    {data: 'stok'},
                    {data: 'brand.nama_brand'},
                    {data: 'gudang.nama_gudang'},
                    {data: 'harga'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            /* Fungsi Add Button */
            $('#buttonProduk').click(function () {
                $('#produk_id').val('');
                $('#produkForm').trigger("reset");
                $('#ajaxModal').modal('show');
            });
        
            /* Fungsi Edit Button */
            $('body').on('click', '.editProduk', function () {
                var produk_id = $(this).data('id');

                $.get("/produk/edit/"+produk_id, function (list) {
                    $('#ajaxModalLabel').html("Edit Produk "+list.nama_produk);
                    $('#ajaxModal').modal('show');
                    $('#produk_id').val(list.id);
                    $('#nama_produk').val(list.nama_produk);
                    $('#stok').val(list.stok);
                    $('#brand_id').val(list.brand_id);
                    $('#gudang_id').val(list.gudang_id);
                    $('#harga').val(list.harga);
                })
            });

            /* Fungsi Close Button (Modal) */
            $('#closeBtn').click(function () {
                $('#ajaxModal').modal('hide');
            })

            /* Kode Create & Edit Produk */
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                            
                $.ajax({
                    data: $('#produkForm').serialize(),
                    url: "/produk",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#produkForm').trigger("reset");
                        Swal.fire({
                            title: 'Success!',
                            text: 'Produk saved successfully.',
                            imageUrl: 'https://scontent.fbdo1-2.fna.fbcdn.net/v/t39.30808-6/278567065_164835742579056_576689129440772560_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeGMWF6kpsJQ5oLt7eN8JEpxSPVSsRKQsThI9VKxEpCxOE49TnaEXiSF3Pq-4PzkggqxqhNQ7OBSDpjbV-28sOwJ&_nc_ohc=-68pmva-mqYAX_E-stH&_nc_zt=23&_nc_ht=scontent.fbdo1-2.fna&oh=00_AfAEdlvD1sjzT_ecaMOuBXbMyof8Mt5XCMczSKlLughqEw&oe=6379E7B5',
                            imageWidth: 400,
                            imageHeight: 300,
                            imageAlt: 'Patrick',
                        })
                        $('#ajaxModal').modal('hide');
                        table.draw();
                    }
                });
            });

            /* Kode Delete Produk */
            $('body').on('click', '.hapusProduk', function () {
                var produk_id = $(this).data("id");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Produk saved successfully.',
                            imageUrl: 'https://scontent.fbdo1-2.fna.fbcdn.net/v/t39.30808-6/278502732_164835775912386_1002969881809382871_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeEDf8Pp0XJRiAPZjA4PNkqmMbnOGE2D7ckxuc4YTYPtyRXdhsvwsYT_fk-vxWfdnoIy5ih4Cv6NHS1B0R_0sXmO&_nc_ohc=pGW1zc8xTgEAX9zQtLL&tn=XOaZfrmbBLj6ADW5&_nc_zt=23&_nc_ht=scontent.fbdo1-2.fna&oh=00_AfC8tSL0uHRdp9QRB_tArfU_uhbs3R5YTh3-1iajNLaxzA&oe=637A5EBE',
                            imageWidth: 400,
                            imageHeight: 300,
                            imageAlt: 'Patrick',
                        })
                        
                        $.ajax({
                        type: "GET",
                        url: "/produk/delete/"+produk_id,
                        success: function (list) {
                            table.draw();
                        }
                        });
                    }
                })
            });
        });
    </script>
</body>
</html>