<?php 

	$usuario = $_POST['usuario'];
	$nombres = $_POST['nombres'];
	$apellidop = $_POST['apellidop'];
	$apellidom = $_POST['apellidom'];
	$contrasena = $_POST['contrasena'];
	$fecha_creacion = date('Y-m-d H:i:s');


	require_once '../conexion.php'; 

	mysqli_query($link,"INSERT INTO usuarios(`nombre_user`, `nombre`, `ap_paterno`, `ap_materno`, `password_encriptado`,`fecha_creacion`,`id_tipo_user`,`alta`,`estado`) 
						VALUES ('$usuario','$nombres','$apellidop','$apellidom',sha1('$contrasena'),'$fecha_creacion',3,0,1)");


 ?>
  <script languaje="javascript">
  alert("Registro correcto, ahora puede iniciar sesión");
    </script>
  

  <?php   
	header("Location: ../index.php");
?>

