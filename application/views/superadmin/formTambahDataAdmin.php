                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="<?= base_url('superadmin/dataadmin/tambahData'); ?>">


                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control">
                                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Password</label>
                                        <input type="password" name="password1" id="password1" class="form-control">
                                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>

                                    </div>
                                    <div class="col-sm-6">
                                        <label>Ulangi Password</label>
                                        <input type="password" name="password2" id="password2" class="form-control">
                                        <?= form_error('password2', '<small class="text-danger">', '</small>') ?>

                                    </div>
                                </div>



                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('superadmin/dataadmin') ?>">
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