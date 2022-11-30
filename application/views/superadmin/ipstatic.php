<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?> <b class="text-primary"><?php echo $title2 ?></b></h1>
    </div>




    <a class="btn btn-sm btn-success mb-3 text-white font-weight-bold" href="<?php echo base_url('superadmin/ipstatic/tambahData') ?>">
        <i class="fas fa-plus"></i> Tambah Data</a>
    <a class="btn btn-sm btn-primary mb-3 float-right font-weight-bold" href="<?php echo base_url('superadmin/ipstatic/download') ?>">
        <i class="fas fa-download"></i> Download Data</a>
    <?php echo $this->session->flashdata('message') ?>


    <table class=" table-hover table table-bordered w-100" id="dataTablesLogBook">
        <thead>
            <tr>
                <th class="align-middle text-center bg-primary text-white">No</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Status</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Port</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Ip Address</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Mac Address</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Hostname</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Manufacture</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Model/Type</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Serial Number</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Asset Number</th>
                <th class="no-sort align-middle text-center bg-primary text-white">User</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Password</th>
                <th class="no-sort align-middle text-center bg-warning text-white">Update</th>
                <th class="no-sort align-middle text-center bg-danger text-white">Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($ipstatic as $row) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>

                    <?php

                    // Initialisierung der Ziele / Wenn Port leer -> ICMP (Ping), sonst Portcheck

                    $ServerList = array(
                        "Server1" => $row->ip_address,
                        "Port1" => $row->port
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

                    <td class="text-center"><?php echo $row->port; ?></td>
                    <td class="text-center"><?php echo $row->ip_address; ?></td>
                    <td class="text-center"><?php echo $row->mac_address; ?></td>
                    <td class="text-center"><?php echo $row->host_name; ?></td>
                    <td class="text-center"><?php echo $row->manufacture; ?></td>
                    <td class="text-center"><?php echo $row->model; ?></td>
                    <td class="text-center"><?php echo $row->serial_number; ?></td>
                    <td class="text-center"><?php echo $row->asset_number; ?></td>
                    <td class="text-center"><?php echo $row->user; ?></td>
                    <td class="text-center"><?php echo $row->password; ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-warning" href="<?php echo base_url('superadmin/ipstatic/updateData/' . $row->id) ?>">
                                <i class="fas fa-edit"></i></a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a onclick="return confirm('Konfirmasi Penghapusan Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('superadmin/ipstatic/deleteData/' . $row->id) ?>">
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