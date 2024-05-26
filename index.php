<?php

#Inicializar una nueva sesión de cURL; ch = cURL handle 
const API_URL = "http://whenisthenextmcufilm.com/api";
// $ch = curl_init(API_URL);
// //Indicar que queremos recibir la peticion y no mostrarla en pantalla

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Para recibir el resultado de la api y no mostrarlo en pantalla
// /* Ejecutamos la peticion 
//    Y guardamos el resiltado 
// */

// $result = curl_exec($ch); // Guardamos el resultado
// $data = json_decode($result, true); // Transformamo el json 

// if ($result === FALSE) {
//   die("Curl fallo con un error: " . curl_error($ch));
// };

// curl_close($ch); // Se cierra la coneccion de cURL 

$result = file_get_contents(API_URL); // Solo para hacer el GET DE UNA API 
$data = json_decode($result);

var_dump($data);

// phpinfo();

?>


<main>
  <h2>
    La proxima pelicula de Marvel
  </h2>
</main>

<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }
</style>