<?php
define('db_host', '127.0.0.1');
define('db_user', 'root');
define('db_password', '123456');
define('db_database', 'lotto');
$conn= mysqli_connect(db_host, db_user, db_password, db_database);
mysqli_select_db($conn, db_database);
?>

