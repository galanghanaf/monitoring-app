                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <!-- /.container-fluid -->
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($dataadmin as $us) : ?>
                                <?php echo form_open_multipart('superadmin/dataadmin/updateDataAksi') ?>
                                <div class="form-group">
                                    <label>Email</label>

                                    <input hidden type="text" name="id" id="id" class="form-control" value="<?php echo $us->id ?>">
                                    <input hidden type="text" name="image" id="image" class="form-control" value="<?php echo $us->image ?>">
                                    <input hidden type="text" name="role_id" id="role_id" class="form-control" value="<?php echo $us->role_id ?>">
                                    <input hidden type="text" name="is_active" id="role_id" class="form-control" value="<?php echo $us->is_active ?>">
                                    <input hidden type="text" name="date_created" id="date_created" class="form-control" value="<?php echo $us->date_created ?>">
                                    <input type="text" readonly name="email" id="email" class="form-control" placeholder="Masukan Email" value="<?php echo $us->email ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Nama</label>
                                        <input autofocus type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama" value="<?php echo $us->name ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>


                                    </div>
                                    <div class="col-sm-6" id="togglePassword">

                                        <label>Password</label>

                                        <input autofocus type="password" style="cursor: pointer;" name="password" id="id_password" class="form-control" placeholder="Masukan Password" value="<?php echo $us->password ?>">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>

                                        <script>
                                            const togglePassword = document.querySelector('#togglePassword');
                                            const password = document.querySelector('#id_password');

                                            togglePassword.addEventListener('click', function(e) {
                                                // toggle the type attribute
                                                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                                password.setAttribute('type', type);

                                            });
                                        </script>
                                    </div>
                                </div>
                                <br>
                                <a onclick="return confirm('Apakah anda yakin membatalkan proses ini?')" class="btn btn-danger" href="<?php echo base_url('superadmin/dataadmin') ?>">
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