<?php
    include_once(__DIR__ . '/../../../app/data/Karyawan.php');    
    include_once(__DIR__ . '/../../../app/helpers/General.php');

    require '../../../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
    // Create a new spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set table headers
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Departemen');
    $sheet->setCellValue('D1', 'Kota Penempatan');
    $sheet->setCellValue('E1', 'Masa Kerja');

    // Table data (you can replace this with dynamic data from a database)
    $query = "SELECT k.nama, k.kota_penempatan, k.tanggal_masuk, d.nama_dept FROM karyawan k INNER JOIN department d ON k.department = d.IDDept order by k.tanggal_masuk asc";

    // fill data to array 
    $karyawan = new Karyawan();

    $data = [];
    foreach ($karyawan->query($query) as $key => $value) {
        $temp = [
            ++$key,
            $value['nama'],
            $value['nama_dept'],
            ucfirst($value['kota_penempatan']),
            (new General)->countDiffMasaKerja($value['tanggal_masuk'])
        ];
        
        array_push($data, $temp);
    }

    // Fill data into cells
    $row = 2; // Start from row 2, since row 1 is the header
    foreach ($data as $record) {
        $sheet->setCellValue('A' . $row, $record[0]);
        $sheet->setCellValue('B' . $row, $record[1]);
        $sheet->setCellValue('C' . $row, $record[2]);
        $sheet->setCellValue('D' . $row, $record[3]);
        $sheet->setCellValue('E' . $row, $record[4]);
        $row++;
    }

    // Set header to force download as Excel file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Masa Kerja Karyawan.xlsx"');

    // Save the Excel file to PHP output
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');

?>
