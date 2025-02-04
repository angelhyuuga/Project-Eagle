<?php session_start();?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Inicio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../assets/css/estilo-inicio.css">
        <link rel="shortcut icon" href="../assets/images/logo-favicon.ico">
        		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/jquery.scrollzer.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>
			<script src="../assets/js/js.js"></script>
	</head>
	
    <body onload="tipoUsuario(<?php echo $_SESSION["tipo_usuario"];?>)">
        <!-- Header2 de login-->
        <div id="usuario">
            <?php 
            if (! empty($_SESSION["nombre"])){
                $idUser=$_SESSION['idUsuario'];
                require_once 'conexion.php'; 
                
                $result = $link->query('SELECT imagen FROM `usuarios` WHERE id_user='.$idUser.';');
                while ($row = $result->fetch_assoc()) {
                    if ($row['imagen']==null) {
                        echo "<img src='usuario/foto-perfil/foto-default-2.png' width='3%' />";
                    }else{
                        echo "<img src='usuario/".$row['imagen']."' width='3%' />";
                    }
                }
                echo " <label>".$_SESSION['nombre']." ".$_SESSION['apellido']."</label>
                <label> | </label>
                <a href='usuario/cerrarSesion.php'><label class='ancla-salir' id='cerrarSesion'>Salir</label></a>";
            }else{
                header("Location: index.php");
            }   
          ?>
        </div>


				<!-- Iconos -->
					<section id="" class="">
						<div class="container">
                            <img src="../assets/images/logo_minimo.png" alt="Project Eagle" class="estilo-logo"  align="middle">
							<form method="post" action="#">
								<div class="row cont-i">
                                    <div class="2u"></div>
                                    <div class="3u 12u$(mobile)">
                                        <a class="icon fa-file estilo-icono" href="Reporte/tabla-reportes.php"><br>Reportes</a>
									</div>
                                    
                                    <div class="3u 12u$(mobile)">
                                        <a class="icon fa-stethoscope estilo-icono" id="btn-diagnosticos" href="Diagnostico/tabla-diagnostico.php"><br>Diagnosticos</a>
									</div>
                                    
                                    <div class="3u 12u$(mobile)">
                                        <a class="icon fa-crosshairs estilo-icono" id="btn-drones" href="Drone/tabla-reporte-drones.php"><br>Drones</a>
									</div>
								</div>
							</form>
						</div>
					</section>
			
	</body>
</html>