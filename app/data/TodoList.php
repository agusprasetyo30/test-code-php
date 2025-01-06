<?php

require(__DIR__ . "/../connection/Conn.php");
require(__DIR__ . "/../helpers/Pagination.php");

class TodoList extends Conn {
	public $previous;
	public $next;
	public $total_halaman;
	public $nomer;
	public $halaman_current;

	/**
	 * Digunakan untuk mengambil url
	 *
	 * @return string
	 */
	function getUrl() : string
	{

		$fileDirectory = $this->getUrlBase() . "/resource/todolist/" ;

		return $fileDirectory;
	}

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

	/**
	 * Digunakan untuk menampilkan todolist
	 *
	 * @return array
	 */
	function getTodoList() : array {
		$query = "SELECT * FROM todolist";

		$arr = $this->query($query);

		return $arr;
	}

	/**
	 * untuk menambahkan todolist
	 *
	 * @param [type] $input
	 * @return boolean
	 */
	function addTodoList($input) : bool
	{
		$name = $input['name'];
		$description = $input['description'];
		$date = $input['date'];

		$query = "INSERT INTO todolist VALUES (NULL, '$name', '$description', '$date')";
		mysqli_query($this->conn, $query);

		return mysqli_affected_rows($this->conn) ? mysqli_affected_rows($this->conn) : FALSE;
	}

	/**
	 * untuk mengedit Todolist
	 *
	 * @param [type] $input
	 * @return boolean
	 */
	function updateTodoList($input) : bool
	{
		$id = $input['id'];
		$name = $input['name'];
		$description = $input['description'];
		$date = $input['date'];


		$query = "UPDATE todolist SET
				name    	  = '$name',
				description    = '$description',
				modified_at = '$date' WHERE id = $id";

		mysqli_query($this->conn, $query);

		return mysqli_affected_rows($this->conn) ? mysqli_affected_rows($this->conn) : FALSE;
	}

	/**
     * Digunakan untuk menghapus Todolist
     *
     * @param [type] $id
     * @return void
     */
    function deleteTodolist($id)
    {
        $query = "DELETE from todolist where id = '$id' ";

        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }
}
