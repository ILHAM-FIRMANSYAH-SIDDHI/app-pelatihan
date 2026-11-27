<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Mata Kuliah</h1>
    <p class="mb-4">Form untuk menambahkan data mata kuliah baru.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Mata Kuliah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" id="formMatkul">
                    <div class="form-group">
                        <label>Kode Mata Kuliah</label>
                        <input type="number" class="form-control" name="kd_matkul" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>SKS</label>
                        <input type="text" class="form-control" name="sks" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="simpanMatkul">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="asset/js/demo/datatables-demo.js"></script>