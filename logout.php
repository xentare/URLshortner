<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 30.3.2015
 * Time: 14:09
 */

session_start();

$_SESSION = array();
session_destroy();
header('Location: index.php');

?>