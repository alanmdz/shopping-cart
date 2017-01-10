<?php
$db_conx = mysqli_connect("server106.web-hosting.com", "artdwjld_builder", "lkmn3190", "artdwjld_artdecor");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
} else {
	echo "Successful database connection, happy coding!!!";
}
?>
