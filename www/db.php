<?php
session_start();


$conn = mysqli_connect('dbtienda', 'root', 'test', 'Tienda');
$conn->set_charset('utf8');

// if(!isset($conn)){
//   echo 'No se pudo conectar a la base de datos';
// }

// echo "conexcion exitosa";
