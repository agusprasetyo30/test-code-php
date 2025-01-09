<div align="center">
   <h1>
      Coding Test PT. IPG
   </h1>
</div>

## How to use
1. Clone repository ini keadalam file `htdocs`
2. Buat database dengan nama `lawancovid`, dan melakukan import database dengan nama file `lawancovid.sql`
3. Masuk kedalam folder `app > connection > Database.php` untuk merubah konfigurasi database sesuai dengan device masing-masing
	```php
	function __construct()
	{
		$hostname   = 'localhost';
		$username   = 'root';
		$password   = '';
		$database   = 'lawancovid';

		$this->conn = mysqli_connect($hostname, $username, $password, $database);
	}
	```
4. Untuk mengakses project ini, user dapat mengakses dengan URL `localhost/nama_folder` atau jika menggunakan folder ini maka dapat mengakses `localhost/test-code-php` setelah itu akan direct ke tampilan project
5. Aplikasi dapat digunakan 😊

## Screenshot

<img src="./soal 1.jpg">
<p align="center">Soal 1<p>
<br>

<img src="./soal 2.jpg">
<p align="center">Soal 2<p>
<br>

<img src="./Soal 3 index.jpg">
<p align="center">Soal 3 Index<p>
<br>

<img src="./soal 3 - modul 1.jpg">
<p align="center">Soal 3 - Modul 1<p>
<br>

<img src="./soal 3 - modul 2.jpg">
<p align="center">Soal 3 - Modul 2<p>
<br>

<img src="./soal 3 - modul 3.jpg">
<p align="center">Soal 3 - Modul 3<p>
<br>

<img src="./soal 3 - modul 4.jpg">
<p align="center">Soal 3 - Modul 4<p>
<br>

<img src="./soal 3 - modul 5.jpg">
<p align="center">Soal 3 - Modul 5<p>
