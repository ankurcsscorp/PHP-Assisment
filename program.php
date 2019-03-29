<?php
require 'project_connection.php';

$query = "SELECT product_id,product_name, image, price FROM shopingcart";
$resultObj = $connection->query($query);

?>

<!DOCTYPE html>
<html>
    <head>
    <style>
     tr ,th,td{
            border: solid black 1px;
            border-collapse: collapse;
            text-align : center;
        }
        body 
        {
            width : 75%;
            margin : auto;
           
        }
    </style>
    </head>
    <body>
    
        <div id="Body">
            <form method="POST" action="final.php">
                <div>
                    <table>
                   
                    <tr>
                        <th> Product_id</th> 
                        <th> Product_name</th> 
                        <th> pro_image</th> 
                        <th> Pro_price</th>
                        <th> Quantity </th>
                     </tr>

                        <tr>
                        <?php while($row = $resultObj->fetch_assoc()): ?>
                            <td>
                            <?=$row['product_id']?>
                            </td>
                            <td>
                            <input type="text" value="<?=$row['product_name']?>" name="prod_name" readonly="true"> 
           
                            </td>
                            <td>
                            <img src="<?=$row['image']?>" height='50px' width='50px'>
                            </td>
                            <td>
                            <input type="number" value="<?=$row['price']?>" name="price" readonly="true">             
                            </td>
                           
                   
                            <td>
                         
                            <button name='submit' value='<?=$row['product_id']?>'>+1</button>
                           
                            </td>
                            </tr>
                        <?php endWhile; ?>
                       
                        </table>
                   
                </div>      
            </form>
        </div>
    </body>
</html>
