<!doctype html>
<html lang="en">
<head>
    <title><?= $data['post']['title'] . " | " . CONFIG['site_title']; ?></title>
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
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col content">
                <h2><?= $data['post']['title']; ?></h2>
                <hr>
				<?= $data['post']['body']; ?>
            </div>
        </div>

        <div class="row">
            <?php 
                foreach ($data['banners'] as $banner) {
                   echo  "<a class='btn btn-light' href='" . $banner['link'] . "'>" . $banner['name'] . "</a>&nbsp";
                }


            ?>
        </div>  
    </div>


</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>