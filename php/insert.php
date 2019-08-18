<?php
require dirname(__FILE__) . '/dbconfig.php';

try {
    $conn = mysqli_connect($host,$username,$password,$dbname);
    if(isset($_POST["title"]))
    {

     $query = "
      INSERT INTO events2
      (TITLE, START, END) VALUES (
      ?,?,?)
     ";
     $statement = $conn->prepare($query);
     $statement->bind_param("sss" ,
       $_POST['title'],
       $_POST['start'],
       $_POST['end']
     );
     $statement->execute();
    }
    //
    // echo json_encode($output_arrays);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
