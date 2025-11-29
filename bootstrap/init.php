<?php
session_start();
include "constant.php";
include BASE_PATH . "libs/auth.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "libs/helper.php";
include BASE_PATH . "libs/libs-tasks.php";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$databases;","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $eror) {
    diepage( "pdo error to conect" . $eror->getMessage());
    
}


