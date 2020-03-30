<?php
include_once 'funciones/funciones.php';

$titulo = $_POST['titulo_evento'];
$categoria_id = $_POST['categoria_evento'];
//Obtener la fecha
$fecha = $_POST['fecha_evento'];
$fecha_formateada = date('Y-m-d', strtotime($fecha));
// $hora = $_POST['hora_evento'];
$invitado_id = $_POST['invitado'];
$id_registro = $_POST['id_registro'];

//Formateando la hora que envía el Timepicker
$date = $_POST['hora_evento'];
    $timeType = explode(" ", $date);
    $timeItems = explode(":", $timeType[0]);
    if($timeType[1] == "PM"){
        $timeItems[0] += 12;
    }
    $time = implode(":", $timeItems);
    $time .= ":00";

if ($_POST['registro'] == 'nuevo') {

    // die(json_encode($_POST));

    try {
        $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssii", $titulo, $fecha_formateada, $time, $categoria_id, $invitado_id);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                // 'titulo' => $titulo,
                // 'fehca' => $fecha_formateada,
                // 'hora' => $hora,
                // 'cate' => $categoria_id,
                // 'inv' => $invitado_id,
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

    //Script curso para la hora
    //$hora_formateada = date('H:i', srtotime($hora));
    try {
        $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ? WHERE evento_id = ? ');
        $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $time, $categoria_id, $invitado_id, $id_registro);
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
        $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin = ? ");
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


