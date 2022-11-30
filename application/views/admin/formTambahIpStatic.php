                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?= base_url('admin/ipstatic/tambahData'); ?>">

                                <div class="form-group">
                                    <label>Port</label>
                                    <input type="number" name="port" class="form-control">
                                    <?= form_error('port', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Ip Addres</label>
                                    <input type="text" name="ip_address" class="form-control">
                                    <?= form_error('ip_address', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Mac Address</label>
                                    <input type="text" name="mac_address" class="form-control">
                                    <?= form_error('mac_address', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Hostname</label>
                                    <input type="text" name="host_name" class="form-control">
                                    <?= form_error('host_name', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Manufacture</label>
                                    <input type="text" name="manufacture" class="form-control">
                                    <?= form_error('manufacture', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Model/Type</label>
                                    <input type="text" name="model" class="form-control">
                                    <?= form_error('model', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Serial Number</label>
                                    <input type="text" name="serial_number" class="form-control">
                                    <?= form_error('serial_number', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Asset Number</label>
                                    <input type="text" name="asset_number" class="form-control">
                                    <?= form_error('asset_number', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>User</label>
                                    <input type="text" name="user" class="form-control">
                                    <?= form_error('user', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control">
                                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('admin/ipstatic') ?>">
                                    Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
                </div>

                <br>
                <br>
                <br>

                <!-- End of Main Content -->