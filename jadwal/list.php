<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Jadwal Kuliah</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>
        </div>
        <div class="card-body">
        <button class="btn btn-info btn-user" id="addJadwal" style="margin-bottom: 30px;">Tambah</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Mata Kuliah</th>
                            <th>Waktu</th>
                            <th>Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include "../db.php";
                    $db = new db;
                    $jadwal = $db->get_allJadwal();
                    $no = 1;
                    while ($result = $jadwal->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $result['nama_dosen']; ?></td>
                            <td><?php echo $result['nama_matkul']; ?></td>
                            <td><?php echo $result['waktu']; ?></td>
                            <td><?php echo $result['ruang']; ?></td>
                            <td>
                                <button class="btn btn-success btn-user" id="editJadwal" value="<?php echo $result['id']; ?>">Edit</button>
                                <button class="btn btn-danger btn-user" id="deleteJadwal" value="<?php echo $result['id']; ?>">Delete</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="asset/js/demo/datatables-demo.js"></script>
<script>
    $(document).ready(function(){  
        $("#addJadwal").click(function(){
            $.ajax({
                url: 'jadwal/add.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });  
    });
</script>