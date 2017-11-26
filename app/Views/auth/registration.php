<!doctype html>
<html lang="en">
<head>
	<!--	<title>--><?//= $data['page']['title'] . " | " . CONFIG['site_title']; ?><!--</title>-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/css/style.css">
</head>
<body id="form-auth">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="wrap">
				<p class="form-title">Sign In</p>
				<form autocomplete="off" class="login" method="POST" action="/<?= CONFIG['site_path']; ?>/Auth/registration">
					<input  class="in" type="text" autocomplete="off" name="name" placeholder="Name" />
					<input  class="in" type="text" autocomplete="off" name="surname" placeholder="Surame" />
					<input  class="in" type="text" autocomplete="off"  name="username" placeholder="Username" />
					<input  class="in" type="email" autocomplete="off"  name="email" placeholder="Email" />
					<input class="in" type="password" autocomplete="off"  name="password" placeholder="Password" />
					<input class="in" type="password" autocomplete="off" name="confirm-password"  placeholder="Confirm password" />
					<button type="submit" class="btn">Log in</button>
				</form>
				<?php
					if (isset($this->errors)) {
						foreach ( $this -> errors as $error ) {
							echo "<div class='alert alert-danger'>" . $error . "</div>";
						}
					}
				?>
			</div>
		</div>
	</div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>