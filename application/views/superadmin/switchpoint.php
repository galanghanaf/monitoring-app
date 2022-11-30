<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?> <b class="text-primary"><?php echo $title2 ?></b></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3 font-weight-bold" href="<?php echo base_url('superadmin/switchpoint/tambahData') ?>">
        <i class="fas fa-plus"></i> Tambah Data</a>
    <a class="btn btn-sm btn-primary mb-3 float-right font-weight-bold" href="<?php echo base_url('superadmin/switchpoint/download') ?>">
        <i class="fas fa-download"></i> Download Data</a>
    <?php echo $this->session->flashdata('message') ?>

    <table class=" table-hover table table-bordered w-100" id="dataTablesSwitch">
        <thead>
            <tr>
                <th class="align-middle text-center bg-primary text-white" rowspan="2">No</th>
                <th class="no-sort align-middle text-center bg-primary text-white" rowspan="2">Status</th>

                <th class="no-sort align-middle text-center bg-primary text-white" rowspan="2">Asset Description</th>
                <th class="no-sort align-middle text-center bg-primary text-white" rowspan="2">Hostname</th>
                <th class="no-sort align-middle text-center bg-primary text-white" rowspan="2">Model</th>
                <th class="no-sort align-middle text-center bg-primary text-white" rowspan="2">Serial Number</th>
                <th class="no-sort align-middle text-center bg-primary text-white" rowspan="2">IP Address</th>
                <th class="no-sort align-middle text-center bg-primary text-white" rowspan="2">Mac Address</th>
                <th class="no-sort align-middle text-center bg-primary text-white" colspan="2">Up Link</th>
                <th class="no-sort align-middle text-center bg-warning text-white" rowspan="2">Update</th>
                <th class="no-sort align-middle text-center bg-danger text-white" rowspan="2">Delete</th>

            </tr>
            <tr>
                <th class="no-sort align-middle text-center bg-primary text-white">Switch</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Port</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($switchpoint as $row) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>

                    <?php

                    // Initialisierung der Ziele / Wenn Port leer -> ICMP (Ping), sonst Portcheck

                    $ServerList = array(
                        "Server1" => $row->ip_address,
                        "Port1" => NULL
                    );


                    for ($i = 1; $i <= (count($ServerList) / 2); $i++) {

                        $Server = $ServerList["Server" . $i];
                        $Port = $ServerList["Port" . $i];



                        // ICMP (Ping) oder Portcheck
                        if ($Port <> "") {
                            if (!$socket = @fsockopen($Server, $Port, $errno, $errstr, 30)) {
                                $tdStyle = '#e74a3b';
                                echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>Offline</td>";
                            } else {
                                $tdStyle = '#1cc88a';
                                echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>Online</td>";
                                fclose($socket);
                            }
                        } else {
                            $str = exec("ping -n 1 -w 1 " . $Server, $input, $result);
                            if ($result == 0) {
                                $tdStyle = '#1cc88a';
                                echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>Online</td>";
                            } else {
                                $tdStyle = '#e74a3b';
                                echo "<td class='text-center text-white' style='background-color:{$tdStyle};'>Offline</td>";
                            }
                        }
                    }

                    ?>


                    <td class="text-center"><?php echo $row->asset_description; ?></td>
                    <td class="text-center"><?php echo $row->hostname; ?></td>
                    <td class="text-center"><?php echo $row->model; ?></td>
                    <td class="text-center"><?php echo $row->serial_number; ?></td>
                    <td class="text-center"><?php echo $row->ip_address; ?></td>
                    <td class="text-center"><?php echo $row->mac_address; ?></td>
                    <td class="text-center"><?php echo $row->switch; ?></td>
                    <td class="text-center"><?php echo $row->port; ?></td>

                    <td>
                        <center>
                            <a class="btn btn-sm btn-warning" href="<?php echo base_url('superadmin/switchpoint/updateData/' . $row->id) ?>">
                                <i class="fas fa-edit"></i></a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a onclick="return confirm('Konfirmasi Penghapusan Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('superadmin/switchpoint/deleteData/' . $row->id) ?>">
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