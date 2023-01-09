<?php

header('Access-Control-Allow-Origin: *');
$no_cuenta = $_GET['no_cuenta'];
$cantidad = $_GET['cantidad'];
//$cantidad = 100;


$curl = curl_init(); //inicia la sesión cURL
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://192.168.116.51:8080/ServidorRESTBanco/webresources/Aplicacion/retirarSaldo?numCuenta=$no_cuenta&saldo=$cantidad", //url a la que se conecta

    //CURLOPT_URL => "http://192.168.34.51:8080/ServidorRESTBanco/webresources/Aplicacion/retirarSaldo?numCuenta=$no_cuenta&saldo=$cantidad", //url a la que se conecta
    CURLOPT_RETURNTRANSFER => true, //devuelve el resultado como una cadena del tipo curl_exec
    CURLOPT_FOLLOWLOCATION => true, //sigue el encabezado que le envíe el servidor
    CURLOPT_ENCODING => "", // permite decodificar la respuesta y puede ser"identity", "deflate", y "gzip", si está vacío recibe todos los disponibles.
    CURLOPT_MAXREDIRS => 10, // Si usamos CURLOPT_FOLLOWLOCATION le dice el máximo de encabezados a seguir
    CURLOPT_TIMEOUT => 30, // Tiempo máximo para ejecutar
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // usa la versión declarada
    CURLOPT_CUSTOMREQUEST => "GET", // el tipo de petición, puede ser PUT, POST, GET o Delete dependiendo del servicio
)); //curl_setopt_array configura las opciones para una transferencia cURL

$response = curl_exec($curl); // respuesta generada
$err = curl_error($curl); // muestra errores en caso de existir

curl_close($curl);


if ($err) {
    echo "<script type='text/javascript'>
    alert('No se pudo realizar la accion!');
    window.location.href='retirar.php';
    </script>";
} else {

    $curl = curl_init(); //inicia la sesión cURL
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://192.168.1.73:8080/ServidorRESTBanco/webresources/Aplicacion/consultarSaldo?numCuenta=$no_cuenta ", //url a la que se conecta
        //CURLOPT_URL => "http://192.168.34.51:8080/ServidorRESTBanco/webresources/Aplicacion/consultarSaldo?numCuenta=$numero_cuenta", //url a la que se conecta
        CURLOPT_RETURNTRANSFER => true, //devuelve el resultado como una cadena del tipo curl_exec
        CURLOPT_FOLLOWLOCATION => true, //sigue el encabezado que le envíe el servidor
        CURLOPT_ENCODING => "", // permite decodificar la respuesta y puede ser"identity", "deflate", y "gzip", si está vacío recibe todos los disponibles.
        CURLOPT_MAXREDIRS => 10, // Si usamos CURLOPT_FOLLOWLOCATION le dice el máximo de encabezados a seguir
        CURLOPT_TIMEOUT => 30, // Tiempo máximo para ejecutar
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // usa la versión declarada
        CURLOPT_CUSTOMREQUEST => "GET", // el tipo de petición, puede ser PUT, POST, GET o Delete dependiendo del servicio
    )); //curl_setopt_array configura las opciones para una transferencia cURL

    $response = curl_exec($curl); // respuesta generada
    $err = curl_error($curl); // muestra errores en caso de existir

    curl_close($curl);


    if ($err) {
        echo "<script type='text/javascript'>
        alert('No se pudo realizar la accion!');
        window.location.href='retirar.php';
        </script>";
    } else {
        $saldo = $response;
        echo "<script type='text/javascript'>
        alert('Retiro realizado con exito!');
        window.location.href='generarPDF.php?cuenta=$no_cuenta&cantidad=$cantidad&saldo=$saldo';
        </script>";
    }
}
