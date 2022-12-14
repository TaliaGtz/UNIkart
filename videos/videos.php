<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	
	<div class="col-md-6 well">
		<?php
			include("../PhpDocs/Conexion.php");
			
			$query  = mysqli_query($conexion,'CALL sp_5Var(7, "");');
			while(mysqli_next_result($conexion)){;}

			while($fetch = mysqli_fetch_array($query)){
		?>
		<div class="col-md-12">
			<?php echo $fetch['video_name']?>
			<div class="col-md-8">
				<video controls>
					<source src="<?php echo $fetch['location']?>">
				</video>
			</div>
		</div>
		<?php
			}
		?>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<form action="save_video.php" method="POST" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Subir Video</label>
								<input type="file" name="video" class="form-control-file"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>