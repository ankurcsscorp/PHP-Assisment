<html>
<head>
<title>Thank you page</title>
</head>
<body>
<?php
require 'project_connection.php';
$query="TRUNCATE TABLE purchase";
$resultObj = $connection->query($query);
?>
<h3><?php echo "Thank you for shopping !..."; ?></h3>
<p>Your product will be deliver sortly</p>
</body>
</html>