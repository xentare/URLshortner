<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 19.3.2015
 * Time: 21:26
 */
require_once 'resources/config.php';

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "INSERT INTO users (username, password) VALUES ('".$username."','".$password."')";
mysql_query($sql);

if(mysql_error() == ''){
    echo "Registeration was succesfull!";
}

?>
<br>
<a href="index.php">Get back</a>