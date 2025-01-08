<?php
    $title = "Soal 3 - Modul 1";
    include_once('../../layouts/header.php'); 
    include_once(__DIR__ . '/../../../app/data/Department.php');

    $department = new Department();
?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-6">
            <h1 class="fs-4">Create Department</h1>    
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
						<div class="mb-3">
							<label class="form-label" for="name">Nama Departemen</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama departemen" required>
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
        $message = $department->addDepartment($_POST);

		if ($message == "success") {
			echo "
                <script>
                    alert('Add department successfully');
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

<script>
    $(document).ready(function() {   
        // window.location.href = "<?=$department->getUrlBase()?>"
        // $('#kocak').append('<h2>yahahhha</h2>')
    })
</script>
