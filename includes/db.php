<?php
/* Connect to an ODBC database using driver invocation */
$env = '';
if ($env == 'production') {
    // turn off error reporting
    error_reporting(0);
    $dsn = 'mysql:dbname=orbitdco_supportme;host=10.169.0.45';
} else {
    $dsn = 'mysql:dbname=orbitdco_supportme;host=91.208.99.2:1100';
}
$user = 'orbitdco_db';
$password = 'Pa55word';

try {
    $con = new PDO($dsn, $user, $password);
    $con->setAttribute( \PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
        // live error message
        echo '<p>Error connecting to database.</p>';
}
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);