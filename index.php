<?php
	// ini_set('display_errors', 0);

	$menu = isset($_GET['menu']) ? $_GET['menu'] : "" ;

   // untuk mengatur isi dari $title
	if ($menu == null) {
		$title = 'Todo List';
	}

   // Memanggil file header

	?>

<?php
	// Untuk mengatur menu berdasarkan tampilan
	if ($menu == null) {
		header('location:./resource/soal/soal1.php');

	} else {
		header('location:./layouts/errors.php');
	}
?>
