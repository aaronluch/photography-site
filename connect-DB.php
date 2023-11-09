<!-- Connecting -->
<?php
$databaseName = 'ADLUCIAN_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'adlucian_writer';
$password = '0fe8vhYMPyLc';

$pdo = new PDO($dsn, $username, $password);
if($pdo) print '<!-- Connection complete -->';
?>
