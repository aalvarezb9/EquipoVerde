<?php 
    header("Content-Type: application/json");
    include_once('../Class/User.php');  
    $_POST = json_decode(file_get_contents('php://input'), true);
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $user = new User(
                $_POST["name"],
                $_POST["lastname"],
                $_POST["email"],
                $_POST["institution"],
                sha1($_POST["password"]),
                $_POST["country"],
                $_POST["gender"],
                $_POST["image"]
            );
            $user->userExists();
        break;
        case 'GET':
            User::getUser($_GET['id']);
        break;
        case 'PUT':
            User::updateUser(
                $_GET["id"],
                $_POST["new"]
                // $_POST["name"],
                // $_POST["lastname"],
                // $_POST["id"],
                // $_POST["email"],
                // $_POST["country"],
                // $_POST["gender"],
                // $_POST["institution"],
                // sha1($_POST["password"]),
                // $_POST["image"]
            );
        break;
        case 'DELETE':
            User::deleteUser($_GET['id']);
        break;
    }
?>