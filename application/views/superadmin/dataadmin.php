<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3 font-weight-bold" href="<?php echo base_url('superadmin/dataadmin/tambahData') ?>">
        <i class="fas fa-plus"></i> Tambah Data</a>
    <a class="btn btn-sm btn-primary mb-3 float-right font-weight-bold" href="<?php echo base_url('superadmin/dataadmin/download') ?>">
        <i class="fas fa-download"></i> Download Data</a>

    <?php echo $this->session->flashdata('message') ?>
    <table class=" table-hover table table-bordered w-100" id="dataTablesDataAdmin">

        <thead>

            <tr>
                <th class="no-sort align-middle text-center bg-primary text-white">No</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Name</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Email</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Dibuat</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Diubah</th>
                <th class="no-sort align-middle text-center bg-warning text-white">Update</th>
                <th class="no-sort align-middle text-center bg-danger text-white">Delete</th>


            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($dataadmin as $row) : ?>
                <?php if ($row->role_id == '1') { ?>
                <?php } elseif ($row->role_id == '2') { ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $row->name; ?></td>
                        <td class="text-center"><?php echo $row->email; ?></td>
                        <td class="text-center"><?php echo date("d/m/Y", $row->date_created); ?></td>
                        <td class="text-center"><?php echo date("d/m/Y", $row->date_changed); ?></td>

                        <td>
                            <center>
                                <a class="btn btn-sm btn-warning mr-2" href="<?php echo base_url('superadmin/dataadmin/updateData/' . $row->id) ?>">
                                    <i class="fas fa-edit"></i></a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <a onclick="return confirm('Konfirmasi Penghapusan Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('superadmin/dataadmin/deleteData/' . $row->id) ?>">
                                    <i class="fas fa-trash"></i></a>
                            </center>
                        </td>


                    </tr>
                <?php } ?>
            <?php endforeach; ?>
        </tbody>

    </table>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->