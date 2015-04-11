<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 19.3.2015
 * Time: 20:17
 */
$db_hostname = "gcdsrv.com";
$db_username = "jjj";
$db_password = "yugoye70";
$db_schema = "jjj_database";

mysql_connect($db_hostname, $db_username, $db_password)  OR DIE ('Unable to connect to database!');
mysql_select_db($db_schema);

/*//http://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    header('Location: index.php');
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp*/

$shortUrlBase = "http://gcdsrv.com/~jjj/l.php?l=";

ob_start(); //Start buffer


session_start();
//Grab the url and store in session
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$_SESSION["url"] = str_replace("/~jjj/","",$_SESSION["url"]);


function setTitle($title){
    $buffer=ob_get_contents(); //Store HTML in variable
    ob_end_clean(); //Empty the buffer
    $buffer=str_replace("%TITLE%",$title,$buffer); //Replace Title
    echo $buffer; //echo HTML
}

?>