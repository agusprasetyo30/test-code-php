<?php 
    require_once(__DIR__ . "/../connection/Database.php");
    class Karyawan extends Database {
        /**
         * Digunakan untuk mengambil url
         *
         * @return string
         */
        function getUrl() : string
        {
            $fileDirectory = $this->getUrlBase() . "/resource/soal3/modul2/" ;

            return $fileDirectory;
        }

        /**
         * Digunakan untuk menampilkan todolist
         *
         * @return array
         */
        function getKaryawan() : array {
            $query = "SELECT * FROM karyawan";

            $arr = $this->query($query);

            return $arr;
        }

        function addKaryawan($input) : string
        {
            $name = $input['name'];
            $department = $input['department'];
            $no_ktp = $input['no_ktp'];
            $no_telepon = $input['no_telepon'];
            $tempat_tinggal = $input['tempat_tinggal'];
            $tanggal_lahir = $input['tanggal_lahir'];
            $tanggal_masuk = $input['tanggal_masuk'];
            $penempatan = $input['penempatan'];
            
            $check_input = $this->query("SELECT * FROM karyawan WHERE no_ktp = '$no_ktp'");
            
            if (count($check_input) > 0) {
                $pesan = "Karyawan name already exists";
            } else {
                $query = "INSERT INTO karyawan (nama, no_ktp, telp, kota_tinggal, tanggal_lahir, tanggal_masuk, department, kota_penempatan) VALUES 
                    ('$name','$no_ktp','$no_telepon','$tempat_tinggal','$tanggal_lahir','$tanggal_masuk','$department','$penempatan')";
                if ($this->queryTransaction($query)) {
                    $pesan = "success";
                } else {
                    $pesan = "something wrong : " . $this->conn->error;
                }
            }
            
            return $pesan;
        }

        function updateKaryawan($input) : string
        {
            $id = $input['id'];
            $department = $input['department'];
            $no_telepon = $input['no_telepon'];
            $tempat_tinggal = $input['tempat_tinggal'];
            $tanggal_lahir = $input['tanggal_lahir'];
            $penempatan = $input['penempatan'];

            $query = "UPDATE karyawan SET 
                department = '$department',
                telp = '$no_telepon',
                kota_tinggal = '$tempat_tinggal',
                tanggal_lahir = '$tanggal_lahir',
                kota_penempatan = '$penempatan' WHERE id = '$id'";

            if ($this->queryTransaction($query)) {
                $pesan = "success";
            } else {
                $pesan = "something wrong : " . $this->conn->error;
            }

            return $pesan;
        }

        /**
         * Delete karyawan
         * @param mixed $id
         * @return string
         */
        function deleteKaryawan($id)
        {                        
            $query = "DELETE from karyawan where id = '$id' ";
            
            if ($this->queryTransaction($query)) {
                $pesan = "success";
            } else {
                $pesan = "something wrong : " . $this->conn->error;
            }

            return $pesan;
        }
    }
?>