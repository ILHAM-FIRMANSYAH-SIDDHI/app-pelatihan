<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Jadwal</h1>
    <p class="mb-4">Form untuk mengubah data jadwal.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Jadwal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include "../db.php";
                $id = $_GET['id'];
                $db = new db;
                $jadwal = $db->get_JadwalById($id);
                $result = $jadwal->fetch_array();
                ?>
                <form method="POST" id="formEditJadwal">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <div class="form-group">
                        <label>Dosen</label>
                        <select class="form-control" name="kd_dosen" required>
                            <?php
                            $dosen = $db->get_allDosen();
                            while ($d = $dosen->fetch_array()) {
                                $selected = ($d['kd_dosen'] == $result['kd_dosen']) ? 'selected' : '';
                                echo "<option value='".$d['kd_dosen']."' $selected>".$d['nama']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <select class="form-control" name="kd_matkul" required>
                            <?php
                            $matkul = $db->get_allMatkul();
                            while ($m = $matkul->fetch_array()) {
                                $selected = ($m['kd_matkul'] == $result['kd_matkul']) ? 'selected' : '';
                                echo "<option value='".$m['kd_matkul']."' $selected>".$m['nama']." (".$m['sks']." SKS)</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input type="text" class="form-control" name="waktu" value="<?php echo $result['waktu']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Ruang</label>
                        <input type="text" class="form-control" name="ruang" value="<?php echo $result['ruang']; ?>" required>
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