<!doctype html>
<html lang="en">
<head>
	<title> Blog | <?= CONFIG['site_title']; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/css/style.css">
</head>
<body>
<div class="container-fluid header">
	<div class="container">
		<div class="row">
			<div class="col top">
					<?php
					if ( isset( $_SESSION['username'] ) ) {
						echo "<a href='/" . CONFIG['site_path'] . "/Auth/logoutForm' class='btn btn-outline-dark btn-lg ' role='button'>Log out</a>";
					} else {
						echo "<a href='/" . CONFIG['site_path'] . "/Auth' class='btn btn-outline-dark btn-lg ' role='button'>Log in</a>";
					}
					?>
			</div>
		</div>
	</div>
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
<div class="container main">
	<a href="
	<?php
		if ( isset( $_SESSION['username'] ) ) {
			echo "/" . CONFIG['site_path'] . "/UserPosts/addPost";
		} else {
			echo "/" . CONFIG['site_path'] . "/Auth";
		}
	?>
	" class="btn btn-outline-dark btn-lg " role="button">Add post</a>
	<?php
		if (isset($data['postList'])) {
			foreach ( $data['postList'] as $post ) {
				echo "<div class='row'><div class='col content'>
                    <h2>" . $post['title'] . "</h2>"
				     . $post['body']
				     . "<h3>Gallery</h3>";
				      $gall = preg_split( '~/~', $post['image']);
						$gal = array_shift($gall);
						foreach ($gall as $image){
						echo "<img src='/".  CONFIG['site_path']."/assets/image/". $image ."' alt='image' height='150px' class='img-thumbnail' >";
						}
				     echo "<hr><a href='/" . CONFIG['site_path'] . "/UserPosts/editPost?id=" . $post['id'] .  "' class='btn btn - outline - success btn - sm'  role='button' aria-disabled='true'>Edit</a>
							<a href='/" . CONFIG['site_path'] . "/UserPosts/removePost?id=" . $post['id'] .  "' class='btn btn - outline - danger btn - sm' role='button'>Delite</a>
                    </div></div>";
			}
		}
	?>
	
	



</div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>