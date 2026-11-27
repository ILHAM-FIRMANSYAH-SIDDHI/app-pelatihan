<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah KRS</h1>
    <p class="mb-4">Form untuk menambahkan data KRS baru.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form KRS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include "../db.php";
                $db = new db;
                ?>
                <form method="POST" id="formKrs">
                    <div class="form-group">
                        <label>Mahasiswa</label>
                        <select class="form-control" name="nim" required>
                            <option value="">-- Pilih Mahasiswa --</option>
                            <?php
                            $mhs = $db->get_allMhs();
                            while ($m = $mhs->fetch_array()) {
                                echo "<option value='".$m['nim']."'>".$m['nim']." - ".$m['nama']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jadwal Kuliah</label>
                        <select class="form-control" name="id_jadwal" required>
                            <option value="">-- Pilih Jadwal --</option>
                            <?php
                            $jadwal = $db->get_allJadwal();
                            while ($j = $jadwal->fetch_array()) {
                                echo "<option value='".$j['id']."'>".$j['nama_matkul']." (".$j['waktu'].", Ruang: ".$j['ruang'].")</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control" name="kd_semester" required>
                            <option value="">-- Pilih Semester --</option>
                            <?php
                            $semester = $db->get_allSemester();
                            while ($s = $semester->fetch_array()) {
                                echo "<option value='".$s['kd_semester']."'>".$s['semester']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="simpanKrs">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="asset/js/demo/datatables-demo.js"></script>