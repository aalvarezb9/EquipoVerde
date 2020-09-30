<?php
    class Login{
        public static function verifyCredentials($email, $password){
            $content = file_get_contents('../Data/Users.json');
            $users = json_decode($content, true);
            $user = false;
            for($i = 0; $i < sizeof($users); $i++){
                if($users[$i]['email'] == $email){
                    if($users[$i]['password'] == $password){
                        $user = $users[$i];
                    }
                break;
                }
            }
            return $user;
        }

    }
?>