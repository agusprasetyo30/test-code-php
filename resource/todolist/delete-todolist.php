<?php
	include(__DIR__ . '/../../app/data/TodoList.php');
	$data = new TodoList();

	$id = $_GET['id'];

	if ($data->deleteTodolist($id) > 0) {
		echo "
			<script>
				alert('Hapus Sukses');
				window.location.href = '" . $data->getUrlBase() . "'" .
			"</script>";
	} else {
		echo "
			<script>
			alert('Hapus data gagal');
			// document.location.href = 'jenisbarang.php';
			</script>
		";
		echo("<br>");
		var_dump(mysqli_error($koneksi));
	}

?>
