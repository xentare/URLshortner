<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 19.3.2015
 * Time: 18:52
 */

//Connect to database with config file
require_once 'resources/config.php';
mysql_query($sqlApiAccess);

session_start();
if($_SESSION["logged"]){
    header("Location: home.php");
}

function login($user, $pass)
{
    $sql = "SELECT * FROM users";
    $result = mysql_query($sql);

    while ($row = mysql_fetch_array($result)) {
        if ($row["username"] == $user && $row["password"] == $pass) {
            return $row["id"];
        }
    }
    return false;
}

//When using header modification, make sure no headers are sent before
//(that's why php has to be executed at very first)
if(isset($_POST["username"]) && isset($_POST["password"])) {
    $id = login($_POST["username"], $_POST["password"]);
    if (!$id) {
        $loginMessage = "Login failed!";
    } else {
        session_start();
        $_SESSION["logged"] = true;
        $_SESSION["id"] = $id; //Sets unique user id from database to session
        header("Location: home.php");
        die(); //Not sure if these are necessary
        exit();
    }
}
?>
<?php include 'resources/header.php'; setTitle("Index");?>
<h1 id="index_h1">Linki.fy</h1>
<div class="container-box">
    <h2>Login</h2>
<form action="" method="post">
    <input class="text" placeholder="Username" type="text" name="username">
    <input class="text" placeholder="Password" type="password" name="password">
    <input type="submit" name="Login" value="Login">
</form>
    <h2>Register</h2>
<form action="register.php" method="post">
    <input class="text" placeholder="Username" type="text" name="username">
    <input class="text" placeholder="Password"  type="password" name="password">
    <input type="submit" name="Register" value="Register">
</form>
<div id="login_message"><?php echo $loginMessage ?></div>
</div>
<?php include 'resources/footer.php';?>