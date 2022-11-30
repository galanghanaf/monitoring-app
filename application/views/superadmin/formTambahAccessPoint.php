                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?= base_url('superadmin/accesspoint/tambahData'); ?>">
                                <div class="form-group">
                                    <label>Asset Description</label>
                                    <input type="text" name="asset_description" class="form-control">
                                    <?= form_error('asset_description', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Hostname</label>
                                    <input type="text" name="hostname" class="form-control">
                                    <?= form_error('hostname', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" name="model" class="form-control">
                                    <?= form_error('model', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>PCB Serial Number</label>
                                    <input type="text" name="pcb" class="form-control">
                                    <?= form_error('pcb', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Assembly Serial Number</label>
                                    <input type="text" name="assembly" class="form-control">
                                    <?= form_error('assembly', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>IP Address</label>
                                    <input type="text" name="ip_address" class="form-control">
                                    <?= form_error('ip_address', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Mac Address</label>
                                    <input type="text" name="mac_address" class="form-control">
                                    <?= form_error('mac_address', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Switch</label>
                                    <input type="text" name="switch" class="form-control">
                                    <?= form_error('switch', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Port</label>
                                    <input type="text" name="port" class="form-control">
                                    <?= form_error('port', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('superadmin/accesspoint') ?>">
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