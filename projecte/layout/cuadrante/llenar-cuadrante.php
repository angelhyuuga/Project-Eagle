<?php 
session_start();
sleep(1);
    $link=mysqli_connect("localhost","root","admin","projecte");
    
    $ide="";
    $result = $link->query('SELECT `cuadrante_id`,`latitud`,`longitud`,`descripcion`,`no_trabajadores` FROM `cuadrante` WHERE estado = 1');

    while ($row = $result->fetch_assoc()) {
        if ($_SESSION["tipo_usuario"]==1) {
            echo"<tr>";
            echo"   <td>".$row['cuadrante_id']."</td>"; //id_cuadrante
            echo"   <td>".$row['latitud']."</td>"; //latitud
            echo"   <td>".$row['longitud']."</td>"; //longitud
            echo"   <td>".$row['descripcion']."</td>"; //descripcion
            echo"   <td>".$row['no_trabajadores']."</td>"; //no_trabajadores
            echo"   <td>";
            echo"       <a class='ver_cuadrante icon fa-folder-open' data-listadoVer='".$ide=$row['cuadrante_id']."'  data-toggle='modal' href='tabla-cuadrantes.php#contenedo-modicuadrante' style='cursor:pointer;'> </a>";
            echo"       <a class='dato_cuadrante icon fa-edit' data-listadoOK='".$ide=$row['cuadrante_id']."'  data-toggle='modal' href='tabla-cuadrantes.php#contenedo-modicuadrante' style='cursor:pointer;'></a>";
            echo"       <a class='dato_elimC icon fa-remove' data-listadoE='".$idEliminar=$row['cuadrante_id']."' style='cursor:pointer;'></a>";
            echo"   </td>";
            echo"</tr>";
        }else if ($_SESSION["tipo_usuario"]==2) {
            echo"<tr>";
            echo"   <td>".$row['cuadrante_id']."</td>"; //id_cuadrante
            echo"   <td>".$row['latitud']."</td>"; //latitud
            echo"   <td>".$row['longitud']."</td>"; //longitud
            echo"   <td>".$row['descripcion']."</td>"; //descripcion
            echo"   <td>".$row['no_trabajadores']."</td>"; //no_trabajadores
            echo"   <td>";
            echo"       <a class='ver_cuadrante icon fa-folder-open' data-listadoVer='".$ide=$row['cuadrante_id']."'  data-toggle='modal' href='tabla-cuadrantes.php#contenedo-modicuadrante' style='cursor:pointer;'> </a>";
            echo"   </td>";
            echo"</tr>";

        }else if ($_SESSION["tipo_usuario"]==3) {
            echo"<tr>";
            echo"   <td>".$row['cuadrante_id']."</td>"; //id_cuadrante
            echo"   <td>".$row['latitud']."</td>"; //latitud
            echo"   <td>".$row['longitud']."</td>"; //longitud
            echo"   <td>".$row['descripcion']."</td>"; //descripcion
            echo"   <td>".$row['no_trabajadores']."</td>"; //no_trabajadores
            echo"   <td>";
            echo"       <a class='ver_cuadrante icon fa-folder-open' data-listadoVer='".$ide=$row['cuadrante_id']."'  data-toggle='modal' href='tabla-cuadrantes.php#contenedo-modicuadrante' style='cursor:pointer;'> </a>";
            echo"   </td>";
            echo"</tr>";
        }
    }

?>