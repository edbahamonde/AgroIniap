<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1>REGISTRAR PERSONA</h1>
        <form method="POST" action="insertar.php"  >
            <table>
                <tr>
                    <td>TIPO DE USUARIO</td>
                    <select name="INPTUID" >
                        <?php
                        include_once 'conexion.php';
                        include_once 'BaseDatos.php';
                        $consulta = new BaseDatos();
                        $filas = $consulta->consultarPersona();
                        foreach($filas as $fila){
                            echo" <option value=".$fila['inptuid'].">".$fila['inptuname']."</option>";
                        
                        }
                        ?>
                    </select>
                </tr>
                <tr>
                    <td>Nombres</td>
                    <td><input type="texto" name="INPUNAMES"></td>
                </tr>
                <tr>
                    <td>APELLIDOS</td>
					<td><input type="texto" name="INPULNAMES"></td>
                </tr>
                <tr>
                    <td>CI</td>
                    <td><input type="texto"   maxlength="10" name="INPUCI"> </td>

                </tr>

                <tr>
                    <td>CORREO</td>
                    <td><input type="email" name="INPUEMAIL"></td>
                </tr>
                <tr>
                    <td>CONTRASEÑA</td>
					<td><input type="password"  name="INPUPASS"></td>
                </tr>

                <tr>
                    <td>ASOCIACION</td>
                    <td><input type="texto" name="INPUASSOCIATION"></td>
                </tr>
                <tr>
                    <td>ESTADO</td>
                    <td><input type="texto" name="INPUSTATE"></td>
                </tr>

                <tr>
                    <td>DIRECCION</td>
                    <td><input type="number" name="INPAID"></td>
                </tr>
                
                <tr>
                    <td><input type="submit" value="Guardar"  ></td>
                </tr>
                
            </table>
        </form>
       
		

    </body>
<html>