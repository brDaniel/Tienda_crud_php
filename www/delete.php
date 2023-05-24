<?php
include_once 'db.php';
/* Redirecciona a una página diferente en el mismo directorio el cual se hizo la petición */
$host  = $_SERVER['HTTP_HOST'];
if(isset($_GET['id'])){
  
  $id = $_GET['id'];
  $query = "DELETE FROM Products WHERE id = $id";
  $result = mysqli_query($conn,$query);

  if(!$result){
    die("no se logro eliminar el producto");
  }
  $_SESSION['message']='A product has been delete!';
  $_SESSION['message_type']='danger';
  header("location: http://$host");
}
