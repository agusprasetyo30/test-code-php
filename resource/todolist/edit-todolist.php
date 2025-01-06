<?php
// ini_set('display_errors', 1);

include(__DIR__ . '/../../app/data/TodoList.php');
$id = $_GET['id'];
$title = "Tambah Todolist";
$data = new TodoList();

$todolist = $data->query("SELECT * FROM todolist WHERE id = '$id'")[0];

include('../layouts/header.php');
	?>

<div class="row justify-content-center mt-3">
	<div class="col-md-8">
	<h3 class="text-center m-3">Edit Todolist</h3>
		<div class="row justify-content-center">
			<div class="col-md-7 border p-3">
				<div class="form-group">
					<form action="" method="post">
						<input type="text" name="id" value="<?= $todolist['id'] ?>" hidden>
						<div class="form-group">
							<small for="name">Nama</small>
							<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama todolist" value="<?= $todolist['name'] ?>" required>
						</div>
						<div class="form-group">
							<small for="description">Description</small>
							<textarea name="description" id="description" class="form-control"><?= $todolist['description'] ?></textarea>
						</div>
						<div class="form-group">
							<small for="date">Created At</small>
							<input type="date" name="date" id="date" class="form-control" value="<?= $todolist['modified_at'] ?>" required>
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

<?php
	if (isset($_POST['simpan'])) {
		if ($data->updateTodoList($_POST)) {
			echo "
					<script>
						alert('Edit Sukses');
						window.location.href = '" . $data->getUrlBase() . "'" .
					"</script>";
		}
	}
?>
