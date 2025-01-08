<?php
    $title = "Soal 3 - Modul 1";
    include_once('../../layouts/header.php'); 
    include_once(__DIR__ . '/../../../app/data/Department.php');
    include_once(__DIR__ . '/../../../app/data/Karyawan.php');

    $karyawan = new Karyawan();
?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 80px;">
        <div class="col-6">
            <h1 class="fs-4">Create Karyawan</h1>    
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="mb-2">
                                    <label class="form-label" for="name">Nama Karyawan</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama karyawan" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="department">Department</label>
                                    <select name="department" id="department" class="form-select">
                                        <option selected disabled>Pilih Department</option>
                                        <?php 
                                            foreach ((new Department())->getDepartment() as $key => $value) {
                                                echo "<option value='{$value['IDDept']}'>{$value['nama_dept']}</option>";
                                            } 
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="no_ktp">No. KTP</label>
                                    <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="Masukan nomer KTP" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="no_telepon">Nomer Telepon</label>
                                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="Masukan nomer telepon" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                    <label class="form-label" for="tempat_tinggal">Tempat Tinggal</label>
                                    <input type="text" name="tempat_tinggal" id="tempat_tinggal" class="form-control" placeholder="Masukan tempat tinggal" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Masukan tanggal lahir" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" placeholder="Masukan tanggal masuk" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="penempatan">Penempatan</label>
                                    <select name="penempatan" id="penempatan" class="form-select">
                                        <option value="surabaya">Surabaya</option>
                                        <option value="gresik">Gresik</option>
                                        <option value="nganjuk">Nganjuk</option>
                                        <option value="jakarta">Jakarta</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm" name="simpan">Simpan</button>
                        <a href="./" class="btn btn-warning btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once('../../layouts/footer.php');
    
    if (isset($_POST['simpan'])) {

        $message = $karyawan->addKaryawan($_POST);

		if ($message == "success") {
			echo "
                <script>
                    alert('Add karyawan successfully');
                    window.location.href = '" . $karyawan->getUrl() . "'" .
                "</script>";
		} else {
            echo "
                <script>
                    alert('". $message ."');
                </script>";
        }
	}
?>