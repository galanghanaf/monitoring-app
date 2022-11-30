                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($accesspoint as $t) : ?>
                                <?php echo form_open_multipart('admin/accesspoint/updateDataAksi') ?>
                                <div class="form-group">
                                    <label>Asset Description</label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $t->id ?>">
                                    <input type="text" name="asset_description" class="form-control" value="<?php echo $t->asset_description ?>">
                                    <?php echo form_error('asset_description', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Hostname</label>
                                    <input type="text" name="hostname" class="form-control" value="<?php echo $t->hostname ?>">
                                    <?php echo form_error('hostname', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Model/Type</label>
                                    <input type="text" name="model" class="form-control" value="<?php echo $t->model ?>">
                                    <?php echo form_error('model', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>PCB Serial Number</label>
                                    <input type="text" name="pcb" class="form-control" value="<?php echo $t->pcb ?>">
                                    <?php echo form_error('pcb', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Assembly Serial Number</label>
                                    <input type="text" name="assembly" class="form-control" value="<?php echo $t->assembly ?>">
                                    <?php echo form_error('assembly', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>IP Address</label>
                                    <input type="text" name="ip_address" class="form-control" value="<?php echo $t->ip_address ?>">
                                    <?php echo form_error('ip_address', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Mac Address</label>
                                    <input type="text" name="mac_address" class="form-control" value="<?php echo $t->mac_address ?>">
                                    <?php echo form_error('mac_address', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Switch</label>
                                    <input type="text" name="switch" class="form-control" value="<?php echo $t->switch ?>">
                                    <?php echo form_error('switch', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Port</label>
                                    <input type="text" name="port" class="form-control" value="<?php echo $t->port ?>">
                                    <?php echo form_error('port', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('admin/accesspoint') ?>">
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