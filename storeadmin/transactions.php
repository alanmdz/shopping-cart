<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: admin_login.php");
    exit();
}
// Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database
include "../storescripts/connect_to_mysql.php";
$sqli = mysqli_query($myConnection, "SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($sqli); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ArtDecor Admin Area</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
<?php include_once("../template_header.php");?>


<?php $result = mysqli_query($myConnection,"SELECT * FROM transactions Order By id DESC");


			echo "<table border='1'>
			<tr>
			<th>Customer Information</th>
			<th>Total</th>
			<th>Status</th>
			<th>Purchase Date</th>

			</tr>";

			while($row = mysqli_fetch_array($result))
			{
			echo "<tr>";
			echo "<td>" . $row['payer_email'] . "</td>";
			echo "<td>" . $row['mc_gross'] . "</td>";
			echo "<td>" . $row['payment_status'] . "</td>";
			echo "<td>" . $row['payment_date'] . "</td>";
			echo "</tr>";
			}
			echo "</table>";

      include_once("../logout_footer.php");
			mysqli_close($myConnection);?>
</div>
    </body>
    </html>
