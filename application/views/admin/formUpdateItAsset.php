                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($itasset as $i) : ?>
                                <!--foreach/perulangan berguna untuk mengambil data dari query table-->
                                <!-- Disini kita baca datanya dengan method POST sesuai pada controllers/admin/dataJabatan-->
                                <?php echo form_open_multipart('admin/itasset/updateDataAksi') ?>
                                <div class="form-group">
                                    <label>Asset Description</label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $i->id ?>">
                                    <input type="text" name="asset_description" class="form-control" value="<?php echo $i->asset_description ?>">
                                    <?= form_error('asset_description', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Asset Number</label>
                                    <input type="text" name="asset_number" class="form-control" value="<?php echo $i->asset_number ?>">
                                    <?= form_error('asset_number', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Serial Number</label>
                                    <input type="text" name="serial_number" class="form-control" value="<?php echo $i->serial_number ?>">
                                    <?= form_error('serial_number', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Model/Type</label>
                                    <input type="text" name="model" class="form-control" value="<?php echo $i->model ?>">
                                    <?= form_error('model', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Mac Address</label>
                                    <input type="text" name="mac_address" class="form-control" value="<?php echo $i->mac_address ?>">
                                    <?= form_error('mac_address', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>IP Address</label>
                                    <input type="text" name="ip_address" class="form-control" value="<?php echo $i->ip_address ?>">
                                    <?= form_error('ip_address', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control" value="<?php echo $i->location ?>">
                                    <?= form_error('location', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Photo Location</label>
                                    <input type="file" name="photo" class="form-control" value="<?php echo $i->photo ?>">
                                    <?= form_error('photo', '<small class="text-danger">', '</small>') ?>
                                </div>





                                <br>
                                <div class="form-group">
                                    <h4 class="text-center"><b>Ubah Location</b></h4>

                                    <div id="map" style="height: 600px;"></div>

                                    <label>Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control" value="<?php echo $i->latitude ?>" readonly>
                                    <?= form_error('latitude', '<small class="text-danger">', '</small>') ?>
                                </div>


                                <div class=" form-group">
                                    <label>Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control" value="<?php echo $i->longitude ?>" readonly>
                                    <?= form_error('longitude', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <br>
                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('admin/itasset') ?>">
                                    Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <?php echo form_close(); ?>
                            <?php endforeach; ?>
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