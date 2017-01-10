<?php

header("location: http://www.alanmdz.com"); /* Redirect browser */
// include "../storescripts/connect_to_mysql.php";
include "cart.php";

//mysqli_query($con,"UPDATE products SET count =(count-$product_quantity) WHERE id = '$product_id' ");

unset($_SESSION["cart_array"]);

exit();
?>
