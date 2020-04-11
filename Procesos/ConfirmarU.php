<?php
include_once '../Conexion/conexion2.php';
$conexion=conexion();

    $sql=" update Agr_usuario set id_estado = (select id_estado from Agr_estado where nombre_corto = 'A')
    where CI = (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)";
    $result=pg_query($conexion,$sql);

    echo 'Gracias Por confirmar tu Registro :3';

?>