<!DOCTYPE HTML>
<html>
	<head>
		<title>Diagnosticos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../assets/css/estilo-datos.css" />
        <link rel="shortcut icon" href="../../assets/images/logo-favicon.ico">
				<!-- Scripts -->
			<script src="../../assets/js/jquery.min.js"></script>
			<script src="../../assets/js/jquery.scrolly.min.js"></script>
			<script src="../../assets/js/jquery.scrollzer.min.js"></script>
			<script src="../../assets/js/skel.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<script src="../../assets/js/main.js"></script>
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
                                <li><a href="../inicio.php" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Inicio</span></a></li>
                                <li><a href="../Reporte/tabla-reportes.php" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-file">Reportes</span></a></li>
                                <li><a href="tabla-diagnostico.php" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-stethoscope">Diagnósticos</span></a></li>
                                <li><a href="../Drone/tabla-reporte-drones.php" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-crosshairs">Drones</span></a></li>
                                <li><a href="../usuario/configuracion-admin.php" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-wrench">Configuración</span></a></li>
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
                  $link=mysqli_connect("localhost","root","admin","projecte");

                  $result = $link->query('SELECT imagen FROM `usuarios` WHERE id_user='.$idUser.';');
                  while ($row = $result->fetch_assoc()) {
                    if ($row['imagen']==null) {
                      echo "<img src='../usuario/foto-perfil/foto-default.png' width='3%'/>";
                    }else{
                      echo "<img src='../usuario/".$row['imagen']."' width='3%'/>";
                    }
                  }
                  echo " <a href='../usuario/configuracion-admin.php'><label>".$_SESSION['nombre']." ".$_SESSION['apellido']."</label></a>
                      <label> | </label>
                      <a href='../usuario/cerrarSesion.php'><label class='ancla-salir'id='cerrarSesion'>Salir</label></a>";
              }else{
                  header("Location: ../index.php");
              }   
          ?>
        </div>
        
        
        <!-- Main -->
        <div id="main">
            <!-- Datos de diagnostico -->
            <section id="contact" class="two">
                <div class="container">
                    <header>
                        <h4>NUEVO DIAGNÓSTICO DRONE</h4>
                    </header>
                    <form method="POST" action="">
                        <div class="row">
                            <div class="1u 12u$(mobile)"><label>Drone</label></div>
                            <div class="4u 12u$(mobile)">
                                <select name="usar-drone">
                                    <option>Seleccione</option>
                                </select>
                            </div>
                             <div class="2u 12u$(mobile)"></div>
                            <div class="1u 12u$(mobile)"><label>Fecha</label></div>
                            <div class="4u$ 12u$(mobile)"><input type="date" name="fecha"/></div>
                            <div class="12u$ 12u$(mobile)"><video width="600" height="400" controls> </video></div>
                        </div>
                    </form> 
                </div>
            </section>
            
            <section id="contact" class="three">
                <div class="container">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="3u 12u$(mobile)"> <label>Nombre de la víctima</label></div>
                            <div class="9u$ 12u$(mobile)"><input type="text" name="nombre"/></div>
                            <div class="3u 12u$(mobile)"> <label>Apellido paterno</label></div>
                            <div class="9u$ 12u$(mobile)"><input type="text" name="apaterno"/></div>
                            <div class="3u 12u$(mobile)"> <label>Apellido materno</label></div>
                            <div class="9u$ 12u$(mobile)"><input type="text" name="amaterno"/></div>
                        </div>
                    </form>   
                </div>
            </section>
            
            <section id="contact" class="two">
                <div class="container">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="3u 12u$(mobile)"><label>Tipo de accidente</label></div>
                            <div class="9u$ 12u$(mobile)">
                                <select name="tipo-accidente">
                                    <option>Seleccione</option>
                                </select>
                            </div>
                            <div class="3u 12u$(mobile)"><label>Síntomas</label></div>
                            <div class="9u$ 12u$(mobile)"><input type="text" name="sintomas"/></div>
                            <div class="3u 12u$(mobile)"><label>Pulsaciones</label></div>
                            <div class="9u$ 12u$(mobile)"><label></label></div>
                            <div class="3u 12u$(mobile)"><label>Respiración</label></div>
                            <div class="9u$ 12u$(mobile)"><label></label></div>
                            <div class="3u 12u$(mobile)"><label>Oxígeno en la sangre</label></div>
                            <div class="9u$ 12u$(mobile)"><label></label></div>
                            <div class="3u 12u$(mobile)"><label>Estado de la víctima</label></div>
                            <div class="9u$ 12u$(mobile)"> 
                                <select name="estado-victima">
                                    <option>Seleccione</option>
                                    <option>Vivo</option>
                                    <option>Muerto</option>
                                </select>
                            </div>
                            <div class="3u 12u$(mobile)"><label>Observaciones</label></div>
                            <div class="9u$ 12u$(mobile)"><textarea rows="4" cols="4" name="observaciones" id="estilo-area"></textarea></div>
                             <div class="12u$"><input type="submit" value="Guardar"/><a href="http://www.github.com" class="icon fa-download estilo-pdf" target="_blank"> PDF</a></div>
                        </div>
                    </form>   
                </div>
            </section>
        </div>
    
		<!-- Footer -->
			<div id="footer">
				<!-- Copyright -->
					<ul class="copyright">
						<li>Todos los derechos reservados. Project Eagle.</li>
					</ul>
			</div>
    </body>
</html>