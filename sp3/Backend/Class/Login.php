<?php

    class Login{
        public function conexion(){
            $conexion = mysqli_connect("localhost", "root", "", "proyecto-morazan");
            return $conexion;
        }
        public static function verifyCredentials($email, $password){
            $con = self::conexion();
            $sql="SELECT * FROM usuarios";
            $result = $con -> query($sql);
            if($result -> num_rows > 0){
                while ($row = $result ->fetch_assoc()){
                    if($row['email'] == $email){
                        if($row['password'] == $password){
                            $user = $row;
                        }
                    break;
                    };
                };
            };
            return $user;
        }

    }
?>