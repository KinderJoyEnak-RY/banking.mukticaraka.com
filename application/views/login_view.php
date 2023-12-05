<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Page</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<style>
		body {
			overflow: hidden;
			display: flex;
			flex-direction: column;
			min-height: 100vh;
		}

		.login-section {
			flex-grow: 1;
			display: flex;
			flex-direction: column;
			justify-content: center;
			background: linear-gradient(135deg, #4facfe, #00f2fe);

			animation: fadeIn 1s ease-in-out;
		}

		footer {
			text-align: center;
			padding: 10px 0;
			background: #FFF;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		.btn:hover {
			background-color: #ff8c42;
			transition: background-color 0.3s ease-in-out;
		}

		@media (min-width: 768px) {
			.login-section {
				flex-direction: row;
			}
		}
	</style>
</head>

<body>
	<section class="login-section">
		<div class="container-fluid">
			<div class="row h-100">
				<div class="col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-black form-container">
					<img src="<?= base_url('uploads/img/logooo.png'); ?>" alt="Logo" class="mb-5" style="width: 300px;">
					<?php if ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>

					<form action="<?php echo site_url('user/login'); ?>" method="post" style="width: 100%; max-width: 23rem;">
						<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
						<div class="form-outline mb-4">
							<label class="form-label" for="code">Mitracode</label>
							<input type="text" id="code" name="code" class="form-control form-control-lg" required />
						</div>
						<div class="form-outline mb-4">
							<label class="form-label" for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control form-control-lg" required />
							<div class="mt-2">
								<i class="fas fa-info-circle text-primary"></i>
								<small class="text-muted">Password Anda berisi <strong class="text-dark">8 digit</strong>: Tanggal, Bulan, Tahun lahir Anda. <span class="text-warning">Contoh: 23052000</span></small>
							</div>
						</div>
						<div class="pt-1 mb-4 d-flex justify-content-end">
							<button type="submit" class="btn btn-warning btn-lg">Masuk</button>
						</div>
					</form>

				</div>
				<div class="col-sm-12 col-md-6 px-0 d-none d-md-block">
					<img src="<?= base_url('uploads/img/com3.jpg'); ?>" alt="Login image" class="w-100 h-100" style="object-fit: cover; object-position: left;">
				</div>
			</div>
		</div>
	</section>

	<footer>
		Copyright © 2023 All rights reserved.
	</footer>

	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>