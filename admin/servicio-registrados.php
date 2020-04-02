<?php   
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';

//Para elminar el modo estricto, escribir en la consola de la tabla:
//Primero Chequear con: SHOW VARIABLES LIKE 'sql_mode';
//Si es necesario deshabilitar:
//set global sql_mode='';
//Para volverlo a habilitar set global sql_mode='STRICT_TRANS_TABLES';

$sql = "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY DATE(fecha_registro) ORDER BY fecha_registro ";
$resultado = $conn->query($sql);

    $arreglo_registros = array();
    while ($registro_dia = $resultado->fetch_assoc()) {
        $fecha = $registro_dia['fecha_registro'];
        $registro['fecha'] = date('Y-m-d', strtotime($fecha));
        $registro['cantidad'] = $registro_dia['resultado'];

        $arreglo_registros[] = $registro;
    }

echo json_encode($arreglo_registros);