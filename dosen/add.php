<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Dosen</h1>
    <p class="mb-4">Form untuk menambahkan data dosen baru.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Dosen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" id="formDosen">
                    <div class="form-group">
                        <label>Kode Dosen</label>
                        <input type="number" class="form-control" name="kd_dosen" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="simpanDosen">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="asset/js/demo/datatables-demo.js"></script>