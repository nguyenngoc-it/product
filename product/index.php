<?php
include_once "DataProduct.php";
include_once "Product.php";
$products= DataProduct::loadData();


    if ($_REQUEST['page'] == 'delete'){
        $id = $_REQUEST['id'];
        array_splice($products,$id,1);
        DataProduct::saveData($products);
        header("location:index.php");
    }

if (isset($_REQUEST['sort'])){
    if ($_REQUEST['sort'] == 'up'){
        $products = DataProduct::sortproduct('up');
    } else {
        $products = DataProduct::sortproduct('down');
    }
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
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    img {
        width: 50px;
    }
</style>
<body>

<form method="post" >
    <button name="add">Add product</button>


     <a href="index.php?sort=up">Sort Up</a>
      <a href="index.php?sort=down">Sort Down</a>




    <table>
        <caption>Danh sach san pham</caption>
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_POST['add'])){
            header('location: addproduct.php');
        }

        foreach ($products as $key=>$product){ ?>
            <tr>
                <td><?php echo $product->getId()?></td>
                <td><?php echo $product->getName()?></td>
                <td><?php echo $product->getPrice()?></td>
                <td>
                    <a href="editproduct.php?id=<?php echo $product->getId() ?>">Edit
                        <!--                        <button name="edit">Edit</button>-->
                    </a>
                    <a href="index.php?page=delete&id=<?php echo $key ?>">Delete
                        <!--                        <button name="delete">Delete</button>-->
                    </a>
                </td>


            </tr>
       <?php } ?>
        </tbody>
    </table>

</form>
</body>
</html>