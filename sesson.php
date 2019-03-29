
<?php
require 'dbPhpCon.php';

$query = "SELECT PRODUCT_ID,PRODUCT_NAME, IMAGE, PRICE FROM shopping_cart";
$resultObj = $connection->query($query);

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div id="Body">
            <form method="post" action="final.php">
                <div>
                    <table>
                   
                    <tr>
                        <th> PRODUCT ID</th> 
                        <th> PRODUCT NAME</th> 
                        <th> PRODUCT IMAGE</th> 
                        <th> PRODUCT PRICE</th>
                        <th> QUANTITY </th>
                     </tr>

                        <tr>
                        <?php while($row = $resultObj->fetch_assoc()): ?>
                            <td>
                            <?=$row['PRODUCT_ID']?>
                            </td>
                            <td>
                            <input type="text" value="<?=$row['PRODUCT_NAME']?>" name="prod_name" readonly="true"> 
           
                            </td>
                            <td>
                            <img src="<?=$row['IMAGE']?>" height='50px' width='50px'>
                            </td>
                            <td>
                            <input type="number" value="<?=$row['PRICE']?>" name="price" readonly="true">             
                            </td>
                            <td>
                                <select name="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </td>
                   
                            <td>
                            <?php $i=0?>
                            <button name='submit' value=<?php $i?>>Add to cart</button>
                            <?php $i=$i+1?>
                            </td>
                            </tr>
                        <?php endWhile; ?>
                       
                        </table>
                   
                </div>      
            </form>
        </div>
    </body>
</html>

<?php

$resultObj->close();
$connection->close();

?>

