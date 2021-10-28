<?php

try
{
    $pdo = new PDO('mysql:host=icf233.c5d4mi2dthpc.us-east-1.rds.amazonaws.com;dbname=grupo14' , 'grupo14' , 'grupo..14');
    $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  echo "ERROR CONECTING TO DATABASE " . $e->getMessage();
  exit();
}
?>
