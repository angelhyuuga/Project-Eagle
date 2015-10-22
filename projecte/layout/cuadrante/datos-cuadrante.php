<!DOCTYPE HTML>
<html>
	<head>
		<title>NUEVO CUADRANTE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../assets/css/estilo-datos.css" />
				<!-- Scripts -->
			<script src="../../assets/js/jquery.min.js"></script>
			<script src="../../assets/js/jquery.scrolly.min.js"></script>
			<script src="../../assets/js/jquery.scrollzer.min.js"></script>
			<script src="../../assets/js/skel.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<script src="../../assets/js/main.js"></script>
            <script src="../../assets/js/js-drones.js"></script>
	</head>
    
	<body>
		<!-- Header -->
			<div id="header">
				<div class="top">
					<!-- Logo -->
						<div id="logo">
							<span class="image logo-pe"><img src="../../assets/images/logo_efectos.png" alt="" /></span>
						</div>

                    
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../inicio.html" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Inicio</span></a></li>
								<li><a href="../Reporte/tabla-reportes.php" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-file">Reportes</span></a></li>
								<li><a href="../Diagnostico/diagnosticos.php" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-stethoscope">Diagnósticos</span></a></li>
								<li><a href="../Drone/tabla-drones.php" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-crosshairs">Drones</span></a></li>
                                <li><a href="#" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-wrench">Configuración</span></a></li>
							</ul>
						</nav>
				</div>
			</div>
        
        
         <!-- Header2 de login-->
        <div id="usuario">
        <?php 
            session_start();
             if (! empty($_SESSION["nombre"])){
                $idUser=$_SESSION['idUsuario'];
                $link=mysqli_connect("localhost","root","","projecte");

                $result = $link->query('SELECT imagen FROM `usuarios` WHERE id_user='.$idUser.';');
                while ($row = $result->fetch_assoc()) { 
                    echo "<img src='../usuario/".$row['imagen']."' width='5%' height='8%' />";
                }
                echo " <label>".$_SESSION['nombre']." ".$_SESSION['apellido']."</label>
                    <label> | </label>
                    <a href='../usuario/cerrarSesion.php'><label id='cerrarSesion'>Salir</label></a>";
            }else{
                header("Location: index.html");
            }   
        ?>
        </div>
        
        
        <!-- Main -->
        <div id="main">
            <!-- Tabla de drones -->
            <section id="contact" class="two">
                <div class="container">
                    <header>
                        <h4>NUEVO CUADRANTE</h4>
                    </header>
                    <form method="POST" action="registrar-cuadrante.php">
                        <div class="row">
                        <div class="4u 12u$(mobile)"> <label>Latitud</label></div>
                        <div class="8u$ 12u$(mobile)"><input type="text" name="latitudc"/></div>
                        <div class="4u 12u$(mobile)"> <label>Longitud</label></div>
                        <div class="8u$ 12u$(mobile)"><input type="text" name="longitudc"/></div>
                        
                        <div class="4u 12u$(mobile)"> <label>Número de trabajadores</label></div>
                        <div class="8u$ 12u$(mobile)"><input type="number" name="ntrabajadoresc"/></div>
                            <div class="4u 12u$(mobile)"> <label>Descripción</label></div>
                            <div class="8u$ 12u$(mobile)"><textarea rows="4" cols="4" name="descripcionc"></textarea></div>
                        
                        <div class="12u$"><input type="submit" value="Guardar" /></div>
                    </div>
                    </form>   
                </div>
            </section>
        </div>
        
        <div id="contenedor">

        </div>

        <div id="contenedorE"></div>

        
		<!-- Footer -->
			<div id="footer">
				<!-- Copyright -->
					<ul class="copyright">
						<li>Todos los derechos reservados. Project Eagle.</li>
					</ul>
			</div>

        

	</body>
</html>