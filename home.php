<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 19.3.2015
 * Time: 21:00
 */
require_once 'resources/config.php';

if(!$_SESSION["logged"]){
    header("Location: index.php");
}

include 'resources/header.php';
include 'history.php';
setTitle("Home");

?>

<form method="get" action="shortener.php">
    <input id="input_url"type="url" name="url" required>
    <input id="shorten_button" type="submit" name="submit" value="Shorten!">
</form>

<aside>
<table id="shortUrlsHome">
    <h2>Recently shortened links: </h2>
    <?php getUrls() ?>
</table>
</aside>
<?php include 'resources/footer.php'; ?>