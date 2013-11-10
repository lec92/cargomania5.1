<?php


/*
$dbhost="localhost";
$dbname="combobox";
$dbuser="postgres";
$dbpass="lec92.com";
$db = pg_connect($dbhost,$dbuser,$dbpass);




*/


//$conexion=pg_connect("localhost","root","") or die('error');



$user = 'postgres';
$passwd = 'lec92.com';
$db = 'cargomania';
$port = '5432';
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());


//$db=pg_dbname("paises_estados");



?>