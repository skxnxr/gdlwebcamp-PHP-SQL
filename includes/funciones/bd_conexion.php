<?php 
    $conn = new mysqli('localhost', 'root', 'root', 'gdlwebcamp') ;
    
    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }

    /* cambiar el conjunto de caracteres a utf8 */
// if (!$mysqli->set_charset("utf8")) {
//     printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
//     exit();
// } else {
//     printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
// }
?>