<?php
    require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/gdlwebcamp');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AUstD25aHKVJJVaT_ZsZJuPZYGXVTfOFjOTyP-C9yJTtOzEjHvOgUQa_5no0NTZqbPkS4WbdFpClsq1G', //ClienteID
        'EGxcwYBbKacm-3JYt2fY3DigUXaM7AeUiLyLPG8jPymTrRtxEQl0lkkbPAPQ_ZdwdmQaqrcpXYyeLhaX' // Secret
    )
);

//var_dump($apiContext);

