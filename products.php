<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
include "storescripts/connect_to_mysql.php";
$dynamicList = "";
$sqli = mysqli_query($myConnection, "SELECT * FROM products ORDER BY date_added DESC");
$productCount = mysqli_num_rows($sqli);
if ($productCount > 0) {
	while($row = mysqli_fetch_array($sqli)){
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $count = $row["count"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysqli_close($myConnection);
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Amary's Flower Shop</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<style type="text/css">
body {
	background-color: #ffffff;
}
</style>
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="32%" valign="top" bgcolor="#ffffff"><div>
      <div>&nbsp;</div>
    </div>
      <div>
        <div>
          <div>
            <div>
              <div>
                <div>
                  <div>

                  </div>
                  <div>
                    <div></div>
                  </div>
                </div>
            </div>
              </div>
          </div>
        </div>
    </div>

      <p><?php echo $dynamicList; ?><br />
        </p>
      <p><br />
      </p></td>

      <p>&nbsp;</p></td>
  </tr>
</table>

  </div>
  <?php include_once("template_footer.php");?>
  ,
</div>
</body>
</html>
