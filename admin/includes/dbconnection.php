<?php 
// DB credentials.
define('DB_HOST','us-east.connect.psdb.cloud');
define('DB_USER','zsbblanc15m11isg4abf');
define('DB_PASS','pscale_pw_CeeUQKKDA7Wy11O6ZbUH0gH8sjZuVLTZhUhPFQg7rXT');
define('DB_NAME','clientes');
// Establish database connection.
try
{
$options = array(PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/certs/ca-certificates.crt",);
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,$options);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


?>