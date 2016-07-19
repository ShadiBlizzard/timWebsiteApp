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

    switch($type) {

        case "1":{
		$query = "SELECT * FROM dispos WHERE tipo_d LIKE 'ST'";
        break;
		}
		case "2":{
		$query = "SELECT * FROM dispos WHERE categoria_d LIKE 'Smartphone'";
        break;
		}
		case "3":{
		$query = "SELECT * FROM dispos WHERE categoria_d LIKE 'iPhone'";
        break;
		}
		case "4":{
		$query = "SELECT * FROM dispos WHERE tipo_d LIKE 'ST' AND categoria_d LIKE 'Altro'";
        break;
		}
		case "5":{
		$query = "SELECT * FROM dispos WHERE tipo_d LIKE 'TSL'";
        break;
		}
		case "6":{
		$query = "SELECT * FROM dispos WHERE categoria_d LIKE 'Smart-TV'";
        break;
		}
		case "7":{
		$query = "SELECT * FROM dispos WHERE categoria_d LIKE 'Smartwatch'";
        break;
		}
		case "8":{
		$query = "SELECT * FROM dispos WHERE tipo_d LIKE 'TSL' AND categoria_d LIKE 'Altro'";
        break;
		}
       }


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