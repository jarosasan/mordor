<?php

use uFrame\App;
use uFrame\Log;
use uFrame\Database;

// We are going to log errors to log.txt file
$log = new Log();

// We might use a database in our app


if (CONFIG['use_database']) {
    $db = new Database($log);
} else {
    $db = null;
}

// Let's create an instance of the application and pass database object
$app = new App($db, $log);