<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Mata Kuliah</h1>
    <p class="mb-4">Form untuk mengubah data mata kuliah.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Mata Kuliah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include "../db.php";
                $kd_matkul = $_GET['kd_matkul'];
                $db = new db;
                $matkul = $db->get_MatkulByKd($kd_matkul);
                $result = $matkul->fetch_array();
                ?>
                <form method="POST" id="formEditMatkul">
                    <div class="form-group">
                        <label>Nama Mata Kuliah</label>
                        <input type="hidden" class="form-control" name="kd_matkul" value="<?php echo $result['kd_matkul']; ?>">
                        <input type="text" class="form-control" name="nama" value="<?php echo $result['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>SKS</label>
                        <input type="text" class="form-control" name="sks" value="<?php echo $result['sks']; ?>" required>
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