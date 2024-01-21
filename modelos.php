<?php
// Incluir la clase GestionAutomovilesAuth para usarla
require_once "GestionAutomovilesAuth.php";

// Verificar si se ha proporcionado el parámetro 'marca'
if (isset($_GET['marca'])) {
    $nombreMarca = $_GET['marca'];

    // Instanciar la clase y obtener todas las marcas
    $client = new GestionAutomovilesAuth('http://dwes.infinityfreeapp.com/soap-automoviles/service-automoviles-auth.php');
    $marcas = $client->ObtenerMarcas();

    // Buscar el ID que corresponde al nombre de la marca
    $marcaId = array_search($nombreMarca, $marcas);

    if ($marcaId !== false) {
        // Obtener modelos para el ID de la marca encontrada
        $modelos = $client->ObtenerModelos($marcaId);

        // Mostrar los modelos
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
