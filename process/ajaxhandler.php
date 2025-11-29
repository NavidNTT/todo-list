<?php

use LDAP\Result;

include_once  "../bootstrap/init.php" ;

if(isajaxrequest()){
    diepage("invalid request");
}

if(!isset($_POST["action"]) || empty($_POST["action"])){
    diepage("invalid request");
}


switch($_POST["action"]){
    case"addfolder":
        if(!isset($_POST['foldername']) || strlen($_POST['foldername']) < 4){
            echo'نام فولدر کوتاه است';
             die();
         }
    echo addfolder($_POST['foldername']);
    break;



    case"donetask":
        $task_id = $_POST['taskId'];
        if(!isset($task_id) || !is_numeric($task_id)){
             die();
         }
     echo switchdone($task_id);
    break;



    case "addtask":
        $folderid = $_POST['folderid'];
        $tasktitle = $_POST['tasktitle'];
        if(!isset($folderid) || empty($folderid)){
            echo"فولدر را انتخاب کنید";
            die();
        }

        if(!isset($tasktitle) || strlen($tasktitle) < 3){
            echo"نام تسک باید بزرگتر باشد";
            die();
        }
        echo addtask( $tasktitle, $folderid);
    break;

    default;

    var_dump($_POST);
}
    //     var_dump($_POST);
    // if(!isset($_POST["action"]) && $_POST["action"] == 'donetask'){
    //     $taskid = $_POST['taskId'];
    //     $result = switchdone($taskid);
    //     echo $result;
// }