<?php
class Conn {
	public $conn;

	/**
	 * Konstruktor Koneksi
	 */
	function __construct()
	{
		$hostname   = 'localhost';
		$username   = 'agusprasetyo30';
		$password   = 'gokpras123';
		$database   = 'test-code-php';

		$this->conn = mysqli_connect($hostname, $username, $password, $database);
	}

	/**
	 * fungsi untuk menampilkan data select dengan cara memasukan query ke dalam parameter
	 *
	 * @param [String] $query
	 * @return array
	 */
	function query($query) : array
	{
		$result = mysqli_query($this->conn, $query);
		$rows = [];
		while ($data = mysqli_fetch_assoc($result)) {
		$rows[] = $data;
		}
		return $rows;
	}

	/**
	 * Digunakan untuk identifikasi halaman route agar lebih simpel
	 *
	 * @return void
	 */
	function getUrlBase()
	{
		// Bisa diganti sesuai nama file
		$location = '/test-code-php';

		// Ini bisa diganti https
		return 'http://' .  $_SERVER['HTTP_HOST'] . $location;
	}
}

?>
