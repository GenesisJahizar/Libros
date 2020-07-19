<?php 
require "./Core/Conexion.php";

class libroModel extends Conexion{

   protected function insertar_datos($datos){//funcion insertar libro
     $sql=self::Conectar()->prepare("INSERT INTO libro (titulo, autor, archivo) VALUES(:titulo, :autor, :archivo)");
     $sql->bindParam(":titulo", $datos['titulo']);
     $sql->bindParam(":autor", $datos['autor']);
     $sql->bindParam(":archivo", $datos['archivo']);
     $sql->execute();
     return $sql;
   }//fin funcion insertar libro
   protected function obtener_datos_model(){
     $sql=("SELECT * FROM libro");
     $conexion= self::Conectar();
     $datos= $conexion->query($sql);
     $resultado= $datos->fetchAll();
     return $resultado;
   }//fun funcion obtener libros
   protected function eliminar_libro_model($id){//funcion eliminar libro
    $query=self::Conectar()->prepare("DELETE FROM libro WHERE id=:id");
    $query->bindParam(":id",$id);
    $query->execute();
    return $query;
   }//fin funcion eliminar libro
   protected function actualizar_libro_model($datos){
    $query=self::Conectar()->prepare("UPDATE libro SET titulo=:titulo, autor=:autor WHERE id=:id");
    $query->bindParam(":titulo", $datos['titulo']);
		$query->bindParam(":autor", $datos['autor']);
		$query->execute();
    return $query;
   }//fin actualizar libro
}//fin clase