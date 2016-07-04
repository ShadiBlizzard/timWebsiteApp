<?php
/*
 * Tim Website: HYP Project 2015-16
 * getDevices.php
 * Query for Devices
 * Author: Sapuppo Samuel
 */

header('Access-Control-Allow-Origin: *');

require_once 'config.php';

//connection to db
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) { //verify connection
    echo "Error to connect to DBMS: ".mysqli_connect_error(); //notify error
    exit(); //do nothing else
}
		
else {   
		$query = "SELECT * FROM dispos WHERE prezzo_int_d !="";

    //query execution
    $result = $mysqli->query($query);
    //if there are data available
    if($result->num_rows >=0)
    {
        $myArray = array();//create an array
        while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = array_map('utf8_encode', $row);
        }
        echo json_encode($myArray);
    }
	

    //free result
    $result->close();

    //close connection
    $mysqli->close();
}
?>