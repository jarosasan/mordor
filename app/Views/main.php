<!doctype html>
<html lang="en">
<head>
    <title><?= $data['header'] . " | " . CONFIG['site_title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/style.css">
</head>
<body>
<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="display-3"><?= CONFIG['site_title']; ?></h1>
                <p class="lead">A good place to start with PHP MVC</p><br/>
                <a class="btn btn-sm btn-outline-light" href="/<?= CONFIG['site_path']; ?>">Home</a>
                <a class="btn btn-sm btn-outline-light" href="/<?= CONFIG['site_path']; ?>/Home/hello">Hello world</a>
            </div>
        </div>
    </div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>