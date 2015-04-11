<?php
/**
 * Created by PhpStorm.
 * User: Juha
 * Date: 30.3.2015
 * Time: 18:51
 */

require_once 'resources/config.php';

if(!$_SESSION["logged"]){
    header("Location: index.php");
}

function getData($shortUrlBase)
{
    //Get the shortened links by current user
    $sql = "SELECT * FROM urls WHERE user='".$_SESSION["id"]."'";
    $result = mysql_query($sql);
    //Loop the short links and get their data from redirects table
    while($row = mysql_fetch_array($result)) {
        $sql = "SELECT * FROM redirects WHERE url='" . $row["shortUrl"] . "'";
        $result2 = mysql_query($sql);

        //Finally echo data...
        $i = 0;
        echo $shortUrlBase.$row["shortUrl"]." click count: ";
        while($row = mysql_fetch_array($result2)){
            $i++;
        }
        echo $i;
        echo "<br>";
    }
}
include 'resources/header.php';
?>
<h1>Statistics</h1>
<?php getData($shortUrlBase);
include 'resources/footer.php'; ?>