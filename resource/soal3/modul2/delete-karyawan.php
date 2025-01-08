<?php
    include_once(__DIR__ . '/../../../app/data/Karyawan.php');
	$karyawan = new Karyawan();

	$id = $_GET['id'];

    $message = $karyawan->deleteKaryawan($id);

    if ($message == "success") {
		echo "
			<script>
				alert('Delete karyawan successfully');
				window.location.href = '" . $karyawan->getUrl() . "'" .
			"</script>";
	} else {
		echo "
			<script>
    			alert('". $message ."');
                window.location.href = '" . $karyawan->getUrl() . "'" .
			"</script>";

        var_dump($karyawan->conn->error);
	}

?>
