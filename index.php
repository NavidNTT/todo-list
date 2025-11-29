<?php
include "bootstrap/init.php";

if(isset($_GET['logout'])){
    logout();
}

if(!isloggein()){
 redirect(site_url('auth.php'));
    exit;
}

$user = getlogeinuser();

if(isset($_GET["delete_folder"]) && is_numeric($_GET["delete_folder"])){
    $deletedcount = deletefolder($_GET["delete_folder"]);

}
if(isset($_GET["delete_task"]) && is_numeric($_GET["delete_task"])){
    $deletedcount = deletetask($_GET["delete_task"]);

}
$tasks = gettasks();

$folder = getfolders();

include "tpl/index.php";

