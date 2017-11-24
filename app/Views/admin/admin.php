<!doctype html>
<html lang="en">
<head>
	<title><?= $data['page']['title'] . " | " . CONFIG['site_title']; ?></title>
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
				<p class="lead">Admin panel.</p><br/>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid top-menu">
	<div class="row">
		<div class="container">
			<div class="col text-center">
				<?php uFrame\Menu ::admin(); ?>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<table class="table table-responsive table-striped table-hover table-bordered">
		<thead class="thead-dark">
		<tr>
			<?php foreach ( $data['th'] as $i ) {
				echo "<th scope='col'>" . $i['Field'] . "</th>";
			}
			?>
			<th>action</th>
		</tr>
		</thead>
		<tbody class="">
		<?php
			foreach ( $data['postList'] as $arr ) {
				echo "<tr>";
				foreach ( $arr as $i ) {
					echo "<td>" . substr( $i, 0, 100 ) . "</td>";
				}
				echo "<td><a href='' class='btn btn-outline-success btn-sm'  role='button' aria-disabled='true'>Edit</a>
							<a href='/" . CONFIG['site_path'] . "/Admin/remove?i=" . $arr['id'] . "&table=" . $data['table'] . "' class='btn btn-outline-danger btn-sm' role='button' aria-disabled='true'>Delite</a>
							</td></tr>";
			}
		?>
		</tbody>
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