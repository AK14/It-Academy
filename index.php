<?php
namespace App;
include ("bootstrap.php");

use PDO;
use PDOStatement;
//App::start();

$dbh = new PDO(DB_DSN_MYSQL,DB_USER,DB_PASSWORD);
$stmt = $dbh->prepare('SELECT `name`, surname FROM users WHERE name = :user ');
$stmt->bindParam('user',$user,PDO::PARAM_STR);

$user = 'Alexander';
$stmt->execute();

while($row = $stmt->fetch())
{
    print_r($row);
}





