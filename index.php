<?php require_once "class_bmipasien.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Evry Nazyli Ciptanto - Praktikum 3</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="css/style.css" rel="stylesheet">

</head>

<body>

	<header>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
			<a class="navbar-brand" href="#">Evry Nazyli Ciptanto</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#aboutMe" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://github.com/Nazyli/" target="_blank">Portofolio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact">Contact</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<main role="main" class="container" id="main">
		<div class="row">
			<div class="col-md-12 mb-5">
				<h2 class="mt-5 text-center text-secondary">Aplikasi Indeks Massa Tubuh</h2>
			</div>
			<div class="col-md-6">
				<div class="card mb-3 border-primary">
					<div class="card-header text-white bg-primary">Form Input BMI</div>
					<div class="card-body">
						<form action="index.php" method="post">
							<div class="form-group row">
								<label class="col-4 col-form-label" for="nama">Nama</label>
								<div class="col-8">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-user-circle-o"></i>
											</div>
										</div>
										<input id="nama" name="nama" type="text" required="required" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="berat" class="col-4 col-form-label">Berat</label>
								<div class="col-8">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-anchor"></i>
											</div>
										</div>
										<input id="berat" name="berat" type="text" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Kg</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="tinggi" class="col-4 col-form-label">Tinggi Badan</label>
								<div class="col-8">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-expand"></i>
											</div>
										</div>
										<input id="tinggi" name="tinggi" type="text" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">cm</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="umur" class="col-4 col-form-label">Umur</label>
								<div class="col-8">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-bell"></i>
											</div>
										</div>
										<input id="umur" name="umur" type="text" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Thn</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-4">Jenis Kelamin</label>
								<div class="col-8">
									<div class="custom-control custom-radio custom-control-inline">
										<input name="gender" id="radio_0" type="radio" class="custom-control-input" value="Laki - Laki">
										<label for="radio_0" class="custom-control-label">Laki - Laki</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input name="gender" id="radio_1" type="radio" class="custom-control-input" value="Perempuan">
										<label for="radio_1" class="custom-control-label">Perempuan</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="offset-4 col-8">
									<button name="proses" type="submit" class="btn btn-success">Kirim</button>
								</div>
							</div>
						</form>
						<blockquote class="blockquote mb-0">
							<p>Menghitung Indeks massa tubuh</p>
							<footer class="blockquote-footer">Praktikum 3 <cite title="Source Title"> BMI (Body Mass Index)</cite></footer>
						</blockquote>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card mb-3 border-primary">
					<div class="card-header text-white bg-primary">Hasil Evaluasi</div>
					<div class="card-body">
						<?php
						$nama;
						$berat;
						$tinggi;
						$umur;
						$gender;
						$isPost = isset($_POST['proses']);
						if ($isPost) {
							$nama = $_POST['nama'];
							$berat = $_POST['berat'];
							$tinggi = $_POST['tinggi'];
							$umur = $_POST['umur'];
							$gender = $_POST['gender'];
							$pasien1 = new BMIPasien($nama, $berat, $tinggi, $umur, $gender);
						?>
							<ul class="list-group list-group-flush">
								<li class="list-group-item row">
									<label class="col-4">Nama</label>
									<label class="col-6"><?= $pasien1->name; ?></label>
								</li>
								<li class="list-group-item row">
									<label class="col-4">Berat Badan</label>
									<label class="col-6"><?= $pasien1->weight; ?> Kg</label>
								</li>
								<li class="list-group-item row">
									<label class="col-4">Tinggi Badan</label>
									<label class="col-6"><?= $pasien1->height; ?> cm</label>
								</li>
								<li class="list-group-item row">
									<label class="col-4">Umur</label>
									<label class="col-6"><?= $pasien1->age; ?> Tahun</label>
								</li>
								<li class="list-group-item row">
									<label class="col-4">Gender</label>
									<label class="col-6"><?= $pasien1->gender; ?></label>
								</li>
								<li class="list-group-item row">
									<label class="col-4">BMI</label>
									<label class="col-6"><?= round($pasien1->BMIres, 2); ?></label>
								</li>
								<li class="list-group-item row">
									<label class="col-4">Status</label>
									<label class="col-6"><?= $pasien1->BMIstatus; ?></label>
								</li>
							</ul>
						<?php
						}
						?>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="card mb-3 border-primary">
					<div class="card-header text-white bg-primary">Database</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama Lengkap</th>
									<th scope="col">Gender</th>
									<th scope="col">Umur</th>
									<th scope="col">Berat (Kg)</th>
									<th scope="col">Tinggi (cm)</th>
									<th scope="col">BMI</th>
									<th scope="col">Hasil</th>
								</tr>
							</thead>
							<tbody>
								<?php

								$pasien2 = new BMIPasien("Evry Nazyli", 51, 160, 20, "Laki - Laki");
								$pasien3 = new BMIPasien("Farid - Muhari", 70, 167, 19, "Laki - Laki");
								$pasien4 = new BMIPasien("Diny Brilianti", 45, 154, 19, "Perempuan");
								$pasien5 = new BMIPasien("Ali Mahmud", 47, 164, 19, "Laki - Laki");
								$ar_nilai = [$pasien2, $pasien3, $pasien4, $pasien5];
								if (isset($_POST['proses'])) {
									$pasien1 = new BMIPasien($nama, $berat, $tinggi, $umur, $gender);
									array_push($ar_nilai, $pasien1);
								}
								$no = 1;
								foreach ($ar_nilai as $ns) {
								?>
									<tr>
										<th scope="row"><?= $no++; ?></th>
										<td><?= $ns->name; ?></td>
										<td><?= $ns->gender; ?></td>
										<td><?= $ns->age; ?></td>
										<td><?= $ns->weight; ?></td>
										<td><?php echo $ns->height; ?></td>
										<td><?= round($ns->BMIres, 2); ?></td>
										<td><?= $ns->BMIstatus; ?></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div aria-live="polite" aria-atomic="true">
			<div id=toast>
				<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header bg-info text-white">
						<strong class="mr-auto">Email</strong>
						<small>
							<script>
								document.write(new Date().getDate() + "-" + (new Date().getMonth() + 1) + "-" + new Date().getFullYear());
							</script>
						</small>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body">
						evrynazyli@gmail.com
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="aboutMe" tabindex="-1" role="dialog" aria-labelledby="aboutMeLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info text-white">
						<h5 class="modal-title" id="aboutMeLabel">About Me</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<blockquote class="blockquote">
							<p class="mb-0">Evry Nazyli Ciptanto.</p>
							<footer class="blockquote-footer">Teknik Informatika <cite title="Source Title"> ( TI 08
									)</cite></footer>
							<footer class="blockquote-footer">0110220045</footer>
							<p class="mt-2 text-secondary font-italic">Praktikum 3 - Pemrograman Web Lanjutan</p>
						</blockquote>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</main>

	<footer class="footer">
		<div class="container my-auto">
			<div class="text-center my-auto">
				<span>Praktikum 3 &mdash;
					<script>
						document.write(new Date().getFullYear());
					</script> - Developed by
					<b><a href="https://github.com/Nazyli/" target="_blank">Evry Nazyli</a></b>
				</span>
			</div>
		</div>
	</footer>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#contact").click(function() {
				$('.toast').toast({
					delay: 2000
				});
				$('.toast').toast('show');
			});
		});
	</script>
</body>

</html>