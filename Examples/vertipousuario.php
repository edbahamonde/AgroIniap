<?php
    function cargar(){
        $consulta = new BaseDatos();
        $filas = $consulta->consultarPersona();
        echo "<table border = 1  bordercolor=blue >
                <th>inptuid</th>
                <th>NOMBRE</th>";
        foreach($filas as $fila){
                echo"<tr>";
                echo"<td>".$fila['inptuid']."</td>";
                echo"<td>".$fila['inptuname']."</td>";
                 echo"</tr>";

        }

        echo "</table>";


 

}
?>















