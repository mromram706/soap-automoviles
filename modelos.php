<?php

require_once "GestionAutomovilesAuth.php";

if (isset($_GET['marca'])) {
    $nombreMarca = $_GET['marca'];

    $client = new GestionAutomovilesAuth('http://dwes.infinityfreeapp.com/soap-automoviles/service-automoviles-auth.php');
    $marcas = $client->ObtenerMarcas();

    $marcaId = array_search($nombreMarca, $marcas);

    if ($marcaId !== false) {
        
        $modelos = $client->ObtenerModelos($marcaId);

        echo '<ul>';
        foreach ($modelos as $modelo) {
            echo '<li>' . htmlspecialchars($modelo) . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'Marca no encontrada.';
    }
} else {
    echo 'No se ha especificado la marca.';
}
?>
