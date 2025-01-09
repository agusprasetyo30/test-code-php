<?php
    $title = "Soal 3 - Modul 3";
    
    include_once(__DIR__ . '/../../../app/data/Karyawan.php');    
    include_once(__DIR__ . '/../../../app/helpers/Pagination.php');
    include_once(__DIR__ . '/../../../app/helpers/General.php');
    

    include_once('../../layouts/header.php'); 
    
    $karyawan = new Karyawan();
    $pagination = new Pagination();

?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-10">
            <h1 class="fs-4">Soal 3 - Modul 3</h1>    
            <div class="card">
                <div class="card-body">
                    <div class="mb-2 d-flex justify-content-between">
                        <a href="./export-excel.php" target="_blank" class="btn btn-sm btn-primary mb-2">Export Excel</a>
                        <a href="../"  class="btn btn-sm btn-warning mb-2 float-end">Kembali</a>
                    </div>
                    <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr style="vertical-align: middle;">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Departemen</th>
                                    <th>Kota Penempatan</th>
                                    <th>Masa Kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT k.nama, k.kota_penempatan, k.tanggal_masuk, d.nama_dept FROM karyawan k INNER JOIN department d ON k.department = d.IDDept order by k.id asc";

                                    $data_pagination = $pagination->pagination(4, $query);

                                    while ($data = mysqli_fetch_array($data_pagination)) {
                                ?>
                                <tr>
                                    <td><?= $pagination->getNumber() ?>. </td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['nama_dept'] ?></td>
                                    <td><?= $data['kota_penempatan'] ?></td>
                                    <td><?= (new General)->countDiffMasaKerja($data['tanggal_masuk']) ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                    </table>
                    <?= $pagination->paginationNumber() ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once('../../layouts/footer.php');
?>