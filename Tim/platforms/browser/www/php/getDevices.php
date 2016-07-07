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

	$prezzo=NULL;
    if(isset($_POST['id'])) $type = $_POST['id'];
    else $type = "1"; //debug
	
	
    if(isset($_POST['cont'])) $cont = $_POST['cont'];
    else $cont = ""; //debug
	
    switch($type) {
        case "1":{
		$query = "SELECT * FROM dispos WHERE tipo_d LIKE 'ST' $cont";
        break;
		}
		case "2":{
		$query = "SELECT * FROM dispos WHERE categoria_d LIKE 'Smartphone' $cont";
        break;
		}
		case "3":{
		$query = "SELECT * FROM dispos WHERE categoria_d LIKE 'iPhone' $cont";
        break;
		}
		case "4":{
		$query = "SELECT * FROM dispos WHERE tipo_d LIKE 'ST' AND categoria_d LIKE 'Altro' $cont";
        break;
		}
		case "5":{
		$query = "SELECT * FROM dispos WHERE tipo_d LIKE 'TSL' $cont";
        break;
		}
		case "6":{
		$query = "SELECT * FROM dispos WHERE categoria_d LIKE 'Smart-TV' $cont";
        break;
		}
		case "7":{
		$query = "SELECT * FROM dispos WHERE categoria_d LIKE 'Smartwatch' $cont";
        break;
		}
		case "8":{
		$query = "SELECT * FROM dispos WHERE tipo_d LIKE 'TSL' AND categoria_d LIKE 'Altro' $cont";
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