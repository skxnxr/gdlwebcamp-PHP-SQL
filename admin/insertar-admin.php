<?php
include_once 'funciones/funciones.php';

// echo "<pre>";
//     var_dump($_POST);
// echo "</pre>";

//Para comprobar la conexion a la BD:
// if($conn->ping()){
//     echo "Conectado";
// }else{
//     echo "No";
// }

if (isset($_POST['agregar-admin'])) {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $opciones = array (
        'cost' => 10
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    //echo $password_hashed;

}