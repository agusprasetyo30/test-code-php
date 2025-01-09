<?php
    include_once(__DIR__ . "../../../dist/library/Carbon/autoload.php");

    use Carbon\Carbon;
    use Carbon\CarbonInterval;

class General {
    /**
     * membuat table berbentuk belah ketupat
     * 
     * @param mixed $dimension
     * @param mixed $direction
     * @param mixed $value
     * @return void
     */
    public static function createTable($dimension, $direction, $value) {
        $size = ($dimension * 2) - 1;
    
        if ($dimension % 2 == 0 || $dimension < 3) {
            echo "Please enter an odd number greater than or equal to 3 for the size.";
            return;
        }
    
        $mid = floor($size / 2); // Center of the rhombus
        $hole_distance = $dimension - 1; // Digunakan untuk mengeliminasi data di tengah
    
        echo "<table style='text-align: center;' class='table-bordered' id='table_soal2'>";
    
        // Digunakan untuk memproses direction configuration
        $temp_letter = (new General)->directionConfiguration($direction, $value, $size);
    
        for ($row = 0; $row < $size; $row++) {
            echo "<tr>";
    
            for ($col = 0; $col < $size; $col++) {
                $distanceFromCenter = abs($row - $mid) + abs($col - $mid);
    
                // Mengecek apakah cell tersebut merupakan bagian dari belah ketupat
                if ($distanceFromCenter <= $mid) {
                    // Cek apakah cell berada di hole atau tidak
                    if ($distanceFromCenter < $hole_distance) {
                        echo "<td style='width: 25px;'></td>"; // Center hole
                    } else {
                            // Cek direction untuk menentukan baris mana yang akan ditampilkan
                            if ($direction == 'left_right' || $direction == 'right_left') {
                                echo "<td style='width: 25px;'>". $temp_letter[$col] ."</td>"; // Menampilkan data berdasarkan colom
                            } else {
                                echo "<td style='width: 25px;'>". $temp_letter[$row] ."</td>"; // Menampilkan data berdasarkan baris
                            }
                    }
                } else {
                    echo "<td style='width: 25px;'></td>"; // Outside rhombus
                }
            }    
            echo "</tr>";
        }
    
        echo "</table>";
    }

    /**
     * Digunakan untuk memproses data sesuai dengan direction, valur dan size
     * @param mixed $direction
     * @param mixed $value
     * @param mixed $size
     * @return array
     */
    private static function directionConfiguration($direction, $value, $size): array {
        $temp_letter = [];

        if ($value == 'alphabet') {
            for ($row = 0; $row < $size; $row++) {
                $letter = 'A';
                array_push($temp_letter, chr(ord($letter) + $row));            
            }
        } else if ($value == 'angka_ganjil') {
            $letter = 1;
            for ($row = 0; $row < $size; $row++) {
                array_push($temp_letter, $letter);
                $letter += 2;
            }
        } else if ($value == 'angka_genap') {
            $letter = 2;
            for ($row = 0; $row < $size; $row++) {
                array_push($temp_letter, $letter);
                $letter += 2;
            }
        }

        // Melakukan sorting jika direction down_up atau right_left
        if ($direction == 'down_up' || $direction == 'right_left') {
            rsort($temp_letter);
        }

        return $temp_letter;
    }

    
    /**
     * Digunakan untuk menghitung masa kerja, ex : 4 tahun 5 bulan
     *``
     * @param mixed $masa_kerja
     * @return string
     */
    public static function countDiffMasaKerja($masa_kerja) {
        $tanggal_sekarang = Carbon::now();
        $masa_kerja = Carbon::parse($masa_kerja);

        // Hitung diff
        $diff = $tanggal_sekarang->diff($masa_kerja);

        // memisahkan years and months
        $years = $diff->y;
        $months = $diff->m;

        // menggabungkan input tahun dan bulan
        $output = '';
        if ($years > 0) {
            $output .= $years . ' tahun ';
        }
        if ($months > 0) {
            $output .= $months . ' bulan';
        }

        // Trim any trailing space
        $output = trim($output);

        return $output;
    }
}