<?php include_once 'includes/templates/header.php'; 

use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
require 'includes/paypal.php'; 
?>   

<section class="section contenedor">
    <h2>Resumen del registro</h2>

    <?php   
    $paymentId = $_GET['paymentId'];
    $id_pago = (int) $_GET['id_pago'];

    //Peticion a REST API
    $pago = Payment::get($paymentId, $apiContext);
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    //Rsultado tiene la infrmación de la transación:
    $resultado = $pago->execute($execution, $apiContext);
      // echo "<pre>";
      // var_dump($resultado);
      // echo "</pre>";
    $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;
    //var_dump($respuesta);
    //return;

                if ($respuesta === "completed") {
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