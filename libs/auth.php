<?php

function getcurentuserid() {  

    return getlogeinuser()->id;
}
function isloggein(){
    return isset($_SESSION['login']) ? true : false;
}

function getlogeinuser() {
    return $_SESSION['login'] ?? null ;
}


function  rigester($userdata){
    global $pdo;
    $passhash = password_hash($userdata['password'], PASSWORD_BCRYPT);
    $sql2 = "insert into users (name,password,email) values (:name,:pass,:email); ";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([':name'=>$userdata['name'] , ':pass' =>$passhash ,':email' =>$userdata['email'] ] );
    return $stmt->rowCount() ? true: false;
}


function getuseremail($email){
    global $pdo ;
    $sqlemail = "SELECT * FROM users WHERE email = :email ";
    $stmt = $pdo->prepare($sqlemail);
    $stmt->execute([':email' => $email ] );
    $record = $stmt->fetchAll(  PDO::FETCH_OBJ);
    return $record[0] ?? null;
}

function logout(){
    unset($_SESSION['login']);
}

function login($email,$password){
   $user = getuseremail($email);
   if(is_null($user)){
    return false;
   }
   if(password_verify($password,$user->password)){
    $user->image = "https://www.gravatar.com/avatar/" . hash( "sha256", strtolower( trim( $email ) ) );
    $_SESSION['login'] = $user;

    return true;
   }
   return false;

}