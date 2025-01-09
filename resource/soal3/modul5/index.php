<?php
    $title = "Soal 3 - Modul 3";
    
    include_once(__DIR__ . '/../../../app/data/Karyawan.php');    
    include_once(__DIR__ . '/../../../app/data/Department.php');    
    

    include_once('../../layouts/header.php'); 
    
    $karyawan = new Karyawan();
?>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-10">
            <h1 class="fs-4">Soal 3 - Modul 5</h1>    
            <div class="card">
                <div class="card-body">
                    <a href="../"  class="btn btn-sm btn-warning mb-2 float-end">Kembali</a>
                    <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr style="vertical-align: middle;">
                                    <th></th>
                                    <th>Gresik</th>
                                    <th>Surabaya</th>
                                    <th>Nganjuk</th>
                                    <th>Surabaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = " SELECT d.nama_dept ,
                                        SUM(CASE WHEN kota_penempatan = 'gresik' THEN 1 ELSE 0 END) AS gresik,
                                        SUM(CASE WHEN kota_penempatan = 'surabaya' THEN 1 ELSE 0 END) AS surabaya,
                                        SUM(CASE WHEN kota_penempatan = 'nganjuk' THEN 1 ELSE 0 END) AS nganjuk,
                                        SUM(CASE WHEN kota_penempatan = 'jakarta' THEN 1 ELSE 0 END) AS jakarta
                                    FROM 
                                        karyawan k
                                    inner join department d 
                                    on k.department = d.IDDept 
                                    GROUP BY 
                                        department
                                    ORDER BY 
                                        department;";

                                    $rekap_laporan = $karyawan->query($query);

                                    foreach ($rekap_laporan as $key => $data) {
                                ?>
                                <tr>
                                    <th><?= $data['nama_dept']  ?></th>
                                    <td><?= $data['gresik']  ?></td>
                                    <td><?= $data['surabaya']  ?></td>
                                    <td><?= $data['nganjuk']  ?></td>
                                    <td><?= $data['jakarta']  ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once('../../layouts/footer.php');
?>