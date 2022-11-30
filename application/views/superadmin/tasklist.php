<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?> <b class="text-primary"><?php echo $title2 ?></b></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3 font-weight-bold" href="<?php echo base_url('superadmin/tasklist/tambahData') ?>">
        <i class="fas fa-plus"></i> Tambah Data</a>
    <a class="btn btn-sm btn-primary mb-3 float-right font-weight-bold" href="<?php echo base_url('superadmin/tasklist/download') ?>">
        <i class="fas fa-download"></i> Download Data</a>
    <?php echo $this->session->flashdata('message') ?>
    <table class=" table-hover table table-bordered w-100" id="dataTablesTaskList">
        <thead>
            <tr>
                <th class="align-middle text-center bg-primary text-white">No</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Status</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Description</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Requester</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Start Date</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Due Date</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Days Remaining</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Notes</th>
                <th class="no-sort align-middle text-center bg-warning text-white">Update</th>
                <th class="no-sort align-middle text-center bg-danger text-white">Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($task_list as $row) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <?php
                    if ($row->status == 'Completed') {
                        $tdStyle = '#1cc88a';
                        echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>Completed</td>";
                    } elseif (date('Y-m-d') > $row->due_date) {
                        $tdStyle = '#e74a3b';
                        echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>Overdue</td>";
                    } else {
                        echo "<td class='text-center'>In Progress</td>";
                    }

                    ?>


                    <td class="text-center"><?php echo $row->description; ?></td>
                    <td class="text-center"><?php echo $row->requester; ?></td>
                    <td class="align-middle text-center"><?php echo date('d/m/Y', strtotime($row->start_date)); ?></td>
                    <td class="align-middle text-center"><?php echo date('d/m/Y', strtotime($row->due_date)); ?></td>


                    <?php
                    $date1 = new DateTime(date('Y-m-d')); //current date or any date
                    $date2 = new DateTime($row->due_date); //Future date
                    $diff = $date2->diff($date1)->format("%a"); //find difference
                    $days = intval($diff); //rounding days
                    if ($row->status == "Completed") {
                        $tdStyle = '#1cc88a';
                        echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>Completed</td>";
                    } elseif (date('Y-m-d') > $row->due_date) {

                        echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>- $days</td>";
                    } else {

                        echo "<td class='text-center'>$days</td>";
                    }
                    ?>

                    <td class="text-center"><?php echo $row->notes; ?></td>


                    <td>
                        <center>
                            <a class="btn btn-sm btn-warning" href="<?php echo base_url('superadmin/tasklist/updateData/' . $row->id) ?>">
                                <i class="fas fa-edit"></i></a>

                        </center>
                    </td>
                    <td>
                        <center>

                            <a onclick="return confirm('Konfirmasi Penghapusan Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('superadmin/tasklist/deleteData/' . $row->id) ?>">
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
<!-- End of Main Content -->