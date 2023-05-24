<?php

include_once 'db.php';

if(isset($_POST['guardar'])){
  $product = $_POST['product'];
  $amount = $_POST['amount'];
  $price = $_POST['price'];
  $query ="INSERT INTO Products(product,amount,price) VALUES ('$product', $amount, $price)";
  $result = mysqli_query($conn,$query);
  if(!$result){
    die('Nose pudo insertar el producto');
  }

  $_SESSION['message']='a new element has been insert';
  $_SESSION['message_type']='success';
  header('Location: index.php');
}