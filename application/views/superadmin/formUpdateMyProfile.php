                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <br>
                    <br>
                    <!-- /.container-fluid -->
                    <div class="card">
                        <center>

                            <br>
                            <br>
                            <br>
                            <h1 class="h1 mb-0 text-gray-800 font-weight-bold"><?php echo $title ?></h1>

                            <div class="card-body w-75">
                                <br>
                                <form method="post" action="<?= base_url('superadmin/myprofile/edit'); ?>">
                                    <div class="form-group">
                                        <input readonly type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Email Address" value="<?= $user['email']; ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input autofocus type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Nama" value="<?= $user['name']; ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <button onclick="return confirm('Konfirmasi Untuk Mengubah Data Profil')" type="submit" class="btn btn-success font-weight-bold btn-lg">Simpan</button>

                                </form>
                            </div>
                        </center>
                        <br>
                    </div>
                </div>
                </div>


                <br>
                <br>
                <br>
                <!-- End of Main Content -->