<?php

        $Host = "localhost";
        $BaseDatos = "AgroIniap";
        $Usuario = "postgres";
        $Clave = "12345";
        $Puerto = "5432";
        
try {
    $base_de_datos =  new PDO("pgsql:host=$Host;port=$Puerto;dbname=$BaseDatos;", $Usuario, $Clave);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
?>