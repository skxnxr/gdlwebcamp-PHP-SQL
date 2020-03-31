<?php
include_once 'funciones/funciones.php';

$nombre_categoria = $_POST['nombre_categoria'];
$icono = $_POST['icono'];
$id_registro = $_POST['id_registro'];

if ($_POST['registro'] == 'nuevo') {

     //die(json_encode($_POST));

    try {
        $stmt = $conn->prepare("INSERT INTO categoria_evento (cat_evento, icono) VALUES (?,?)");
        $stmt->bind_param("ss", $nombre_categoria, $icono);
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
        $stmt = $conn->prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ? ');
        $stmt->bind_param('ssi', $nombre_categoria, $icono, $id_registro);
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
        $stmt = $conn->prepare("DELETE FROM categoria_evento WHERE id_categoria = ? ");
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


