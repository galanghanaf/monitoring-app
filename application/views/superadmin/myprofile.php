<!-- Begin Page Content -->
<div class="container-fluid ">




    <div class="container py-5">
        <!-- Page Heading -->
        <br>
        <br>

        <div class="mb-5 ml-4 text-gray-800 font-weight-bold text-center">
            <h1 class="h1 mb-5 ml-5 text-gray-800 font-weight-bold text-left">My Profile</h1>
        </div>
        <?php echo $this->session->flashdata('message') ?>


        <div class="row">

            <div class="col-lg">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <br>
                        <br>
                        <a href="<?= base_url('superadmin/myprofile/edit') ?>"><img class="img-profile rounded-circle" src="<?= base_url('assets/img/') . $user['image']; ?>" style="width: 140px; height: 140px;"></a>


                        <br>
                        <br>


                        <div class="d-flex justify-content-center mb-2">
                            <a class="btn btn-primary mt-2 mb-3" href="<?= base_url('superadmin/myprofile/edit') ?>">
                                <b>Ubah My Profile</b></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 ">Nama</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $user['name']; ?></p>
                            </div>
                        </div>
                        <hr>


                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $user['email'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">Status</p>
                            </div>
                            <div class="col-sm-9">
                                <?php if ($user['role_id'] == '1') { ?>
                                    <p class="text-muted mb-0 ">Super Admin</p>
                                <?php } elseif ($user['role_id'] == '2') { ?>
                                    <p class="text-muted mb-0 ">Admin</p>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">Dibuat</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= date("d/m/Y", $user['date_created']); ?></p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">Password</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group" id="togglePassword">
                                    <input type="password" style="cursor: pointer;" name="password" class="form-control" id="id_password" readonly value="<?= $user['password'] ?>">

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
                        </div>

                    </div>
                </div>




            </div>

        </div>

    </div>
</div>
</div>