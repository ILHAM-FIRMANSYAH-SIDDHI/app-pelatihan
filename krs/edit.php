<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit KRS</h1>
    <p class="mb-4">Form untuk mengubah data KRS.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form KRS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include "../db.php";
                $id = $_GET['id'];
                $db = new db;
                $krs = $db->get_KrsById($id);
                $result = $krs->fetch_array();
                ?>
                <form method="POST" id="formEditKrs">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <div class="form-group">
                        <label>Mahasiswa</label>
                        <select class="form-control" name="nim" required>
                            <?php
                            $mhs = $db->get_allMhs();
                            while ($m = $mhs->fetch_array()) {
                                $selected = ($m['nim'] == $result['nim']) ? 'selected' : '';
                                echo "<option value='".$m['nim']."' $selected>".$m['nim']." - ".$m['nama']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jadwal Kuliah</label>
                        <select class="form-control" name="id_jadwal" required>
                            <?php
                            $jadwal = $db->get_allJadwal();
                            while ($j = $jadwal->fetch_array()) {
                                $selected = ($j['id'] == $result['id_jadwal']) ? 'selected' : '';
                                echo "<option value='".$j['id']."' $selected>".$j['nama_matkul']." (".$j['waktu'].", Ruang: ".$j['ruang'].")</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control" name="kd_semester" required>
                            <?php
                            $semester = $db->get_allSemester();
                            while ($s = $semester->fetch_array()) {
                                $selected = ($s['kd_semester'] == $result['kd_semester']) ? 'selected' : '';
                                echo "<option value='".$s['kd_semester']."' $selected>".$s['semester']."</option>";
                            }
                            ?>
                        </select>
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