<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Dosen</h1>
    <p class="mb-4">Form untuk mengubah data dosen.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Dosen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include "../db.php";
                $kd_dosen = $_GET['kd_dosen'];
                $db = new db;
                $dosen = $db->get_DosenByKd($kd_dosen);
                $result = $dosen->fetch_array();
                ?>
                <form method="POST" id="formEditDosen">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" class="form-control" name="kd_dosen" value="<?php echo $result['kd_dosen']; ?>">
                        <input type="text" class="form-control" name="nama" value="<?php echo $result['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $result['alamat']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="asset/js/demo/datatables-demo.js"></script>