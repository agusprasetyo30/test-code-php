<?php
    include_once(__DIR__ . '/../../../app/data/Karyawan.php');    
    $karyawan = new Karyawan();
    
    $get_name = $_GET['name'];
    $date = $_GET['day'];
    $month = $_GET['month'];
    
    $events = [];
    
    $query = "SELECT k.*, d.nama_dept FROM karyawan k INNER JOIN department d ON k.department = d.IDDept 
        WHERE nama='$get_name' and day(k.tanggal_lahir)='$date' and month (k.tanggal_lahir)='$month'";
    
    $get_karyawan = $karyawan->query($query)[0];
    
    $events[] = [
        'title' => $get_karyawan['nama'],
        'department' => $get_karyawan['nama_dept'],
        'start' => $get_karyawan['tanggal_lahir'], // Hanya menggunakan tanggal ulang tahun, tanpa waktu
        'color' => 'green', // Memberikan warna hijau
        'description' => 'Karyawan: ' . $get_karyawan['nama'],
        'telp' => $get_karyawan['telp']
    ];

    // Mengembalikan data dalam format JSON
    echo json_encode($events);
?>