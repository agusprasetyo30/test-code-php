<?php
    $title = "Soal 3 - Modul 1";

    include_once(__DIR__ . '/../../../app/data/Karyawan.php');
    include_once(__DIR__ . '/../../../app/helpers/Pagination.php');
    include_once(__DIR__ . '/../../../app/helpers/General.php');
    include_once ('../../../dist/library/Carbon/autoload.php');

    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    
    include_once('../../layouts/header.php'); 

    $karyawan = new Karyawan();
    $pagination = new Pagination();
?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-10">
            <h1 class="fs-4">Soal 3 - Modul 2</h1>    
            <div class="card">
                <div class="card-body">
			        <h2 class="text-center fs-4">Manajemen Karyawan</h2>

                    <div class="mb-2 d-flex justify-content-between">
                        <a href="./add-karyawan.php" class="btn btn-sm btn-primary">Add Karyawan</a>
                        <a href="../" class="btn btn-sm btn-warning">Kembali</a>
                    </div>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr style="vertical-align: middle;">
                                <th width="10%">ID Karyawan</th>
                                <th width="15%">Nama</th>
                                <th width="12%">Departemen</th>
                                <th width="10%">Telepon</th>
                                <th width="10%">No KTP</th>
                                <th width="12%">Tempat Tinggal</th>
                                <th width="11%">Tanggal Lahir</th>
                                <th width="11%">Tanggal Masuk</th>
                                <th width="10%">Penempatan</th>
                                <th width="9%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT k.*, d.nama_dept FROM karyawan k INNER JOIN department d ON k.department = d.IDDept order by k.id asc";

                            $data_pagination = $pagination->pagination(4, $query);

                            while ($data = mysqli_fetch_array($data_pagination)) {
                        ?>
                            <tr>
                                <td><?= $data['IDKaryawan'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['nama_dept'] ?></td>
                                <td><?= $data['telp'] ?></td>
                                <td><?= $data['no_ktp'] ?></td>
                                <td><?= ucfirst($data['kota_tinggal']) ?></td>
                                <td><?= Carbon::parse($data['tanggal_lahir'])->format('d M Y') ?> </td>
                                <td><?= Carbon::parse($data['tanggal_masuk'])->format('d M Y') ?></td>
                                <td><?= ucfirst($data['kota_penempatan']) ?></td>
                                <td>
                                    <div class="btn-group-toggle">
                                        <a href="<?=$karyawan->getUrl()?>edit-karyawan.php?id=<?=$data['id']?>" class="btn btn-sm btn-primary w-100 mb-1">Edit</a>
                                        <a href="<?=$karyawan->getUrl()?>delete-karyawan.php?id=<?=$data['id']?>" onclick="return confirm('Do you want to delete this data?')" class="btn btn-sm btn-danger w-100">Delete</a>
                                    </div>
                                </td>
                                
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



<?php include_once('../../layouts/footer.php') ?>

<script>
    $(document).ready(function() {    
        $('#kocak').append('<h2>yahahhha</h2>')
    })
</script>