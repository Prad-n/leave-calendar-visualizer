<?php
require dirname(__FILE__) . '/dbconfig.php';
require dirname(__FILE__) . '/utils.php';

try {
    $conn = mysqli_connect($host,$username,$password,$dbname);
    if(isset($_POST["id"]))
    {

     $query = "
     UPDATE events2
     SET title=?, start=?, end=?
     WHERE id=?
     ";
     $statement = $conn->prepare($query);
     $statement->bind_param("ssss" ,
       $_POST['title'],
       $_POST['start'],
       $_POST['end'],
       $_POST['id']
     );
     $statement->execute();
    }
    //
    // echo json_encode($output_arrays);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
