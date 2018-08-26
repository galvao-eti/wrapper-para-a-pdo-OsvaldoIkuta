<?php declare(strict_types=1);
require 'autoload.php';

use Turma3\Config;
use Turma3\Base;

//require_once('src/Base.php');

//$config = new Config('mysql', 'localhost',  'turma3', 'root', '');

$config = array(
    'driver' => 'mysql',
    'host' => 'localhost',
    'dbname' => 'turma3',
    'username' => 'root',
    'password' => '');

$dbh = new Base($config);




$count = $dbh->preparar(sprintf("INSERT INTO categoria (nome) VALUES ('%s')", "Macbook"));


$rows = $dbh->buscarTodos(sprintf("select * from categoria order by id"));
foreach ($rows as $row){
    echo $row["id"]." - " . $row["nome"]."<br>";
}

echo "<br><br>";

$count = $dbh->preparar(sprintf("update categoria set nome='%s' where id=%u", "Something", 14 ));

echo "<br><br>";

$count = $dbh->preparar(sprintf("delete from categoria where id=%u", 2));

echo "<br><br>";

$rows = $dbh->buscarTodos(sprintf("select * from categoria order by id"));
foreach ($rows as $row){
    echo $row["id"]." - " . $row["nome"]."<br>";
}



$dbh->desconectar();
