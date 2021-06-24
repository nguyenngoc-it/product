<?php
include_once "DataProduct.php";
include_once "Product.php";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $id= $_POST["id"];
    $name=$_POST["name"];
    $price=$_POST["price"];

    $newproduct= new  Product($id, $name, $price);
    DataProduct::updateData($id, $newproduct);
    header('location: index.php');
}