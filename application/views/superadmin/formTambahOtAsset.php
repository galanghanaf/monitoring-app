                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart('superadmin/otasset/tambahDataAksi') ?>
                            <form method="post" action="<?php echo base_url('superadmin/otasset/tambahDataAksi') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Asset Description</label>
                                    <input type="text" name="asset_description" class="form-control">
                                    <?= form_error('asset_description', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Asset Number</label>
                                    <input type="text" name="asset_number" class="form-control">
                                    <?= form_error('asset_number', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Serial Number</label>
                                    <input type="text" name="serial_number" class="form-control">
                                    <?= form_error('serial_number', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Model/Type</label>
                                    <input type="text" name="model" class="form-control">
                                    <?= form_error('model', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Mac Address</label>
                                    <input type="text" name="mac_address" class="form-control">
                                    <?= form_error('mac_address', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>IP Address</label>
                                    <input type="text" name="ip_address" class="form-control">
                                    <?= form_error('ip_address', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control">
                                    <?= form_error('location', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Photo Location</label>
                                    <input type="file" name="photo" class="form-control">
                                    <?= form_error('photo', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <br>
                                <div class="form-group">
                                    <h4 class="text-center"><b>Pilih Location</b></h4>
                                    <div id="map" style="height: 600px;"></div>
                                    <br>
                                    <label>Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control" readonly>
                                    <?= form_error('latitude', '<small class="text-danger">', '</small>') ?>
                                    <br>
                                    <label>Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control" readonly>
                                    <?= form_error('longitude', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <br>
                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('superadmin/otasset') ?>">
                                    Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <?php echo form_close(); ?>

                        </div>

                    </div>
                </div>
                </div>

                <br>
                <br>
                <br>
                <script>
                    var map = L.map('map').setView([-6.434244857960943, 106.92771446855967], 18);

                    var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                        maxZoom: 20,
                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                    }).addTo(map);

                    var theMarker = {};

                    map.on('click', function(e) {
                        lat = e.latlng.lat;
                        lon = e.latlng.lng;

                        console.log("You clicked the map at LAT: " + lat + " and LONG: " + lon);
                        //Clear existing marker, 


                        if (theMarker != undefined) {
                            map.removeLayer(theMarker);
                        };

                        //Add a marker to show where you clicked.
                        theMarker = L.marker([lat, lon]).addTo(map);

                        document.getElementById("latitude").value =
                            lat;
                        document.getElementById("longitude").value =
                            lon;
                    });
                </script>
                <!-- End of Main Content -->