<?php
require dirname(__FILE__) . '/dbconfig.php';
require dirname(__FILE__) . '/utils.php';

try {
    $conn = mysqli_connect($host,$username,$password,$dbname);
    // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "Connected to $dbname at $host successfully.";
    // $sql = 'SELECT event FROM events';

    $sql = "SELECT id, title, start, end FROM events2";
    $result = mysqli_query($conn, $sql);

    $output_arrays = array();

    while ($row = mysqli_fetch_assoc($result)) {
            // printf ("%s (%s)\n", $row["id"], $row["title"]);
            //$rows[]=$row;
        $event = new Event($row);
        // If the event is in-bounds, add it to the output
        $output_arrays[] = $event->toArray();
        // print_r($output_arrays);
    }


    echo json_encode($output_arrays);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
