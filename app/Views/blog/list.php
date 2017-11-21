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
                        <button class="btn btn-secondary" type="submit">Go!</button>
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
       <hr>' . $post['body'] . '... <></div></div>';
   }
   ?>
</div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>