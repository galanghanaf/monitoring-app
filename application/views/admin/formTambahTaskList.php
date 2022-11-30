                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?= base_url('admin/tasklist/tambahData'); ?>">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control">
                                    <?= form_error('description', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Requester</label>
                                    <input type="text" name="requester" class="form-control">
                                    <?= form_error('requester', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                    <?= form_error('start_date', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input type="date" name="due_date" class="form-control">
                                    <?= form_error('due_date', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="status" value="In Progress" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <input type="text" name="notes" class="form-control">
                                    <?= form_error('notes', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('admin/tasklist') ?>">
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