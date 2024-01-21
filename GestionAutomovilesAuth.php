<?php
class GestionAutomovilesAuth
{
    private $client;

    public function __construct($soapLocation) {
        $this->client = new SoapClient(null, array(
            'location' => $soapLocation,
            'uri' => 'http://dwes.infinityfreeapp.com/soap-automoviles/',
            'trace' => 1
        ));

        $this->client->__setCookie('__test', '3640386b2ea0813a9b93c477470913ec');

        $auth_params = new stdClass();
        $auth_params->username = 'ies';
        $auth_params->password = 'daw';

        $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);

        $header = new SoapHeader('http://dwes.infinityfreeapp.com/soap-automoviles/', 'authenticate', $header_params, false);

        $this->client->__setSoapHeaders([$header]);
    }

    public function ObtenerMarcas() {
        try {
            $marcas = $this->client->ObtenerMarcas();
            return $marcas;
        } catch (SoapFault $e) {
            echo($client->__getLastResponse());
            echo PHP_EOL;
            echo($client->__getLastRequest());
            return array();
        }
    }
    public function ObtenerMarcasUrl() {
        try {
            $marcasUrl = $this->client->ObtenerMarcasUrl();
            return $marcasUrl;
        } catch (SoapFault $e) {
            echo($client->__getLastResponse());
            echo PHP_EOL;
            echo($client->__getLastRequest());
            return array();
        }
    }
    public function ObtenerModelos($marca) {
        try {
            $modelos = $this->client->ObtenerModelos($marca);
            return $modelos;
        } catch (SoapFault $e) {
            echo($client->__getLastResponse());
            echo PHP_EOL;
            echo($client->__getLastRequest());
            return array();
        }
    }
}
