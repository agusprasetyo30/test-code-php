<?php 
    require_once(__DIR__ . "/../connection/Database.php");
    class Department extends Database {
        /**
         * Digunakan untuk mengambil url
         *
         * @return string
         */
        function getUrl() : string
        {
            $fileDirectory = $this->getUrlBase() . "/resource/soal3/modul1/" ;

            return $fileDirectory;
        }

        /**
         * Digunakan untuk menampilkan todolist
         *
         * @return array
         */
        function getDepartment() : array {
            $query = "SELECT * FROM department";

            $arr = $this->query($query);

            return $arr;
        }

        function addDepartment($input) : string
        {
            $name = $input['name'];
            
            $check_input = $this->query("SELECT * FROM department WHERE nama_dept = '$name'");
            
            if (count($check_input) > 0) {
                $pesan = "Department name already exists";
            } else {
                $query = "INSERT INTO department (nama_dept) VALUES ('$name')";
                if ($this->queryTransaction($query)) {
                    $pesan = "success";
                } else {
                    $pesan = "something wrong : " . $this->conn->error;
                }
            }
            
            return $pesan;
        }

        function updateDepartment($input) : string
        {
            $id = $input['IDDept'];
            $name = $input['name'];
            
            $check_input = $this->query("SELECT * FROM department WHERE nama_dept = '$name'");
            
            if (count($check_input) > 0) {
                $pesan = "Department name already exists";
            } else {
                $query = "UPDATE department SET nama_dept = '$name' WHERE IDDept = '$id'";
                if ($this->queryTransaction($query)) {
                    $pesan = "success";
                } else {
                    $pesan = "something wrong : " . $this->conn->error;
                }
            }

            return $pesan;
        }

        /**
         * Delete department
         * @param mixed $id
         * @return string
         */
        function deleteDepartment($id)
        {            
            $check_input = $this->query("SELECT * FROM karyawan WHERE department = '$id' ");
            
            if (count($check_input) > 0) {
                $pesan = "Cannot delete department because there are still employees registered.";
            } else {
                $query = "DELETE from department where IDDept = '$id' ";
                
                if ($this->queryTransaction($query)) {
                    $pesan = "success";
                } else {
                    $pesan = "something wrong : " . $this->conn->error;
                }
            }

            return $pesan;
        }
    }
?>