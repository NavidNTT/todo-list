<?php

use Symfony\Component\Mime\Message;

include "bootstrap/init.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_GET['action'] ?? null;
    $param = $_POST;
    if($action == 'rigester'){
        $result = rigester($param);
        if(!$result){
            echo'rigester is eror';
        }else{
            echo 'you are now rigester';
        }
    }elseif ($action == 'login'){
        $result = login($param['email'], $param['password']);
        if(!$result){
            echo 'nooo';
        }else{
        redirect(site_url());
        }
    }
}

include "tpl/tpl-auth.php";