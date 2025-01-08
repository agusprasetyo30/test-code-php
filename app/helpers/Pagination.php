<?php

require_once(__DIR__ . "/../connection/Database.php");

class Pagination extends Database {

    public $previous;
    public $next;
    public $total_halaman;
    public $nomer;
    public $halaman_current;

    /**
       * Function untuk pagination
       *
       * @param [int] $batasTampil
       * @param [string] $query
	*/
	function pagination(int $batasTampil, $query) : object
	{
		$halaman = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$this->halaman_current = ($halaman > 1) ? ($halaman * $batasTampil) - $batasTampil : 0;
		// $this->halaman_current = ($halaman > 1) ? ($halaman * $batasTampil) / $batasTampil : 0;

		$this->previous = $halaman - 1;
		$this->next = $halaman + 1;

		$data = mysqli_query($this->conn, $query);
		$jml_data = mysqli_num_rows($data);
		$this->total_halaman = ceil($jml_data / $batasTampil);

		$data_pagination = mysqli_query($this->conn, $query . ' limit ' . $this->halaman_current . ', ' . $batasTampil);

		$this->nomer = 1 + $this->halaman_current;

		return $data_pagination;
	}

	/**
       * Mengambil nomer pagination
       *
       * @return integer
       */
	function getNumber() : int
	{
		return (int)$this->nomer++;
	}

	// Menampilkan halaman current
	function getHalamanCurrent() : int
	{
		return $this->halaman_current;
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $menu
	 * @return string
	 */
	function paginationNumber($menu = null) : string
	{
		$link_previous = '';
		$number_link = '';
		$link_next = '';

		// Untuk tombol previous
		if ($this->halaman_current > 1) {
		$link_previous = "href='?page=" . "$this->previous'";
		}

		// Untuk tombol next
		if ($this->halaman_current < $this->total_halaman) {
		$link_next = "href='?page=" . "$this->next'";
		}

		$previous = "<nav>" .
		"<ul class='pagination justify-content-center'><li class='page-item'>" .
		"<a class='page-link'" . $link_previous . ">Previous</a>";


		for ($i=1; $i <= $this->total_halaman; $i++) {
		if ($this->next - 1 == $i) {
			$number_link .= "<li class='page-item active'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
		} else {
			$number_link .= "<li class='page-item'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
		}
		}

		$next = "<li class='page-item'> <a class='page-link'" . $link_next . ">Next</a>";

		// Menggabungkan semua perintah
		return $previous . $number_link . $next;
	}
}