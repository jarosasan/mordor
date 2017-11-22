<!doctype html>
<html lang="en">
<head>
    <title> Blog | <?= CONFIG['site_title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/style.css">
</head>
<body>
    <div class="container-fluid header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><?= CONFIG['site_title']; ?></h1>
                </div>
                <div class="col text-right">
   <form action="/<?= CONFIG['site_path']; ?>/Blog/search" method="GET">
    <div class="input-group">
                   
   <input type="text" class="form-control" placeholder="Search for..." name="query">
                      <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </span>
                
            </div></form>
        </div>
    </div>
</div>
<div class="container">
	
    <?php
    foreach ($data['postList'] as $post) {
       echo '<div class="row"><div class="col content">
       <h2>
       <a href="/' . CONFIG['site_path'] . "/Blog/show/" . $post['id'] . '" >' . $post['title'] . '</a>

       </h2>
       <hr>' . $post['body'] . '... <a href="/' . CONFIG['site_path'] . "/Blog/show/" . $post['id'] . '">Daugiau</a></div></div>';
   }
   
   ?>
	<nav aria-label="...">
		<ul class="pagination justify-content-center">
				<?php
					
				if ($data['page'] > 1){
					echo "<li class='page-item'><a class='page-link' href='/" . CONFIG['site_path'] . "/Blog/". $data['index']."page=" . ($data['page']-1)  . "'>Previous</a></li> ";
				}
					for ($i= 0; $i <= ($data['total'])-1; $i++) {
					echo "<li class='page-item " . (( $i == ($data['page']-1)) ? 'active' : '') ."'>
						<a class='page-link' href='/" . CONFIG['site_path'] . "/Blog/". $data['index']."page=" . ($i+1)  . "'>" . ($i+1) . "<span class=\"sr-only\">(current)</span></a>
					</li>";
				}
				if ($data['page'] < $data['total']){
					echo "<li class='page-item'><a class='page-link' href='/" . CONFIG['site_path'] . "/Blog/". $data['index']."page=" . ($data['page']+1)  . "'>Next</a></li> ";
				}
				?>
		</ul>
	</nav>
	
	
</div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>