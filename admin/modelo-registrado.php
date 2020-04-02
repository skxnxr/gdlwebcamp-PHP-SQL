<?php
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
//Boletos
$boletos_adquiridos = $_POST['boletos'];
//Camisas y etiquetas
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);

$total = $_POST['total_pedido'];
$regalo = $_POST['regalo'];

$eventos = $_POST['registro_evento'];
$registro_eventos = eventos_json($eventos);

$fecha_registro = $_POST['fecha_registro'];
$id_registro = $_POST['id_registro'];

if ($_POST['registro'] == 'nuevo') {

    //die(json_encode($_POST));

    try {
        $stmt = $conn->prepare("UPDATE registrados SET nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, 1 )");
        $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado 
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error',
                'error' => mysqli_error($conn)
            );
        }
        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'actualizar') {
    //die(json_encode($_POST));

    try {
        $stmt = $conn->prepare('UPDATE registrados SET nombre_registrado = ?, apellido_registrado = ?, email_registrado = ?, fecha_registro = ?, pases_articulos = ?, talleres_registrados =  ?, regalo = ?,  total_pagado = ?, pagado = 1  WHERE id_registrado = ? ');
        $stmt->bind_param('ssssssisi', $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total, $id_registro );
        $stmt->execute();
       if ($stmt->affected_rows > 0) {
           $respuesta = array (
               'respuesta' => 'exito',
               'id_actualizado' => $id_registro 
           );
       }else{
            $respuesta = array (
            'respuesta' => 'error',
            'error' => mysqli_error($conn)
        ); }
       $stmt->close();
       $conn->close();
    } catch (Exception $e) {
        $respuesta = array (
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}


if ($_POST['registro'] == 'eliminar') {
    //die(json_encode($_POST));
    $id_borrar = $_POST['id'];
    try {
        $stmt = $conn->prepare("DELETE FROM registrados WHERE id_registrado = ? ");
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta = array (
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        }else{
            $respuesta = array (
                'respuesta' => 'error',
                'error' => mysqli_error($conn)
            );
        }
    } catch (Exception $e) {
        $respuesta = array (
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}


