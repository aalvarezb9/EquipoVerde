
<?php
    include('conexion.php');
    $con = conexion();
    $id = 1;
    $sql = "SELECT * FROM usuarios";
    $result = $con -> query($sql);
    $myArray=array();
    while($row = $result ->fetch_assoc()){
        $myArray[]=$row;
    }


    print_r($myArray);
    /*$myArray = array();
    if($result -> num_rows > 0){
        while ($row = $result ->fetch_assoc()){
            print_r($row['name']);
        };
    };*/
    /*$sql2="INSERT INTO usuarios (`name`, `lastname`, `email`, `password`, `country`, `institution`, `gender`, `estado`) VALUES ('María','Pineda','mf@unah.hn', 'asd', 'Honduras',  'UNAH', 'F', 'activo')";
    $con -> query($sql2);*/

    $array = array(
        "foo" => "bar",
        "bar" => "foo",
        100   => -100,
        -100  => 100,
    );
    /*var_dump($array);*/
   /* print_r($myArray);*/

?>