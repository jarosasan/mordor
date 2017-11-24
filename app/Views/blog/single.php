<!doctype html>
<html lang="en">
<head>
	<title><?= $data['post']['title'] . " | " . CONFIG['site_title']; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/css/style.css">
</head>
<body>
<div class="container-fluid header">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h1 class="display-3"><?= CONFIG['site_title']; ?></h1>
				<p class="lead">A good place to live.</p><br/>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid top-menu">
	<div class="row">
		<div class="container">
			<div class="col text-center">
				<?php uFrame\Menu ::show(); ?>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div><a href='../index'>Back to posts</a></div>
		<div class="col content">
			<h2><?= $data['post']['title']; ?></h2>
			<hr>
			<?= $data['post']['body']; ?>
			<hr>
		</div>
	</div>

	<div class="row">
		<?php
			foreach ( $data['banners'] as $banner ) {
				echo "<a class='btn btn-light' href='" . $banner['link'] . "'>" . $banner['name'] . "</a>&nbsp";
			}
		
		
		?>
	</div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>