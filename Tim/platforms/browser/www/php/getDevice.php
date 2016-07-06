<?php
/*
 * Tim Website: HYP Project 2015-16
 * getDevices.php
 * Query for Smartphone & Telefoni
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


    if(isset($_POST['id'])) $type = $_POST['id'];
    else $type = "1"; //debug
    
    if(isset($_POST['flag'])) $flag = $_POST['flag'];
    else $flag = "0"; //debug
    
    if(isset($_POST['flag2'])) $flag2= $_POST['flag2'];
    else $flag2 = "0"; //debug
	
    $query = "SELECT * FROM dispos WHERE id_d=$type";


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