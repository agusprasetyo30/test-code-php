<?php
class Database {
	public $conn;

	/**
	 * Konstruktor Koneksi
	 */
	function __construct()
	{
		$hostname   = 'localhost';
		$username   = 'root';
		$password   = '';
		$database   = 'lawancovid';

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
		$result = $this->conn->query($query);
		$rows = [];
		while ($data = mysqli_fetch_assoc($result)) {
		$rows[] = $data;
		}
		return $rows;
	}

	/**
	 * Digunakan untuk eksekusi transaction data
	 * @param mixed $query
	 * @return bool|mysqli_result
	 */
	function queryTransaction($query) {
		return $this->conn->query($query);
	}

	/**
	 * Digunakan untuk identifikasi halaman route agar lebih simpel
	 *
	 * @return 
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
