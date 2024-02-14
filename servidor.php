<?php
    // Recibir los datos JSON desde la solicitud POST
    $jsonData = file_get_contents('php://input');

    /*
    // Opción A: Decodificar los datos JSON a un objeto: json_decode($json)
    $data = json_decode($jsonData);

    // Extracción en variable de los datos del objeto
    $nom = $data->nombre;
    $loc = $data->localidad;

    $nom = 'Diego Rodriguez de Silva y ' . $nom;
    $loc = $loc . ' (Capital)';
    */
    

    // Opción B: Decodificar los datos JSON a una Array Asociativa: json_decode($json, true)
    $data = json_decode($jsonData, true);

    // Extracción en variable de los datos de la Array Asociativa
    $nom = $data['nombre'];
    $loc = $data['localidad'];

    $nom = 'Diego Rodriguez de Silva y ' . $nom;
    $loc = $loc . ' (Capital)';

    /*
    // Opción 1: Montar los datos de la devolución al cliente en una Array Indexada
    $responseData = array
    (
        $nom,
        $loc
    );
    */

    // Opción 2: Montar los datos de la devolución al cliente en una Array Asociativa
    $responseData = array
    (
        "nom01"=>$nom,
        "loc01"=>$loc
    );

    // Codificar los datos de respuesta a JSON: json_encode($json)
    $responseJSON = json_encode($responseData);

    // Establecer las cabeceras para indicar que la respuesta es JSON
    header('Content-Type: application/json');

    echo $responseJSON;

?>