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
	<?php
		foreach ( $data['postList'] as $post ) {
			echo '<div class="row"><div class="col content">
       <h2>
       <a href="/' . CONFIG['site_path'] . "/Blog/show/" . $post['id'] . '" >' . $post['title'] . '</a>
       </h2>' . $post['body'] . '... <a href="/' . CONFIG['site_path'] . "/Blog/show/" . $post['id'] . '">Daugiau</a><hr></div></div>';
		}
	?>
	<nav aria-label="...">
		<ul class="pagination justify-content-center">
			<ul class="pagination justify-content-center">
				<?php
					if ( $data['perPage'] <= $data['co'] ) {
						if ( $data['page'] > 1 ) {
							echo "<li class='page-item'><a class='page-link' href='/" . CONFIG['site_path'] . "/Blog/" . $data['index'] . "page=" . ( $data['page'] - 1 ) . "'>Previous</a></li> ";
						}
						for ( $i = 0; $i <= ( $data['total'] ) - 1; $i ++ ) {
							echo "<li class='page-item " . ( ( $i == ( $data['page'] - 1 ) ) ? 'active' : '' ) . "'>
						<a class='page-link' href='/" . CONFIG['site_path'] . "/Blog/" . $data['index'] . "page=" . ( $i + 1 ) . "'>" . ( $i + 1 ) . "<span class=\"sr-only\">(current)</span></a>
					</li>";
						}
						if ( $data['page'] < $data['total'] ) {
							echo "<li class='page-item'><a class='page-link' href='/" . CONFIG['site_path'] . "/Blog/" . $data['index'] . "page=" . ( $data['page'] + 1 ) . "'>Next</a></li> ";
						}
					}
				?>
			</ul>
	</nav>


</div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>