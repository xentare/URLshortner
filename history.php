<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 29.3.2015
 * Time: 18:53
 */

require_once 'resources/config.php';

if(!isset($_SESSION["logged"]) && !$_SESSION["logged"]){
    header('Location: index.php');
}


//Returns URLs shortened by certain user. Uses id stored in session (See index.php)
//Adds the server+path so the short URL is complete
function getUrls(){
    $sql = "SELECT * FROM urls WHERE user='".$_SESSION["id"]."'ORDER BY id DESC LIMIT 6"; //Get 6 latest by descending order
    $result = mysql_query($sql);
    $url = "http://gcdsrv.com/~jjj/l.php?l=";
    while($row = mysql_fetch_array($result)){
        echo "<td>".$url.$row["shortUrl"]."</td>"."</tr>";
    }
    //"<tr>"."<td>".$row["url"]."</td>".
}

//Is history.php open
if($_SESSION["url"] == "history.php"){
    require_once 'resources/header.php'; setTitle("History");?>
    <!--All shit to be done here--!>
<?php require_once 'resources/footer.php';
}



?>