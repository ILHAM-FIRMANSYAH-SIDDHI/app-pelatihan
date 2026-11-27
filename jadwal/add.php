<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal</h1>
    <p class="mb-4">Form untuk menambahkan data jadwal baru.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Jadwal</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include "../db.php";
                $db = new db;
                ?>
                <form method="POST" id="formJadwal">
                    <div class="form-group">
                        <label>Dosen</label>
                        <select class="form-control" name="kd_dosen" required>
                            <option value="">-- Pilih Dosen --</option>
                            <?php
                            $dosen = $db->get_allDosen();
                            while ($d = $dosen->fetch_array()) {
                                echo "<option value='".$d['kd_dosen']."'>".$d['nama']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <select class="form-control" name="kd_matkul" required>
                            <option value="">-- Pilih Mata Kuliah --</option>
                            <?php
                            $matkul = $db->get_allMatkul();
                            while ($m = $matkul->fetch_array()) {
                                echo "<option value='".$m['kd_matkul']."'>".$m['nama']." (".$m['sks']." SKS)</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input type="text" class="form-control" name="waktu" placeholder="Contoh: Senin, 08:00 - 10:30" required>
                    </div>
                    <div class="form-group">
                        <label>Ruang</label>
                        <input type="text" class="form-control" name="ruang" placeholder="Contoh: Lab Komputer 1" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="simpanJadwal">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="asset/js/demo/datatables-demo.js"></script>