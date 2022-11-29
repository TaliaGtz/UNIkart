<?php
include("../PhpDocs/Conexion.php");

include("../PhpDocs/PhpInclude.php");
include "../Chat/config.php";




	$name=$_SESSION['user'];
    $msg=$_POST['msg'];

	$consulta =   "SELECT ID_Registro 
	FROM registro
	WHERE Username='$name'";
$consulta = mysqli_query($conexion, $consulta);
$consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
$ID_User    = $consulta['ID_Registro'];

    
	$sql = "INSERT INTO chat
	VALUES(
		'',
		'$ID_User',
		'$msg',
		''
	)";
	//$sql="INSERT INTO `chat`(``) VALUES ('".$msg."')";

	$sql = mysqli_query($conexion,$sql);
	if($sql)
	{
		header('Location: ../Chat/chatpage.php');
	}
	else
	{
		echo "Algo salió mal";
	}
	
	
?>