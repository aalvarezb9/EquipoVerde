<?php
session_start();
    header("Content-Type: application/json");
    include_once('../Class/Login.php');
    $_POST = json_decode(file_get_contents('php://input'), true);
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $result = null;
            $user = Login::verifyCredentials($_POST['email'], sha1($_POST['password']));
            if($user == false){
                $result = array(
                    "status" => "nook",
                    "token" => null
                );
                setcookie("token", "",time()-1, "/");
                setcookie("user", "",time()-1, "/");
                echo json_encode($result);
            }else{
                error_reporting(0);
                $result = array(
                    "status" => "ok",
                    "token" => sha1(uniqid(rand(), true))
                );
                $_SESSION["token"] = $result["token"];
                setcookie("token", $result["token"], time()+(60*60*24*31), "/");
                setcookie("user", $user["user"], time()+(60*60*24*31), "/");
                echo json_encode($result);
            }

        break;
    }
?>