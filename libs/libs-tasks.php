<?php defined('BASE_PATH') OR die("No direct script access allowed");

function deletefolder(  $folder_id ) { 
    global $pdo;
    $sql111 = "delete from folders where id = $folder_id";
    $stmt = $pdo->prepare($sql111);
    $stmt->execute();
    return $stmt->rowCount();


}

function switchdone($task_id){
    global $pdo;
    $current_user_id = getcurentuserid(); 
    try {
        $sql = "UPDATE tasks SET `done` = 1 - `done` WHERE `user_id` = :userid AND `id` = :taskid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':taskid' => $task_id,
            ':userid' => $current_user_id
        ]);
        return $stmt->rowCount(); 
    } catch (PDOException $e) {
        error_log("switchdone error: " . $e->getMessage());
        return 0;
    }
}




function addfolder($folder_name){
    global $pdo;
    $curent_user_id = getcurentuserid();
    $sql2 = "insert into folders (name,user_id)values (:folder_name,:user_id); ";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([':folder_name'=>$folder_name,':user_id' => $curent_user_id] );
    return $stmt->rowCount();
}



function getfolders(){
    global $pdo ;
    $curent_user_id = getcurentuserid();
    $sql = "select * from folders where user_id = $curent_user_id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(  PDO::FETCH_OBJ);
    return $record;
}




function gettasks(){
    global $pdo ;
    $folder = $_GET['folder_id'] ?? null;
    $foldercondition = '';
    if(isset($folder) and is_numeric($folder) ){
        $foldercondition = "and folder_id = $folder";
    }

    $curent_user_id = getcurentuserid();
    $sql33 = "select * from tasks where user_id = $curent_user_id $foldercondition ";
    $stmt = $pdo->prepare($sql33);
    $stmt->execute();
    $record = $stmt->fetchAll(  PDO::FETCH_OBJ);
    return $record;
}

function deletetask(  $task_id ) { 
    global $pdo;
    $sql1 = "delete from tasks where id = $task_id";
    $stmt = $pdo->prepare($sql1);
    $stmt->execute();
    return $stmt->rowCount();


}


function addtask($tasktitle,$folderid){
    global $pdo;
    $curent_user_id = getcurentuserid();
    $sql123 = "insert into tasks (title,user_id,folder_id) values (:title,:user_id,:folder_id); ";
    $stmt = $pdo->prepare($sql123);
    $stmt->execute([':title' => $tasktitle, ':user_id' =>$curent_user_id,':folder_id' => $folderid] );
    return $stmt->rowCount();
}