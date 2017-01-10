<?php
$db_host="localhost";
$db_username="alandot5_admin";
$db_pass="japan505";
$db_name="alandot5_amarysflowershop";

$myConnection=mysqli_connect("$db_host", "$db_username", "$db_pass") or die ("Could no connect to mysql");
mysqli_select_db($myConnection,"$db_name") or die ("no database");
?>
