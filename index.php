<?php

$dbPassword = "ankur@12345";
$dbUserName = "ankur";
$dbServer = "localhost";
$dbName = "aks";

$connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);

if($connection->connect_errno)
{
    exit("Database Connection Failed. Reason: ".$connection->connect_error);
}

?>


<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style = "width : 65%">
<h2>Shopping cart</h2>
<?php
$query= "select * from shopingcart order by product_id asc";
$result=mysqli_query(con.$query);
if(mysqli_num_row($result) >0)
{
while($row=fatch($result))
{
    ?>
    <div class="coll-mid-3">
    <form method= "post" action="index.php?action=add&id =<?php echo $row["id"] ?>>
    <div class="product">
    
    <img src="<?php echo $row["image"]; ?>" class="image-responcive">
    <h5 class = "text-info"><?php $row["pname"];?></h5>
    <h5 class = "text-danger"><?php $row["price"];?></h5>
    <input type="text" name="quantity" class="form-control" value="1">
    <input type="hidden" name="hidden-name"  value=<?php echo $row["pname"] ?>>
    <input type="hidden" name="hidden-price"  value=<?php echo $row["price"] ?>>
    <input type="submit" name="add" style="margine-top:5px;" class="btn-sucess" value="add-cart">
    </div>
    </form>
    </div>
    <?php
}
}
?>
<div style="clear :both"></div>
<h3 class="title2">Shoping cart detail</h3>
<tr>
<th width="30%"> product id</th>
<th width="10%"> product name</th>
<th width="13%"> price detail</th>
<th width="10%"> total price</th>
<th width="17%"> remove</th>
</tr>
<?php
if(!empty($_session["cart"]))
{
    $total=0;
    foreach($_session["cart"] as $key=>$value)
    {
        ?>
        <tr>
        <td> <?php echo $value["item-name"]; ?></td>
        <td> <?php echo $value["item-quantity"]; ?></td>
        <td> <?php echo $value["item-price"]; ?></td>
        <td> <?php $value["item-quantity"]*$value["product-price"]; ?></td>
        <td><a href="cart.php?action=delete&id= <?php echo $value["product-id"]; ?>"><span class="text-denger">Remove item</td>
        </tr>
        <?php
        $total=$total+($value["item-quantity"]*$value["product-price"]);
        ?>
       
        <tr>
        <td colspan="3" > total</td>
        <th>$<?php echo number_format(total,decimal2); ?></th>
        </tr>
        <?php
        }
        ?>
    
}
</body>
</html>
