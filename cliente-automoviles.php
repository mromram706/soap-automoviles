<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Ejemplo de uso de servicio web</title>
</head>
<body>
<?php

try {
    $client = new SoapClient(null, array(
        'location' => 'http://dwes.infinityfreeapp.com/soap-automoviles/service-automoviles-auth.php',
        'uri' => 'http://dwes.infinityfreeapp.com/soap-automoviles/',
        'trace' => 1
    ));

    $client->__setCookie('__test', '3640386b2ea0813a9b93c477470913ec');

    $auth_params = new stdClass();
    $auth_params->username = 'ies';
    $auth_params->password = 'daw';

    $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);

    $header = new SoapHeader('http://dwes.infinityfreeapp.com/soap-automoviles/', 'authenticate', $header_params, false);

    $client->__setSoapHeaders([$header]);

} catch (Exception $e) {
    echo($client->__getLastResponse());
    echo PHP_EOL;
    echo($client->__getLastRequest());
}

?>
</body>
</html>
