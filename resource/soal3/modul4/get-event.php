<?php
    include_once(__DIR__ . '/../../../app/data/Karyawan.php');    
    $karyawan = new Karyawan();
    
    $events = [];
    
    $query = 'SELECT k.*, d.nama_dept FROM karyawan k INNER JOIN department d ON k.department = d.IDDept order by k.id asc';
    
    foreach ($karyawan->query($query) as $k) {
        $events[] = [
            'title' => $k['nama'],
            'department' => $k['nama_dept'],
            'start' => $k['tanggal_lahir'], // Hanya menggunakan tanggal ulang tahun, tanpa waktu
            'color' => 'green', // Memberikan warna hijau
            'description' => 'Karyawan: ' . $k['nama'],
            'telp' => $k['telp']
        ];
    }

    // Mengembalikan data dalam format JSON
    echo json_encode($events);
?>