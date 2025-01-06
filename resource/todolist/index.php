<?php
	include(__DIR__ . '/../../app/data/TodoList.php');
	$title = "Tambah Todolist";
	$todolist = new TodoList();
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-md-12">
			<h2 class="text-center">Todolist CRUD</h2>

			<a href="<?=$todolist->getUrl()?>add-todolist.php" class="btn btn-sm btn-success mb-2">Tambah Todolist</a>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Description</th>
						<th>Datetime</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$data_pagination = $todolist->pagination(4, "SELECT * FROM todolist");

						while ($data = mysqli_fetch_array($data_pagination)) {
					?>
					<tr>
						<td><?= $todolist->getNumber() ?></td>
						<td><?= $data['name'] ?></td>
						<td><?= $data['description'] ?></td>
						<td><?= $data['modified_at'] ?></td>
						<td>
							<div class="btn-btn-group-toggle">
							<a href="<?=$todolist->getUrl()?>edit-todolist.php?id=<?=$data['id']?>" class="btn btn-sm btn-primary">Edit</a>
							<a href="<?=$todolist->getUrl()?>delete-todolist.php?id=<?=$data['id']?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-sm btn-danger">Delete</a>
							</div>
						</td>
					</tr>

					<?php } ?>
				</tbody>
			</table>
			<?= $todolist->paginationNumber() ?>

		</div>
	</div>
</div>
