<?php
	date_default_timezone_set('America/Mexico_City');
	include("../PhpDocs/PhpInclude.php");
	
    $IDBtn = $_SESSION['ID_Producto'];
	if(ISSET($_POST['save'])){

		$consultaId  = mysqli_query($conexion,'CALL sp_5Var(6, "'.$IDBtn.'");');
		$consultaId = mysqli_fetch_array($consultaId);  //Devuelve un array o NULL
		while(mysqli_next_result($conexion)){;}
		$ID_VID = $consultaId['video_id'];
		$Ruta = $consultaId['location'];

		$file_name = $_FILES['video']['name'];
		$file_temp = $_FILES['video']['tmp_name'];
		$file_size = $_FILES['video']['size'];
		
		if($file_size < 50000000){
			$file = explode('.', $file_name);
			$end = end($file);
			$allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
			if(in_array($end, $allowed_ext)){
				$name = date("Ymd").time();

                $directorio = "../archivos/videos";
                if(!file_exists($directorio)){
                    mkdir($directorio, 0777);
                }
                $dir = opendir($directorio);
				$location = $directorio.'/'.$name.".".$end;
				if(move_uploaded_file($file_temp, $location)){

					if(!$consultaId){   //Si no existe el video
						mysqli_query($conexion, "INSERT INTO `video` 
											VALUES('', '$name', '$location', '$IDBtn')") or die(mysqli_error());
						$url = "Producto/Producto.php?IDBtn=$IDBtn";
            			include("../PhpDocs/header.php");
					}else{
						unlink($Ruta);

						$query = "UPDATE `video` 
								SET video_id = '$ID_VID', video_name = '$name', location = '$location', ID_Producto = '$IDBtn' 
								WHERE ID_Producto='$IDBtn'"; 

						if(mysqli_query($conexion, $query)){  //Ejecutamos el query y verificamos si se guardaron los datos
							$url = "Producto/Producto.php?IDBtn=$IDBtn";
            				include("../PhpDocs/header.php");
						}else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
						}
					}
					
				}
			}else{
				echo "<script>alert('Wrong video format')</script>";
			}
		}else{
			echo "<script>alert('File too large to upload')</script>";
		}
	}
?>