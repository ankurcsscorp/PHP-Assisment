<?php
require 'project_connection.php';
$val=$_POST['submit'];
$query1 = "SELECT price, product_name  FROM shopingcart where product_id='$val'";
$resultObj = $connection->query($query1);

while($row = $resultObj->fetch_assoc())
{
$PRI=$row['price'];
$P_NAME=$row['product_name'];
//echo $PRI;
}

$query3="INSERT INTO PURCHASE(product, price) VALUES ('$P_NAME','$PRI')";

$resultObj2 = $connection->query($query3);
$query4 = "SELECT COUNT(product) AS QUANTITY,product,price FROM PURCHASE GROUP BY product";
$resultObj3 = $connection->query($query4);
$query5 = "SELECT SUM(price) AS price FROM PURCHASE";
$resultObj4 = $connection->query($query5);
?>

<!DOCTYPE html>
<html>
    <head>
    <style>
    #bill{
        padding:20px;
        color : blue;
        background-color : #836963;
    }
       body{
        
            width:60%;
            margin : auto;
            border : solid black 5px;
           
        }
        tr ,th,td{
            border: solid black 1px;
            border-collapse: collapse;
        }
        #billing
        {
            border: solid black 2px;
        }
        </style>
   
   
    </head>
    <body>

    
    <div id="billing"><h1 id ="bill"> Hii.. Here you can see your bill</h1></div>
    <table>
   
                   
                   <tr>
                       <th> PRODUCT</th> 
                       <th> PRICE</th> 
                       <th> QUANTITY </th>
                       <TH> AMOUNT</TH>
                     
                    </tr>

                       <tr>
                       <?php while($row = $resultObj3->fetch_assoc()): ?>
                       
                           <td>
                           <?=$row['product']?>
                           </td>
                           <td>
                           <?=$row['price']?>
                           </td>
                           <td>
                           <?=$row['QUANTITY']?>
                           </td>
                           <td>
                           <?=$row['QUANTITY']*$row['price']?>
                           </td>
                                               
                       </tr>
                       <?php endWhile; ?>
                       <?php while($row = $resultObj4->fetch_assoc()): ?>
                       <H3>Total Amount to be paid is ==> <?=$row['price']?></H3>
                     
                       <?php endWhile; ?>
                       <form method="POST" action="done.php">
                       <button type="submit"> Buy Now </button>
                       </form>
                       
    </table>
    </body>
</html>
