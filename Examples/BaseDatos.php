<?php

    class BaseDatos{

        public function insertarPersona($INPUNAMES,$INPULNAMES,$INPUCI, $INPUEMAIL, $INPUPASS, $INPUSTATE, $INPUASSOCIATION, $INPTUID,  $INPAID){
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();

            $sql = "INSERT INTO inpusers (inptuid, inpunames, inpulnames, inpuci, inpuemail, inpuass, inpuassociation, inpustate, inpaid) 
            values ( :INPTUID, :INPUNAMES, :INPULNAMES, :INPUCI, :INPUEMAIL , :INPUPASS , :INPUASSOCIATION, :INPUSTATE , :INPAID)";
            $statement = $conexion->prepare($sql);

            $statement->bindParam(':INPUNAMES', $INPUNAMES);
            $statement->bindParam(':INPULNAMES', $INPULNAMES);
            $statement->bindParam(':INPUCI', $INPUCI);
            $statement->bindParam(':INPUEMAIL', $INPUEMAIL);
            $statement->bindParam(':INPUPASS', $INPUPASS);
            $statement->bindParam(':INPUSTATE', $INPUSTATE);
            $statement->bindParam(':INPUASSOCIATION', $INPUASSOCIATION);
            $statement->bindParam(':INPTUID', $INPTUID);
            $statement->bindParam(':INPAID', $INPAID);

            if(!$statement){
                return "Error no se puede realizar la carga";
            }else{
                $statement->execute();
                    return "La inserción se realizó con éxito";
                }
        }

        public function consultarPersona(){
            $array = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql = "select * from INPTUSER";
            $statement=$conexion->prepare($sql);
            $statement->execute();
            while($resultado = $statement->fetch()){
                $array[] =$resultado;
            }
            return $array;

        }

        public function eliminarPersona($id){
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql = "delete from INPUSERS where id = :id";
            $statement = $conexion->prepare($sql);
            $statement->bindParam(':id',$id);
            if(!$statement){
                return "No se puede borrar";
            }else{
                $statement->execute();
                return "El registro fue eliminado exitosamente";
            }
    
        }
      
    }
?>