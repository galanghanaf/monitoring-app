<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?> <b class="text-primary"><?php echo $title2 ?></b></h1>
    </div>

    <div id="map" style="height: 600px;"></div>
    <script>
        var map = L.map('map').setView([-6.434244857960943, 106.92771446855967], 18);

        var tiles = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        <?php foreach ($mapitasset as $t) : ?>
            L.marker([<?php echo $t['latitude']; ?>, <?php echo $t['longitude']; ?>]).addTo(map)
                .bindPopup('Asset Number : <b><?php echo $t['asset_number']; ?></b><br/>Asset Description : <b><?php echo $t['asset_description']; ?></b><br/>Serial Number : <b><?php echo $t['serial_number']; ?></b><br/>Model/Type : <b><?php echo $t['model']; ?></b><br/>Location : <b><?php echo $t['location']; ?></b><br/><br/> <center><img src="<?php echo base_url() . 'assets/team/' . $t['photo']; ?>" width="200px"></center> ');
        <?php endforeach; ?>
    </script>
    <br>

    <a class="btn btn-sm btn-success mb-3 font-weight-bold" href="<?php echo base_url('admin/itasset/tambahData') ?>">
        <i class="fas fa-plus"></i> Tambah Data</a>
    <a class="btn btn-sm btn-primary mb-3 float-right font-weight-bold" href="<?php echo base_url('admin/itasset/download') ?>">
        <i class="fas fa-download"></i> Download Data</a>
    <?php echo $this->session->flashdata('message') ?>

    <table class=" table-hover table table-bordered w-100" id="dataTablesItAsset">
        <thead>
            <tr>
                <th class="align-middle text-center bg-primary text-white">No</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Asset Description</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Asset Number</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Serial Number</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Model/Type</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Location</th>
                <th class="no-sort align-middle text-center bg-primary text-white">Mac Address</th>
                <th class="no-sort align-middle text-center bg-primary text-white">IP Address</th>
                <th class="no-sort align-middle text-center bg-warning text-white">Update</th>
                <th class="no-sort align-middle text-center bg-danger text-white">Delete</th>

        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($itasset as $row) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="text-center"><?php echo $row->asset_description; ?></td>
                    <td class="text-center"><?php echo $row->asset_number; ?></td>
                    <td class="text-center"><?php echo $row->serial_number; ?></td>
                    <td class="text-center"><?php echo $row->model; ?></td>
                    <td class="text-center"><?php echo $row->location; ?></td>
                    <td class="text-center"><?php echo $row->mac_address; ?></td>
                    <td class="text-center"><?php echo $row->ip_address; ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/itasset/updateData/' . $row->id) ?>">
                                <i class="fas fa-edit"></i></a>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a onclick="return confirm('Konfirmasi Penghapusan Data')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/itasset/deleteData/' . $row->id) ?>">
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