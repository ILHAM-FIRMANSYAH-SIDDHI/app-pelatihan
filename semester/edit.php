<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Semester</h1>
    <p class="mb-4">Form untuk mengubah data semester.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Semester</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include "../db.php";
                $kd_semester = $_GET['kd_semester'];
                $db = new db;
                $semester = $db->get_SemesterByKd($kd_semester);
                $result = $semester->fetch_array();
                ?>
                <form method="POST" id="formEditSemester">
                    <div class="form-group">
                        <label>Kode Semester</label>
                        <input type="text" class="form-control" value="<?php echo $result['kd_semester']; ?>" disabled>
                        <input type="hidden" class="form-control" name="kd_semester" value="<?php echo $result['kd_semester']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input type="text" class="form-control" name="semester" value="<?php echo $result['semester']; ?>" required>
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