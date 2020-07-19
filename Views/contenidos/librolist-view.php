<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2><b>Libros</b></h2>
						</div>
						<div class="col-xs-6">
													
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>id</th>
							<th>Título</th>
							<th>Autor</th>
							<th>Acción</th>
						</tr>
					</thead>
					     
               <?php
                require_once "./Controllers/libroController.php";
                $ins= new libroController(); 

                 echo $ins->obtener_libros_controller();//la pgina la ponemos con indice 1
	            ?>
			
					</tbody>
				</table>
			</div>
		</div>        
    </div>
	