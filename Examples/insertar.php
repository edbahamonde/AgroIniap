<?php
include_once('conexion.php');
include_once('BaseDatos.php');


$mensaje = null;




// funcion para validar la cedula de Ecuador//
//Autor: Oliver Veliz
//año:2009$INPUNAMES = $_POST['INPUNAMES'];

function validarCI($strCedula)
{
//aqui explico la logica de la validacion de una cedula de ecuador
//El decimo Digito es un resultante de un calculo
//Se trabaja con los 9 digitos de la cedula
//Cada digito de posicion impar se lo duplica, si este es mayor que 9 se resta 9
//Se suman todos los resultados de posicion impar
//Ahora se suman todos los digitos de posicion par
//se suman los dos resultados
//se resta de la decena inmediata superior
//este es el decimo digito
//si la suma nos resulta 10, el decimo digito es cero

if(is_null($strCedula) || empty($strCedula)){//compruebo si que el numero enviado es vacio o null
echo "Por Favor Ingrese la Cedula";
}else{//caso contrario sigo el proceso
if(is_numeric($strCedula)){
$total_caracteres=strlen($strCedula);// se suma el total de caracteres
if($total_caracteres==10){//compruebo que tenga 10 digitos la cedula
$nro_region=substr($strCedula, 0,2);//extraigo los dos primeros caracteres de izq a der
if($nro_region>=1 && $nro_region<=24){// compruebo a que region pertenece esta cedula//
$ult_digito=substr($strCedula, -1,1);//e$INPUNAMES = $_POST['INPUNAMES']; + $valor8);
//extraigo los valores impares//
$valor1=substr($strCedula, 0, 1);$INPUNAMES = $_POST['INPUNAMES'];
$valor3=($valor3 * 2);
if($valor3>9){ $valor3=($valor3 - 9); }else{ }
$valor5=substr($strCedula, 4, 1);
$valor5=($valor5 * 2);
if($valor5>9){ $valor5=($valor5 - 9); }else{ }
$valor7=substr($strCedula, 6, 1);
$valor7=($valor7 * 2);
if($valor7>9){ $valor7=($valor7 - 9); }else{ }
$valor9=substr($strCedula, 8, 1);
$valor9=($valor9 * 2);
if($valor9>9){ $valor9=($valor9 - 9); }else{ }

$suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
$suma=($suma_pares + $suma_impares);
$dis=substr($suma, 0,1);//extraigo el primer numero de la suma
$dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
$digito=($dis - $suma);
if($digito==10){ $digito='0'; }else{ }//si la suma nos resulta 10, el decimo digito es cero
if ($digito==$ult_digito){//comparo los digitos final y ultimo
echo "Cedula Correcta";
}else{
echo "Cedula Incorrecta";
}
}else{
echo "Este Nro de Cedula no corresponde a ninguna provincia del ecuador";
}


}else{
echo "Es un Numero y tiene solo".$total_caracteres;
}
}else{
echo "Esta Cedula no corresponde a un Nro de Cedula de Ecuador";
}
}
}









$INPUNAMES = $_POST['INPUNAMES'];
$INPULNAMES = $_POST['INPULNAMES'];
$INPUCI = validarCI($_POST['INPUCI']);
$INPUEMAIL = $_POST['INPUEMAIL'];
$INPUPASS = md5($_POST['INPUPASS']);
$INPUSTATE = $_POST['INPUSTATE'];
$INPUASSOCIATION = $_POST['INPUASSOCIATION'];
$INPTUID = $_POST['INPTUID'];
$INPAID = $_POST['INPAID'];







if(strlen($INPUNAMES) > 0 && strlen($INPULNAMES) > 0 && strlen($INPUCI) == strlen('INPUCI') && 
 strlen($INPUEMAIL) > 0 && strlen($INPUPASS) > 0 && strlen($INPUSTATE) > 0 &&  strlen($INPUASSOCIATION) > 0 && strlen($INPTUID) > 0 && strlen($INPAID) > 0){
    $consulta = new BaseDatos();
    $mensaje = $consulta->insertarPersona($INPUNAMES,$INPULNAMES,$INPUCI, $INPUEMAIL,
     $INPUPASS, $INPUSTATE, $INPUASSOCIATION, $INPTUID, $INPAID   );

}else{
    echo "Por favor ingrese la información";
}
echo $mensaje;

?>