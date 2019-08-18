<?php
require dirname(__FILE__) . '/dbconfig.php';

try {
    $conn = mysqli_connect($host,$username,$password,$dbname);
    if(isset($_POST["id"]))
    {

     $query = "
      DELETE FROM events2 WHERE id = ? ";
     $statement = $conn->prepare($query);
     $statement->bind_param("s" ,
       $_POST['id']
     );
     $statement->execute();
    }
    //
    // echo json_encode($output_arrays);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
