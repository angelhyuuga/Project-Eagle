
$(function(){
	$("body").on('click','#no, #CerrarElim, #eliminar', function() {
		$('#msgElim').fadeOut();
	})

	$("body").on('click','#cerrarE', function() {
		$('#EditLlenar').fadeOut();
	})


});


function llenarDrones(){
	$.ajax({			
		url: 'llenar-drones.php',
		type: 'GET',
		beforeSend: function(){
			$("#miTabla").html("");
			$("#miTabla").removeClass("linea");
		},
		success: function(data){
           $("#miTabla").html(data);
           $("#miTabla").hide();
           $("#miTabla").fadeToggle(1000,'swing');
           $("#miTabla").addClass("linea");

            
           $('body').on('click', '.dato_drone', function() {
           	// document.location.href = "tabla-drones.php#contenedor";
           	var id = $(this).attr('data-listadook');
				$.ajax({
					type: 'POST',
					url: 'editar-datos-drone.php', 
					data: {ide:id},//parametros

					success: function(data){
						// document.location.href = "tabla-drones.php#contenedor";
						$("#contenedor").empty();
			           $("#contenedor").html(data);
			           console.log(data); 
					}
				});
			});
            

            
            $('body').on('click', '.dato_elim', function() {
           	var id = $(this).attr('data-listadoE');
				$.ajax({
					type: 'POST',
					url: 'mensajeEliminar.php', 
					data: {idEliminar:id},//parametros

					success: function(data){
						window.location.href="tabla-drones.php"
			           $("#contenedorE").html(data);
			           console.log(data); 
					}
				});
			});

            $('body').on('click', '.ver_drone', function() {
           	var id = $(this).attr('data-listadoVer');
				$.ajax({
					type: 'POST',
					url: 'ver-drone.php', 
					data: {idVer:id},//parametros

					success: function(data){
						$("#contenedor").empty();
			           $("#contenedor").html(data);
			           console.log(data); 
					}
				});
			});
        }
	});
}

function buscarDrones(busqueda){
	// alert(busqueda);
	var letra = busqueda;
	// if (letra=="") {
	// 	// alert();
	// 	// llenarDrones();
	// };
	$.ajax({
		type: 'POST',
		url: 'busqueda-drone.php', 
		data: {busqueda:letra},//parametros
		success: function(data){
			$("#miTabla").html(data);
           $("#miTabla").hide();
           $("#miTabla").fadeToggle(1000,'swing');
           $("#miTabla").addClass("linea");
		}
	});
}

function llenarReportesDrones(){
	$.ajax({			
		url: 'llenar-reporte-d.php',
		type: 'GET',
		beforeSend: function(){
			$("#miTabla").html("");
			$("#miTabla").removeClass("linea");
		},
		success: function(data){
           $("#miTabla").html(data);
           $("#miTabla").hide();
           $("#miTabla").fadeToggle(1000,'swing');
           $("#miTabla").addClass("linea");

            
           $('body').on('click', '.dato_reported', function() {
           	var id = $(this).attr('data-listadook');
				$.ajax({
					type: 'POST',
					url: 'editar-reporte-drone.php', 
					data: {ide:id},//parametros

					success: function(data){
						// document.location.href = "tabla-drones.php#contenedor";
						$("#contenedor").empty();
			           $("#contenedor").html(data);
			           console.log(data); 
					}
				});
			});
            

            
            $('body').on('click', '.rep_elim', function() {
           	var id = $(this).attr('data-listadoE');
           	// alert(id);
				$.ajax({
					type: 'POST',
					url: 'mensajeEliminarR.php', 
					data: {idEliminar:id},//parametros

					success: function(data){
						window.location.href="tabla-reporte-drones.php"
			           $("#contenedor").html(data);
			           console.log(data); 
					}
				});
			});

            $('body').on('click', '.ver_reported', function() {
           	var id = $(this).attr('data-listadoVer');
				$.ajax({
					type: 'POST',
					url: 'ver-reported.php', 
					data: {idVer:id},//parametros

					success: function(data){
						$("#contenedor").empty();
			           $("#contenedor").html(data);
			           console.log(data); 
					}
				});
			});
        }
	});
}

function llenarCuadrantes(){
	$.ajax({
		type: 'GET',
		url: 'llenar-cuadrantes.php', 
		success: function(data){
			$("#cuadrante_editar").html(data);
		}
	});
}

function llenarCuadrantesReg(){
	$.ajax({
		type: 'GET',
		url: 'llenar-cuadrantes.php', 
		success: function(data){
			$("#cuadrante").html(data);
		}
	});
}

function buscarReportesD(busqueda){
	var letra = busqueda;
	$.ajax({
		type: 'POST',
		url: 'busqueda-reported.php', 
		data: {busqueda:letra},//parametros
		success: function(data){
			$("#miTabla").html(data);
           $("#miTabla").hide();
           $("#miTabla").fadeToggle(1000,'swing');
           $("#miTabla").addClass("linea");
		}
	});
}