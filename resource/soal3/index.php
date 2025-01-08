<?php
    $title = "Soal 3";

    include('../layouts/header.php'); 
?>
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-4">
            <h1 class="fs-4">Soal 3</h1>    
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <label class="mb-1">Modul 1</label>
                        <a href="./modul1/" class="btn btn-primary w-100">Form Management Department</a>
                    </div>
                    <div class="mb-2">
                        <label class="mb-1">Modul 2</label>
                        <a href="./modul2/" class="btn btn-primary w-100">Form Management Karyawan</a>
                    </div>
                    <div class="mb-2">
                        <label class="mb-1">Modul 3</label>
                        <a href="./modul3/" class="btn btn-primary w-100">Laporan Masa Kerja Karyawan + Export Excel</a>
                    </div>
                    <div class="mb-2">
                        <label class="mb-1">Modul 4</label>
                        <a href="./modul4/" class="btn btn-primary w-100">Buat Kalender Ulang Tahun karyawan</a>
                    </div>
                    <div class="mb-2">
                        <label class="mb-1">Modul 5</label>
                        <a href="./modul5/" class="btn btn-primary w-100">Rekap Laporan Jumlah Karyawan per Department vs Penempatan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../layouts/footer.php') ?>