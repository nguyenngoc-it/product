<?php
include_once "DataProduct.php";
include_once "Product.php";
$products= DataProduct::loadData();
if (isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    $product = DataProduct::getProductById($id);

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="updateproduct.php">
    <input type="hidden" name="id" placeholder="input id" value="<?php echo $product->getId()?>"><br>
    <input type="text" name="name" placeholder="input name" value="<?php echo $product->getName()?>"><br>
    <input type="text" name="price" placeholder="input price" value="<?php echo $product->getPrice()?>"><br>
    <button name="update product">Add</button>
</form>

</body>
</html>