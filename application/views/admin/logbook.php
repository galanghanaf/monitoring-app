<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?> <b class="text-primary"><?php echo $title2 ?></b></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3 font-weight-bold" href="<?php echo base_url('admin/logbook/tambahData') ?>">
        <i class="fas fa-plus"></i> Tambah Data</a>
    <a class="btn btn-sm btn-primary mb-3 float-right font-weight-bold" href="<?php echo base_url('admin/logbook/download') ?>">
        <i class="fas fa-download"></i> Download Data</a>
    <?php echo $this->session->flashdata('message') ?>

    <table class=" table-hover table table-bordered w-100" id="dataTablesLogBook">
        <thead>
            <tr>
                <th class="align-middle text-center bg-primary text-white">No</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Status</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Name</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Department</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Equipment</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Asset Number</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Serial Number</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Description</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Date</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Return</th>
                <th class="no-sort align-middle text-center bg-warning text-white">Update</th>
                <th class="no-sort align-middle text-center bg-danger text-white">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($logbook as $row) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>

                    <?php
                    if ($row->return == '') {

                        echo "<td class='text-center'>In Porgress</td>";
                    } elseif ($row->return > '') {
                        $tdStyle = '#1cc88a';
                        echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>Completed</td>";
                    }

                    ?>

                    <td class="align-middle text-center"><?php echo $row->name; ?></td>
                    <td class="align-middle text-center"><?php echo $row->department; ?></td>
                    <td class="align-middle text-center"><?php echo $row->equipment; ?></td>
                    <td class="align-middle text-center"><?php echo $row->asset_number; ?></td>
                    <td class="align-middle text-center"><?php echo $row->serial_number; ?></td>
                    <td class="align-middle text-center"><?php echo $row->description; ?></td>
                    <td class="align-middle text-center"><?php echo date('d/m/Y', strtotime($row->date)); ?></td>
                    <td class="align-middle text-center"><?php
                                                            if ($row->return == '') {

                                                                echo "";
                                                            } else {

                                                                echo date('d/m/Y', strtotime($row->return));
                                                            }

                                                            ?></td>


                    <td>
                        <center>
                            <a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/logbook/updateData/' . $row->id) ?>">
                                <i class="fas fa-edit"></i></a>

                        </center>
                    </td>

                    <td>
                        <center>

                            <a onclick="return confirm('Konfirmasi Penghapusan Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/logbook/deleteData/' . $row->id) ?>">
                                <i class="fas fa-trash"></i></a>
                        </center>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<br>
<br>
<br>
<!-- End of Main Content -->