                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($task_list as $t) : ?>

                                <?php echo form_open_multipart('superadmin/tasklist/updateDataAksi') ?>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $t->id ?>">
                                    <input type="text" name="description" class="form-control" value="<?php echo $t->description ?>">
                                    <?php echo form_error('description', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Requester</label>
                                    <input type="text" name="requester" class="form-control" value="<?php echo $t->requester ?>">
                                    <?php echo form_error('requester', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="<?php echo $t->start_date ?>">
                                    <?php echo form_error('start_date', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input type="date" name="due_date" class="form-control" value="<?php echo $t->due_date ?>">
                                    <?php echo form_error('due_date', '<div class="text small text-danger"></div>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="<?php echo $t->status ?>"><?php echo $t->status ?></option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                    <?php echo form_error('status', '<div class="text small text-danger"></div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <input type="text" name="notes" class="form-control" value="<?php echo $t->notes ?>">
                                    <?php echo form_error('notes', '<div class="text small text-danger"></div>') ?>
                                </div>

                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('superadmin/tasklist') ?>">
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