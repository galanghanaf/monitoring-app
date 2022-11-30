                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($ipstatic as $t) : ?>
                                <!--foreach/perulangan berguna untuk mengambil data dari query table-->
                                <!-- Disini kita baca datanya dengan method POST sesuai pada controllers/admin/dataJabatan-->
                                <?php echo form_open_multipart('admin/ipstatic/updateDataAksi') ?>

                                <div class="form-group">
                                    <label>Port</label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $t->id ?>">
                                    <input type="text" name="port" class="form-control" value="<?php echo $t->port ?>">
                                    <?php echo form_error('port', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Ip Address</label>
                                    <input type="text" name="ip_address" class="form-control" value="<?php echo $t->ip_address ?>">
                                    <?php echo form_error('ip_address', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Mac Address</label>
                                    <input type="text" name="mac_address" class="form-control" value="<?php echo $t->mac_address ?>">
                                    <?php echo form_error('mac_address', '<divs class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Hostname</label>
                                    <input type="text" name="host_name" class="form-control" value="<?php echo $t->host_name ?>">
                                    <?php echo form_error('host_name', '<divs class="text small text-danger"></div>') ?>
                                </div>


                                <div class="form-group">
                                    <label>Manufacture</label>
                                    <input type="text" name="manufacture" class="form-control" value="<?php echo $t->manufacture ?>">
                                    <?php echo form_error('manufacture', '<divs class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Model/Type</label>
                                    <input type="text" name="model" class="form-control" value="<?php echo $t->model ?>">
                                    <?php echo form_error('model', '<divs class="text small text-danger"></div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Serial Number</label>
                                    <input type="text" name="serial_number" class="form-control" value="<?php echo $t->serial_number ?>">
                                    <?php echo form_error('serial_number', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Asset Number</label>
                                    <input type="text" name="asset_number" class="form-control" value="<?php echo $t->asset_number ?>">
                                    <?php echo form_error('asset_number', '<div class="text small text-danger"></div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>User</label>
                                    <input type="text" name="user" class="form-control" value="<?php echo $t->user ?>">
                                    <?php echo form_error('user', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" value="<?php echo $t->password ?>">
                                    <?php echo form_error('password', '<div class="text small text-danger"></div>') ?>
                                </div>

                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('admin/ipstatic') ?>">
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

                <!-- End of Main Content -->