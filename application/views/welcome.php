<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/horizontal-scroll.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/leaflet/leaflet.css" />
    <script src="<?php echo base_url() ?>/assets/leaflet/leaflet.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <div class="btn-group">
                        <a class="btn btn-primary font-weight-bold ml-2" href="<?php echo base_url() ?>" aria-expanded="false">
                            Monitoring App
                        </a>
                    </div>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item"><a class="btn btn-success btn-md active mt-1 mr-2 font-weight-bold" role="button" aria-pressed="true" href="#loginModal" data-bs-toggle="modal">Login</a></li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">

                    <?php echo $this->session->flashdata('message') ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><b><?php echo $title ?> <b class="text-primary"><?php echo $title2 ?></b></b></h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Access Point </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $accesspoint ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-signal fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                IP Static </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ipstatic ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Switch </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $switch ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-share-alt-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                OT Asset </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ot_asset ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success border-bottom-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs text-center font-weight-bold text-success mb-2">
                                        <h5><b>IT Asset</b></h5>
                                    </div>
                                    <div id="map4" style="height: 500px;"></div>
                                    <script>
                                        var map4 = L.map('map4').setView([-6.434244857960943, 106.92771446855967], 18);

                                        var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                                            maxZoom: 20,
                                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                                        }).addTo(map4);

                                        <?php foreach ($mappingitotasset as $itot) : ?>
                                            L.marker([<?php echo $itot['latitude']; ?>, <?php echo $itot['longitude']; ?>]).addTo(map4)
                                                .bindPopup('Asset Number : <b><?php echo $itot['asset_number']; ?></b><br/>Asset Description : <b><?php echo $itot['asset_description']; ?></b><br/>Serial Number : <b><?php echo $itot['serial_number']; ?></b><br/>Model/Type : <b><?php echo $itot['model']; ?></b><br/>Location : <b><?php echo $itot['location']; ?></b><br/><br/> <center><img src="<?php echo base_url() . 'assets/team/' . $itot['photo']; ?>" width="150px"></center> ');
                                        <?php endforeach; ?>
                                    </script>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-danger border-bottom-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="text-xs text-center font-weight-bold text-danger mb-2">
                                        <h5><b>OT Asset</b></h5>
                                    </div>
                                    <div id="map2" style="height: 500px;"></div>
                                    <script>
                                        var map2 = L.map('map2').setView([-6.434244857960943, 106.92771446855967], 18);

                                        var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                                            maxZoom: 20,
                                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                                        }).addTo(map2);

                                        <?php foreach ($mappingotasset as $ot) : ?>
                                            L.marker([<?php echo $ot['latitude']; ?>, <?php echo $ot['longitude']; ?>]).addTo(map2)
                                                .bindPopup('Asset Number : <b><?php echo $ot['asset_number']; ?></b><br/>Asset Description : <b><?php echo $ot['asset_description']; ?></b><br/>Serial Number : <b><?php echo $ot['serial_number']; ?></b><br/>Model/Type : <b><?php echo $ot['model']; ?></b><br/>Location : <b><?php echo $ot['location']; ?></b><br/><br/> <center><img src="<?php echo base_url() . 'assets/team/' . $ot['photo']; ?>" width="150px"></center> ');
                                        <?php endforeach; ?>
                                    </script>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->


            <br>

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://github.com/galanghanaf" target="_blank">galanghanaf</a> <?php echo date("Y"); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <div class="portfolio modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <br>
                                <br>
                                <h2 class="font-weight-bold h1 text-center">Login</h2>
                                <p class="item-intro font-weight-bold text-muted text-center">Silahkan Login Terlebih Dahulu.</p>
                                <div class="row">

                                    <div class="col-lg-12 mt-3">
                                        <div class="p-10">
                                            <form class="user" method="POST" action="<?php echo base_url('Welcome') ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" placeholder="Masukan Email" name="email">
                                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user" placeholder="Masukan Password" name="password">
                                                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                </div>





                                                <button type="submit" class="font-weight-bold btn btn-primary btn-user btn-lgs btn-block">Login</button>
                                                <hr>

                                                <button type="button" class="font-weight-bold btn btn-danger btn-user btn-lgs btn-block" data-bs-dismiss="modal">Tutup</button>



                                            </form>
                                            <br>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>

    <!-- Bootstrap core JS-->
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>