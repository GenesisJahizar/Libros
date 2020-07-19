<?php require_once('../../Views/modulos/heads.php'); 

try{
	
	$base=new PDO("mysql:host=localhost; dbname=examenlibros" , "root", "12345678");
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//establece los atributos de la conexion de turno

	$base->exec("SET CHARACTER SET UTF8");

}catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
}

$registro=$base->query("SELECT * FROM libro")->fetchAll(PDO::FETCH_OBJ);


?>

<div id="" class="">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="">Guardar libro</h4>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Título</label>
							<input value=<?php echo $registro['titulo']?> name="titulo-up" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Autor</label>
							<input name="autor-up" type="text" class="form-control">
						</div>			
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" value="Enviar">
					</div>
				</form>
			</div>
		</div>
	</div>