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
				<form autocomplete="off" class="login" method="POST" action="login.php">
					<input  class="in" type="text" autocomplete="off"  placeholder="Username" />
					<input class="in" type="password" autocomplete="off"  placeholder="Password" />
					<button type="submit" class="btn">Log in</button>
				</form>
			<?php
				if (isset($data['body'])){
					echo "<div class='alert alert-danger'>". $data['body'] ."</div>";
				}
				?>
			</div>
		</div>
	</div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>