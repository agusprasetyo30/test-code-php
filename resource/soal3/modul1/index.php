<?php
    $title = "Soal 3 - Modul 1";

    include_once(__DIR__ . '/../../../app/data/Department.php');
    include_once(__DIR__ . '/../../../app/helpers/Pagination.php');

    include_once('../../layouts/header.php'); 

    $department = new Department();
    $pagination = new Pagination();
?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-10">
            <h1 class="fs-4">Soal 3 - Modul 1</h1>    
            <div class="card">
                <div class="card-body">
			        <h2 class="text-center fs-4">Manajemen Department</h2>

                    <div class="mb-2 d-flex justify-content-between">
                        <a href="./add-department.php" class="btn btn-sm btn-primary">Add Department</a>
                        <a href="../" class="btn btn-sm btn-warning">Kembali</a>
                    </div>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="80%">Department Name</th>
                                <th width="20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $data_pagination = $pagination->pagination(4, "SELECT * FROM department");

                            while ($data = mysqli_fetch_array($data_pagination)) {
                        ?>
                            <tr>
                                <td><?= $data['nama_dept'] ?></td>
                                <td class="text-center">
                                    <div class="btn-btn-group-toggl e">
                                        <a href="<?=$department->getUrl()?>edit-department.php?id=<?=$data['IDDept']?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="<?=$department->getUrl()?>delete-department.php?id=<?=$data['IDDept']?>" onclick="return confirm('Do you want to delete this data?')" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>

                            <?php }  ?>
                        </tbody>
                    </table>
            			<?= $pagination->paginationNumber() ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once('../../layouts/footer.php') ?>