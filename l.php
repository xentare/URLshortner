<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 29.3.2015
 * Time: 19:29
 */

require_once 'resources/config.php';

if(isset($_GET["l"])){
    redirect();
}

//Stores IP address
function redirect(){
    $sql = "SELECT * FROM urls WHERE shortUrl='".$_GET["l"]."'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);

    $sql = "INSERT INTO redirects (ip,url) VALUES ('".$_SERVER["REMOTE_ADDR"]."','".$_GET["l"]."')";
    mysql_query($sql);

    header("Location:".$row["url"]."");
}

?>