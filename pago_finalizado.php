<?php include_once 'includes/templates/header.php'; ?>   

<section class="section contenedor">
    <h2>Resumen del registro</h2>

    <?php   
    $resultado = $_GET['exito'];
    $paymentId = $_GET['paymentId'];
    $id_pago = (int) $_GET['id_pago'];


                if ($resultado === "true") {
                    echo "<div class='resultado correcto'>";
                    echo "El pago se realizo correctamente";
                    echo " el ID de la transacción es: {$paymentId}";
                    echo "</div>";

                    require_once('includes/funciones/bd_conexion.php');
                    $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WHERE id_registrado = ?');
                    $pagado = 1;
                    $stmt->bind_param('ii', $pagado, $id_pago);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();

                }else{
                    echo "<div class='resultado error'>";
                    echo "El pago no se realizó ";
                    echo "</div>";
                }

?>

</section>

<?php include_once 'includes/templates/footer.php'; ?>   