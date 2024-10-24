<?php 
    $id = $_GET['id'];

    if(isset($_POST['nama_pelanggan'])) {
        $nama = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $no_telepon = $_POST['no_telepon'];

        $query = mysqli_query($koneksi, "UPDATE pelanggan set nama_pelanggan='$nama', alamat='$alamat', no_telepon='$no_telepon' WHERE id_pelanggan=$id");

        if($query) {
            echo '<script>alert("Edit Data Berhasil!"); location.href="?page=pelanggan";</script>';
        } else {
            echo '<script>alert("Edit Data Gagal!")</script>';
        }
    }
    $query = mysqli_query($koneksi, "SELECT*FROM pelanggan WHERE id_pelanggan=$id");
    $data = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
        <a href="#" class="d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
        
        <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
    </div>

    <form method="post">
        <table class="table table-borderless">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td><input type="text" value="<?php echo $data['nama_pelanggan']; ?>" class="form-control" name="nama_pelanggan"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                <textarea name="alamat" rows="5" class="form-control"><?php echo $data['alamat']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td><input type="number" class="form-control" value="<?php echo $data['no_telepon']; ?>" step="0" name="no_telepon"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>

    </form>

    </div>

    