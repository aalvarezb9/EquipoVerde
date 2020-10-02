<?php
header("Content-Type: application/json");
/*include('../API/conexion.php');*/

// include_once('tarjeta/tarjeta.php');
    class User{
        private $name;
        private $lastname;
        private $email;
        private $institution;
        private $password;
        private $country;
        private $gender;

        public function __construct(
            $name,
            $lastname,
            $email,
            $institution,
            $password,
            $country,
            $gender
        )
        {
            $this->name = $name;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->institution = $institution;
            $this->password = $password;
            $this->country = $country;
            $this->gender = $gender;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of lastname
         */ 
        public function getLastname()
        {
                return $this->lastname;
        }

        /**
         * Set the value of lastname
         *
         * @return  self
         */ 
        public function setLastname($lastname)
        {
                $this->lastname = $lastname;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of institution
         */ 
        public function getInstitution()
        {
                return $this->institution;
        }

        /**
         * Set the value of institution
         *
         * @return  self
         */ 
        public function setInstitution($institution)
        {
                $this->institution = $institution;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPw()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPw($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of country
         */ 
        public function getCountry()
        {
                return $this->country;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */ 
        public function setCountry($country)
        {
                $this->country = $country;

                return $this;
        }

        /**
         * Get the value of gender
         */ 
        public function getGender()
        {
                return $this->gender;
        }

        /**
         * Set the value of gender
         *
         * @return  self
         */ 
        public function setGender($gender)
        {
            $this->gender = $gender;
            
            return $this;
        }
        /**
         * Get the value of image
         */ 
        public function conexion(){
            $conexion = mysqli_connect("localhost", "root", "", "proyecto-morazan");
            return $conexion;
        }

        // Funciones relacionadas a la manipulación de información
        public function userExists(){
            $emailExists = false;
            $con=self::conexion();
            $sql="SELECT * FROM usuarios";
            $resultado = $con -> query($sql);
            if($resultado -> num_rows > 0){
                while($row = $resultado -> fetch_assoc()){
                    if($this->email==$row["email"]){
                        $emailExists=true;
                        break;
                    }
                }
                if($emailExists == true){
                    self::nook();
                }else{
                    $this->saveUser();
                    self::ok();
                }

            } else{
                self::ok();
            }  
        }

        public function saveUser(){
            $con=self::conexion();
            
            $nombre = $this->name;
            $apellido = $this->lastname;
            $email = $this->email;
            $country = $this->country;
            $gender = $this->gender;
            $password = $this->password;
            $institution =$this->institution;
            $sql="INSERT INTO usuarios (`name`, `lastname`, `email`, `password`, `country`, `institution`, `gender`, `estado`) VALUES ('$nombre','$apellido','$email', '$password', '$country',  '$institution', '$gender', 'activo')";
            $con -> query($sql);
        }

        public static function getUser($id){
            if($id == 'all'){
                echo json_encode(self::getFile());
            }else{
                echo json_encode(self::getUserFromDB($id));
            }
            // self::getFile($id);
        }

        public static function deleteUser($id){
            $con = self::conexion();
            $sql = "DELETE FROM `usuarios` WHERE `id`='$id'";
            $con ->query($sql);

        }

        public static function updateIds($id, $users){
            for($i = $id; $i < sizeof($users); $i++){
                (int)$users[$i]["id"] -= 1;
            }

            return $users;
        }

        public static function updateUser($id, $newData){
            $con=self::conexion();
            $nombre = $newData["name"];
            $apellido = $newData["lastname"];
            $email = $newData["email"];
            $country = $newData["country"];
            $gender = $newData["gender"];
            $password = sha1($newData["password"]);
            $institution =$newData["institution"];

            $sql= "UPDATE usuarios 
                SET `name`='$nombre',
                `lastname`='$apellido',
                `email`='$email', 
                `country`='$country', 
                `gender`='$gender', 
                `password`='$password', 
                `institution`='$institution' 
                WHERE `id`='$id'";

            $con->query($sql);
        }

        public static function getFile(){
            // $con = self::conexion();

            // $sql = "SELECT name FROM usuarios WHERE id = $id";
            $content_file = file_get_contents("../Data/Users.json");
            $content = json_decode($content_file, true);

            return $content;
        }

        public static function write($data){
            $file = fopen('../Data/Users.json', 'w');
            fwrite($file, json_encode($data));
            fclose($file);
        }

        public static function getUserFromDB($id){
            $con = self::conexion();

            $sql = "SELECT name, email, lastname, country, institution, gender FROM usuarios where id = $id";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();


            return $row;
        }
        
        public static function ok(){
            echo json_encode(array(
                "status" => "ok"
            ));
        }

        public static function nook(){
            echo json_encode(array(
                "status" => "nook"
            ));
        }

    }
?>