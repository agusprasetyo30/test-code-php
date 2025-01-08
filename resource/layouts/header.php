<?php
   $menu = isset($_GET['menu']) ? $_GET['menu'] : "";
?>

<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title><?= $title ?></title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
			<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css" rel="stylesheet">
			<link rel="stylesheet" href="/test-code-php/dist/css/style.css">
		</head>
		<body>
		<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand fw-bold" href="#">Test Coding PT. IPG</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item ">
						<a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], 'soal1') ? 'active' : ''  ?>" href="/test-code-php/resource/soal1/">Soal 1 </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/test-code-php/resource/soal2/">Soal 2</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/test-code-php/resource/soal3/">Soal 3</a>
					</li>
				</ul>
			</div>
		</nav>
		<div id="page-container" >
			<div id="content-wrap">
				<div class="col-md-12">
