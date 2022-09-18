<?php
//database connection using POD...
$host= 'localhost';
$database= 'studentsdb';
$username= 'root';
$password='';

$dsn="mysql:host=$host;dbname=$database;";

try{
    $databaseconnection = new PDO ($dsn,$username,$password);
    $databaseconnection ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'Connection to the database has been successful';
}
catch(PDOException $err){
    echo 'Database FAILED to connect';
}