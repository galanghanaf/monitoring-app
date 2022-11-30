                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?= base_url('superadmin/logbook/tambahData'); ?>">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <input type="text" name="department" class="form-control">
                                    <?= form_error('department', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Equipment</label>
                                    <input type="text" name="equipment" class="form-control">
                                    <?= form_error('equipment', '<small class="text-danger">', '</small>') ?>
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
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control">
                                    <?= form_error('description', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control">
                                    <?= form_error('date', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Return</label>
                                    <input type="date" name="return" class="form-control">
                                    <?= form_error('return', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('superadmin/logbook') ?>">
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