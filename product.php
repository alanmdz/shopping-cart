<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
if (isset($_GET['id'])) {
    include "storescripts/connect_to_mysql.php";
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
	$sql = mysqli_query($myConnection, "SELECT * FROM products WHERE id='$id' LIMIT 1");
	$productCount = mysqli_num_rows($sql);
    if ($productCount > 0) {
		while($row = mysqli_fetch_array($sql)){
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $count = $row["count"];
			 $details = $row["details"];
         }

	} else {
		echo "That item does not exist.";
	    exit();
	}

} else {
	echo "Data to render this page is missing.";
	exit();
}
mysqli_close($myConnection);
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $product_name; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td width="19%" valign="top"><img src="inventory_images/<?php echo $id; ?>.jpg" width="142" height="188" alt="<?php echo $product_name; ?>" /><br />
      <a href="inventory_images/<?php echo $id; ?>.jpg">View Full Size Image</a></td>
    <td width="81%" valign="top"><h3><?php echo $product_name; ?></h3>
      <p><?php echo "$".$price; ?><br />
 	  <p><?php echo "Available Items: ".$count; ?><br />
 <br />

        <?php echo $details; ?>
<br />
        </p>





      <form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
        <input type="submit" name="button" id="button" value="Add to Cart" <?php if ($count <= 0){ ?> disabled <?php   } ?>/>

      </form>
      </td>
    </tr>
</table>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>
