<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Page</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			overflow: hidden;
			/* Prevent scrolling */
		}

		.login-section {
			display: flex;
			flex-direction: column;
			justify-content: center;
			height: 100vh;
		}

		.copyright-text {
			text-align: center;
			margin-top: 20px;
		}

		@media (min-width: 768px) {
			.login-section {
				flex-direction: row;
			}
		}
	</style>
</head>

<body>
	<section class="vh-100 login-section">
		<div class="container-fluid">
			<div class="row h-100">
				<div class="col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-black">

					<img src="<?= base_url('uploads/img/logo1.jpg'); ?>" alt="Logo" class="mb-5" style="width: 300px;">
					<?php if ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>

					<form action="<?php echo site_url('user/login'); ?>" method="post" style="width: 100%; max-width: 23rem;">
						<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
						<div class="form-outline mb-4">
							<input type="text" id="code" name="code" class="form-control form-control-lg" required />
							<label class="form-label" for="code">Code</label>
						</div>
						<div class="form-outline mb-4">
							<input type="password" id="password" name="password" class="form-control form-control-lg" required />
							<label class="form-label" for="password">Password</label>
						</div>
						<div class="pt-1 mb-4">
							<button type="submit" class="btn btn-warning btn-lg btn-block">Login</button>
						</div>
					</form>

					<span class="copyright-text">Copyright © 2023 All rights reserved.</span>

				</div>
				<div class="col-sm-12 col-md-6 px-0 d-none d-md-block">
					<img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8YnVzaW5lc3N8fHx8fHwxNjk3Njc5MDY5&ixlib=rb-4.0.3&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1080" alt="Login image" class="w-100 h-100" style="object-fit: cover; object-position: left;">
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>