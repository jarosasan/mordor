<!doctype html>
<html lang="en">
<head>
<!--	<title>--><?//= $data['post']['title'] . " | " . CONFIG['site_title']; ?><!--</title>-->
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
		<div><a href='/<?= CONFIG['site_path']; ?>/UserPosts' class="btn btn-outline-success btn-sm" role="button">Back to My posts</a></div>
		<div class="col content">
			<form method="POST" action="/<?= CONFIG['site_path']; ?>/UserPosts/savePost" enctype="multipart/form-data">
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Title textarea</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" name="title" rows="1"></textarea>
				<label for="exampleFormControlTextarea1">Post textarea</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="8"></textarea>
				<label for="exampleFormControlFile1">Add image</label>
				<input type="file" class="form-control-file"  name="image[]" multiple id="exampleFormControlFile1">
				<button type="submit" class="btn btn-outline-success btn-sm">Post</button>
			</div>
			</form>
			<div><a href='/<?= CONFIG['site_path']; ?>/UserPosts' class="btn btn-outline-success btn-sm" role="button">Back to My posts</a></div>
			<?php
				if(!empty($data['error'])){
						
						echo "<div class='alert alert-secondary' role='alert'>". $data['error']."</div>";
					
				}
			?>
		</div>
	</div>
</div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>