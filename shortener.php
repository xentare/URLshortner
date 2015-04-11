<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 29.3.2015
 * Time: 17:34
 */

require_once 'resources/config.php';
setTitle("Shortener");

$url = $_GET["url"];
if(isset($_GET["submit"])) {
    shorten($url);
    header('Location: home.php');
}
function shorten($url){
    $sql = "INSERT INTO urls (url,user) VALUES ('$url','".$_SESSION["id"]."')";
    mysql_query($sql); //Insert original url and user info
    $id = mysql_insert_id(); //Get the last unique autoincrement key
    $shortUrl = base_convert($id,10,32); //Convert key to base32, (Can be hardcoded to use base64)
    $sql = "UPDATE urls SET shortUrl='$shortUrl' WHERE id='$id'"; //Finally update the table where id is the grabbed unique key
    mysql_query($sql);
}


?>