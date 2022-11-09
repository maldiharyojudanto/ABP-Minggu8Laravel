<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap 5 Responsive Admin Dashboard</title>
    @include('tema.head')
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- sidebar mulai -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class="fas fa-shoe-prints me-2"></i>Esapetu
            </div>

            <div class="list-group list-group-flush my-2">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-house-user me-2"></i>Dashboard
                </a>
                <a href="/produk" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                    <h2 class="fs-2 m-0"> Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Edison
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- content -->
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">5</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4</h3>
                                <p class="fs-5">Brands</p>
                            </div>
                            <i
                                class="fas fa-star fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">2</h3>
                                <p class="fs-5">Gudang</p>
                            </div>
                            <i class="fas fa-house-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">0</h3>
                                <p class="fs-5">Order</p>
                            </div>
                            <i class="fas fa-cart-shopping fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">List Produk</h3>
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table bg-white rounded table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50">No.</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Gudang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Sport</td>
                                        <td>100</td>
                                        <td>Adidas</td>
                                        <td>Brankas 1</td>
                                        <td>140000</td>
                                        <td>
                                            <a href="/#" class="btn btn-primary btn-sm" >Edit</a> | <a href="#" onclick="return confirm('{{ __('Apakah yakin menghapus?') }}')" class="btn btn-danger btn-sm" >Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>School</td>
                                        <td>130</td>
                                        <td>Nike</td>
                                        <td>Brankas 1</td>
                                        <td>150000</td>
                                        <td>
                                            <a href="/#" class="btn btn-primary btn-sm" >Edit</a> | <a href="#" onclick="return confirm('{{ __('Apakah yakin menghapus?') }}')" class="btn btn-danger btn-sm" >Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Fitness</td>
                                        <td>120</td>
                                        <td>Nike</td>
                                        <td>Brankas 2</td>
                                        <td>190000</td>
                                        <td>
                                            <a href="/#" class="btn btn-primary btn-sm" >Edit</a> | <a href="#" onclick="return confirm('{{ __('Apakah yakin menghapus?') }}')" class="btn btn-danger btn-sm" >Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Work</td>
                                        <td>80</td>
                                        <td>Converse</td>
                                        <td>Brankas 1</td>
                                        <td>300000</td>
                                        <td>
                                            <a href="/#" class="btn btn-primary btn-sm" >Edit</a> | <a href="#" onclick="return confirm('{{ __('Apakah yakin menghapus?') }}')" class="btn btn-danger btn-sm" >Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Old School</td>
                                        <td>100</td>
                                        <td>Vans</td>
                                        <td>Brankas 1</td>
                                        <td>140000</td>
                                        <td>
                                            <a href="/#" class="btn btn-primary btn-sm" >Edit</a> | <a href="#" onclick="return confirm('{{ __('Apakah yakin menghapus?') }}')" class="btn btn-danger btn-sm" >Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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