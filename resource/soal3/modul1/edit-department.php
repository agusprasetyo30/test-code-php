<?php
    $title = "Soal 3 - Modul 1";
    include_once('../../layouts/header.php'); 
    include_once(__DIR__ . '/../../../app/data/Department.php');
    
    $id = $_GET['id'];
    $department = new Department();

    $get_department = $department->query("SELECT * FROM department WHERE IDDept = '$id'")[0];
?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-6">
            <h1 class="fs-4">Edit Department</h1>    
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <input type="text" name="IDDept" value="<?= $get_department['IDDept'] ?>" hidden>
						<div class="mb-3">
							<label class="form-label" for="name">Nama Departemen</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama departemen" required value="<?=$get_department['nama_dept']?>">
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
        $message = $department->updateDepartment($_POST);

		if ($message == "success") {
			echo "
                <script>
                    alert('Update department successfully');
                    window.location.href = '" . $department->getUrl() . "'" .
                "</script>";
		} else {
            echo "
                <script>
                    alert('". $message ."');
                </script>";
        }
	}
?>
