<?php

class db
{
    private $koneksi;

    function __construct()
    {
        $host = "127.0.0.1";
        $port = 3307;
        $user = "root";
        $pass = "ilhamsiddhi";
        $db   = "db_pelatihan";

        $this->koneksi = new mysqli($host, $user, $pass, $db, $port);

        if ($this->koneksi->connect_error) {
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }

    function get_user($username, $password)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tbl_user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $stmt->get_result();
    }

    function get_allMhs()
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_mahasiswa");
        return $data;
    }

    function add_mhs($nim, $nama, $alamat, $jurusan)
    {
        $stmt = $this->koneksi->prepare("INSERT INTO tbl_mahasiswa (nim, nama, alamat, Jurusan) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $nim, $nama, $alamat, $jurusan);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function update_mhs($nim, $nama, $alamat, $jurusan)
    {
        $stmt = $this->koneksi->prepare("UPDATE tbl_mahasiswa SET nama = ?, alamat = ?, Jurusan = ? WHERE nim = ?");
        $stmt->bind_param("sssi", $nama, $alamat, $jurusan, $nim);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_MhdByNim($nim)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tbl_mahasiswa WHERE nim = ?");
        $stmt->bind_param("i", $nim);
        $stmt->execute();
        return $stmt->get_result();
    }

    function del_mhs($nim)
    {
        $stmt = $this->koneksi->prepare("DELETE FROM tbl_mahasiswa WHERE nim = ?");
        $stmt->bind_param("i", $nim);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_allDosen()
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_dosen");
        return $data;
    }

    function add_dosen($kd_dosen, $nama, $alamat)
    {
        $stmt = $this->koneksi->prepare("INSERT INTO tbl_dosen (kd_dosen, nama, alamat) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $kd_dosen, $nama, $alamat);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function update_dosen($kd_dosen, $nama, $alamat)
    {
        $stmt = $this->koneksi->prepare("UPDATE tbl_dosen SET nama = ?, alamat = ? WHERE kd_dosen = ?");
        $stmt->bind_param("ssi", $nama, $alamat, $kd_dosen);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_DosenByKd($kd_dosen)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tbl_dosen WHERE kd_dosen = ?");
        $stmt->bind_param("i", $kd_dosen);
        $stmt->execute();
        return $stmt->get_result();
    }

    function del_dosen($kd_dosen)
    {
        $stmt = $this->koneksi->prepare("DELETE FROM tbl_dosen WHERE kd_dosen = ?");
        $stmt->bind_param("i", $kd_dosen);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_allMatkul()
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_matkul");
        return $data;
    }

    function add_matkul($kd_matkul, $nama, $sks)
    {
        $stmt = $this->koneksi->prepare("INSERT INTO tbl_matkul (kd_matkul, nama, sks) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $kd_matkul, $nama, $sks);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function update_matkul($kd_matkul, $nama, $sks)
    {
        $stmt = $this->koneksi->prepare("UPDATE tbl_matkul SET nama = ?, sks = ? WHERE kd_matkul = ?");
        $stmt->bind_param("ssi", $nama, $sks, $kd_matkul);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_MatkulByKd($kd_matkul)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tbl_matkul WHERE kd_matkul = ?");
        $stmt->bind_param("i", $kd_matkul);
        $stmt->execute();
        return $stmt->get_result();
    }

    function del_matkul($kd_matkul)
    {
        $stmt = $this->koneksi->prepare("DELETE FROM tbl_matkul WHERE kd_matkul = ?");
        $stmt->bind_param("i", $kd_matkul);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_allSemester()
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_semester");
        return $data;
    }

    function add_semester($kd_semester, $semester)
    {
        $stmt = $this->koneksi->prepare("INSERT INTO tbl_semester (kd_semester, semester) VALUES (?, ?)");
        $stmt->bind_param("is", $kd_semester, $semester);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function update_semester($kd_semester, $semester)
    {
        $stmt = $this->koneksi->prepare("UPDATE tbl_semester SET semester = ? WHERE kd_semester = ?");
        $stmt->bind_param("si", $semester, $kd_semester);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_SemesterByKd($kd_semester)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tbl_semester WHERE kd_semester = ?");
        $stmt->bind_param("i", $kd_semester);
        $stmt->execute();
        return $stmt->get_result();
    }

    function del_semester($kd_semester)
    {
        $stmt = $this->koneksi->prepare("DELETE FROM tbl_semester WHERE kd_semester = ?");
        $stmt->bind_param("i", $kd_semester);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_allJadwal()
    {
        $data = $this->koneksi->query("SELECT tbl_jadwal.*, tbl_dosen.nama as nama_dosen, tbl_matkul.nama as nama_matkul FROM tbl_jadwal JOIN tbl_dosen ON tbl_jadwal.kd_dosen = tbl_dosen.kd_dosen JOIN tbl_matkul ON tbl_jadwal.kd_matkul = tbl_matkul.kd_matkul");
        return $data;
    }

    function add_jadwal($kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        $stmt = $this->koneksi->prepare("INSERT INTO tbl_jadwal (kd_dosen, kd_matkul, waktu, ruang) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $kd_dosen, $kd_matkul, $waktu, $ruang);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function update_jadwal($id, $kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        $stmt = $this->koneksi->prepare("UPDATE tbl_jadwal SET kd_dosen = ?, kd_matkul = ?, waktu = ?, ruang = ? WHERE id = ?");
        $stmt->bind_param("iissi", $kd_dosen, $kd_matkul, $waktu, $ruang, $id);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_JadwalById($id)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tbl_jadwal WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    function del_jadwal($id)
    {
        $stmt = $this->koneksi->prepare("DELETE FROM tbl_jadwal WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_allKrs()
    {
        $data = $this->koneksi->query("SELECT tbl_krs.*, tbl_mahasiswa.nama as nama_mhs, tbl_semester.semester FROM tbl_krs JOIN tbl_mahasiswa ON tbl_krs.nim = tbl_mahasiswa.nim JOIN tbl_semester ON tbl_krs.kd_semester = tbl_semester.kd_semester");
        return $data;
    }

    function add_krs($nim, $id_jadwal, $kd_semester)
    {
        $stmt = $this->koneksi->prepare("INSERT INTO tbl_krs (nim, id_jadwal, kd_semester) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $nim, $id_jadwal, $kd_semester);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function update_krs($id, $nim, $id_jadwal, $kd_semester)
    {
        $stmt = $this->koneksi->prepare("UPDATE tbl_krs SET nim = ?, id_jadwal = ?, kd_semester = ? WHERE id = ?");
        $stmt->bind_param("iiii", $nim, $id_jadwal, $kd_semester, $id);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function get_KrsById($id)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tbl_krs WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    function del_krs($id)
    {
        $stmt = $this->koneksi->prepare("DELETE FROM tbl_krs WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        return true;
    }
}