<?php

$strCedula = validarCI($_POST['cedula']);

function validarCI($strCedula){

if(is_null($strCedula) || empty($strCedula)){//compruebo si que el numero enviado es vacio o null
  echo '<div class="alert alert-danger" role="alert">
  <strong>Error!</strong> Profavor ingrese un numero  de cédula!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}else{//caso contrario sigo el proceso
if(is_numeric($strCedula)){
$total_caracteres=strlen($strCedula);// se suma el total de caracteres
if($total_caracteres==10){//compruebo que tenga 10 digitos la cedula
$nro_region=substr($strCedula, 0,2);//extraigo los dos primeros caracteres de izq a der
if($nro_region>=1 && $nro_region<=24){// compruebo a que region pertenece esta cedula//
$ult_digito=substr($strCedula, -1,1);//extraigo el ultimo digito de la cedula
//extraigo los valores pares//
$valor2=substr($strCedula, 1, 1);
$valor4=substr($strCedula, 3, 1);
$valor6=substr($strCedula, 5, 1);
$valor8=substr($strCedula, 7, 1);
$suma_pares=($valor2 + $valor4 + $valor6 + $valor8);
//extraigo los valores impares//
$valor1=substr($strCedula, 0, 1);
$valor1=($valor1 * 2);
if($valor1>9){ $valor1=($valor1 - 9); }else{ }
$valor3=substr($strCedula, 2, 1);
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

  include_once '../Conexion/conexion2.php';

  $conexion=conexion();

  $sql="SELECT CI from Agr_Usuario where CI='$strCedula' ";
  $result=pg_query($conexion,$sql);

  if(pg_num_rows($result) > 0){
    
    echo '<div class="alert alert-danger" role="alert">
    <strong>Usted ya esta registrado! </strong> por favor inicie session.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }else{
    
    echo '<div class="alert alert-success" role="alert">
    <strong>Cédula Correcta!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
}else{
  echo '<div class="alert alert-danger" role="alert">
  <strong>Cédula Incorrecta!</strong> revise e ingrese una cédula correcta por favor
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
}else{
  echo '<div class="alert alert-danger" role="alert">
<strong>Cédula Incorrecta!</strong>
Este Nro de Cedula no corresponde a ninguna provincia del Ecuador
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}


}else{
  echo '<div class="alert alert-danger" role="alert">
  <strong>Error!</strong> Una cédula de identidad no pude tener <strong>'.$total_caracteres.'</strong> digitos 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
}
}else{
  echo '<div class="alert alert-danger" role="alert">
  <strong>Cédula Correcta!</strong>
  Esta Cedula no corresponde a un Nro de Cedula de Ecuador
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
}
}


?>

</body>
</html>