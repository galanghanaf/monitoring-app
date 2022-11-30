                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><b><?php echo $title ?> <b class="text-primary"><?php echo $title2 ?></b></b></h1>
                    </div>

                    <div class="alert alert-success font-weight-bold ">Selamat Datang <?= $user['name']; ?>, Anda Login Sebagai Super Admin!</div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Data Admin -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Data Super Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $superadmin ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Admin -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Pegawai -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Task List</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $task_list ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Log Book
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $logbook ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                    <div id="map4" style="height: 350px;"></div>
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
                                    <div id="map2" style="height: 350px;"></div>
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

                <br>
                <br>