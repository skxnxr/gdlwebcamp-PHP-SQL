<?php

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

    //die(json_encode($_POST));

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $opciones = array (
        'cost' => 10
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
        include_once 'funciones/funciones.php';
        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if($id_registro > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro
            );
            //die(json_encode($respuesta));
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();

    } catch (\Throwable $th) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));
}

if (isset($_POST['login-admin'])) {
    //die(json_encode($_POST));

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {
        include_once 'funciones/funciones.php';
        $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {
                if (password_verify($password, $password_admin)) {
                    $respuesta = array(
                        'respuesta' => 'exitoso',
                        'usuario' => $nombre_admin
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            }else{
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        }
        
    } catch (\Throwable $th) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));

}