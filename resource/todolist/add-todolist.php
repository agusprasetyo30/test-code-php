<?php
// ini_set('display_errors', 1);

include(__DIR__ . '/../../app/data/TodoList.php');
$title = "Tambah Todolist";
$data = new TodoList();

include('../layouts/header.php');
// print_r($data->pagination(4, "SELECT * FROM makanan"));

?>

<div class="row justify-content-center mt-3">
	<div class="col-md-8">
	<h3 class="text-center m-3">Tambah Customer & Transaksi</h3>
		<div class="row justify-content-center">
			<div class="col-md-7 border p-3">
				<div class="form-group">
					<form action="" method="post">
						<div class="form-group">
							<small for="name">Nama</small>
							<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama todolist" required>
						</div>
						<div class="form-group">
							<small for="description">Description</small>
							<textarea name="description" id="description" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<small for="date">Nama</small>
							<input type="date"  name="date" id="date" class="form-control" required>
						</div>
						<div class="form-group float-right">
							<a href="../../" class="btn btn-sm btn-warning">Kembali</a>
							<input type="submit" name="simpan" class="btn btn-sm btn-success " value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

	include_once('../layouts/footer.php');
?>

<script>
	$(document).ready(function() {
		$('#pesan-makanan').select2({
			placeholder: 'Masukan makanan yang dibeli',
		});
	})

</script>

<?php
	if (isset($_POST['simpan'])) {
		// echo '<pre>';
		// 	print_r($_POST);
		// echo '</pre>';

		if ($data->addTodoList($_POST)) {
			echo "
					<script>
						alert('Tambah Sukses');
						window.location.href = '" . $data->getUrlBase() . "'" .
					"</script>";
		}
	}
?>
