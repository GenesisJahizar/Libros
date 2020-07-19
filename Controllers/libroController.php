<?php 

require_once "./Models/libroModel.php";

class libroController  extends libroModel{
 
    public function guardar_libro_controller(){//funcion guardar libro
       $nombre=$_FILES['archivo']['name'];
       $guardado=$_FILES['archivo']['tmp_name'];

       if(!file_exists('archivos')){
          mkdir('archivos',0777,true);
	    
        }else{
	        if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
		      //echo "Archivo guardado con exito";
	        }else{
		        //echo "Archivo no se pudo guardar";
	        }
       }
      
        $titulo=$_POST['titulo'];
        $autor=$_POST['autor'];
        ;
        $data=[
            "titulo"=>$titulo,
            "autor"=>$autor,
            "archivo"=>$nombre                          
          ]; 
          $guardar= self::insertar_datos($data);

          if ($guardar->rowCount()>=1) {?>
            <div class="alert alert-success" role="alert">
               Libro registrado con exito
            </div>
          <?php
          }
    }//fin funcion guardar libro

    public function obtener_libros_controller(){//funcion obtner lista de libros
        $tabla="";//variable tabla

        $obtener= self::obtener_datos_model();
        
        foreach ($obtener as $rows) {
          $tabla.='
                  <tbody>
                   <tr>
                     <td>'.$rows['id'].'</td>
                     <td>'.$rows['titulo'].'</td>
                     <td>'.$rows['autor'].'</td>

                     <td>
                     <button class="btn btn-outline-danger btn-sm"><a  href="'.SERVERURL.'Views/contenidos/datoseditar-view.php/'.$rows['id'].'/ class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                     </td>

                     <td>
                     <form action="'.SERVERURL.'" method="POST" entype="multipart/form-data">
                     <input type="hidden" name="id-eliminar" value="'.$rows['id'].'">
                     <button onclick="return confirm()" class="btn btn-outline-danger btn-sm"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                     </form>
                   </td>
                 </tr>           
        ';
        }//fin foreach
        return $tabla; 
    }//fin funcion obtener lista de libros

    public function eliminar_libro_Controller(){
      $id = $_POST['id-eliminar'];
      $DelLibro=libroModel::eliminar_libro_model($id);
    }//fin funcion eliminar

   public function datos_actualizar(){
      $obtener= self::obtener_datos_model();
      }//fin datos actualizar
   
   public function actualizar_libro_controller(){
      $titulo=$_POST['titulo-up'];
      $autor= $_POST['autor-up'];

      $data=[
      "cedula"=>$titulo,
      "autor"=>$autor
      ];

    $actualizar = libroModel::actualizar_libro_model($data);
   }//fin actualizar

}//fin clase