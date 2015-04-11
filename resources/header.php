<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 29.3.2015
 * Time: 15:54
 */
?>
<!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8">
        <title>%TITLE%</title>
        <link rel="stylesheet" type="text/css" href="resources/style.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="resources/script.js"></script>
    </head>
    <body>

    <header>
        <?php if($_SESSION["url"] != "index.php" && !empty($_SESSION["url"])):?>
        <nav><table><tr><td><a name="home" href="home.php">Home</a></td><td><a name="history" href="history.php">History</a></td><td><a href="statistics.php">Statistics</a></td><td><a href="logout.php">Log out</a></td></tr></table></nav>
        <?php endif; ?>
    </header>

    <main>
