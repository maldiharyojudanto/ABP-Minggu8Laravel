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
                <a href="/produk" style="text-decoration:none;color:#00739d"><i class="fas fa-shoe-prints me-2"></i>Espatu</a>
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
                <h3 class="fs-4 mb-3">List Gudang</h3>
                <p>Berikut adalah list gudang.</p>
                <button type="button" id="buttonGudang" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add Gudang</button>

                <div class="col bg-white rounded mb-4">
                    <div class="table-responsive">
                        <table id="data-table" class="table bg-white rounded table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Gudang</th>
                                    <th>Alamat Gudang</th>
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
                                <h5 class="modal-title" id="ajaxModalLabel">Masukkan Detail Gudang</h5>
                            </div>
                            <form id="gudangForm" name="gudangForm">
                                <div class="modal-body">
                                    <input type="hidden" name="gudang_id" id="gudang_id">

                                    <div class="form-group">
                                        <label>Nama Gudang</label>
                                        <input type="text" name="nama_gudang" id="nama_gudang" class="form-control" placeholder="Masukkan nama" required/>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat Gudang</label>
                                        <input type="text" name="alamat_gudang" id="alamat_gudang" class="form-control" placeholder="Masukkan alamat" required/>
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

                <!-- Detail Modal -->
                @foreach ($list as $detail)
                    <div class="modal fade" id="detailModal-{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel">Detail Gudang {{ $detail->nama_gudang }}</h5>
                                </div>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <p>Berikut adalah detail gudang {{$detail->nama_gudang}}.</p>
                                        <div class="col">
                                            <div class="">
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
                                                        @foreach($detail->produk as $ditel)
                                                            <tr>
                                                                <td>{{ $number }}</th>
                                                                <td>{{ $ditel->nama_produk }}</td>
                                                                <td>{{ $ditel->stok }}</td>
                                                                <td>{{ $ditel->harga }}</td>
                                                                <td>
                                                                    {{ $ditel->brand->nama_brand }}
                                                                </td>                                                                                       </td>
                                                            </tr>
                                                            <?php $number++; ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Selesai Detail Modal -->
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
                ajax: "/gudang",
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'nama_gudang'},
                    {data: 'alamat_gudang'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            /* Fungsi Add Button */
            $('#buttonGudang').click(function () {
                $('#gudang_id').val('');
                $('#gudangForm').trigger("reset");
                $('#ajaxModal').modal('show');
            });
        
            /* Fungsi Edit Button */
            $('body').on('click', '.editGudang', function () {
                var gudang_id = $(this).data('id');

                $.get("/gudang/edit/"+gudang_id, function (list) {
                    $('#ajaxModalLabel').html("Edit Gudang "+list.nama_gudang);
                    $('#ajaxModal').modal('show');
                    $('#gudang_id').val(list.id);
                    $('#nama_gudang').val(list.nama_gudang);
                    $('#alamat_gudang').val(list.alamat_gudang);
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
                    data: $('#gudangForm').serialize(),
                    url: "/gudang",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#gudangForm').trigger("reset");
                        Swal.fire({
                            title: 'Success!',
                            text: 'Gudang saved successfully.',
                            imageUrl: 'https://media.tenor.com/PpOiTCAN6CMAAAAS/spongebob-patrick.gif',
                            imageWidth: 400,
                            imageHeight: 240,
                            imageAlt: 'Squidward',
                        })
                        $('#ajaxModal').modal('hide');
                        table.draw();
                    }
                });
            });

            /* Kode Delete Produk */
            $('body').on('click', '.hapusGudang', function () {
                var gudang_id = $(this).data("id");

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
                            text: 'Gudang saved successfully.',
                            imageUrl: 'https://media.tenor.com/SPeUOTGHGrwAAAAM/spongebob-squidward.gif',
                            imageWidth: 400,
                            imageHeight: 300,
                            imageAlt: 'Squidward',
                        })
                        
                        $.ajax({
                        type: "GET",
                        url: "/gudang/delete/"+gudang_id,
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