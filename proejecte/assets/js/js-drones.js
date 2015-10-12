
$(function(){
	$("body").on('click','#no, #CerrarElim, #eliminar', function() {
		$('#msgElim').fadeOut();
	})

	$("body").on('click','#cerrarE', function() {
		$('#EditLlenar').fadeOut();
	})

	$('#buscador').keyup(function(){
	 	var buscar= this.value;
	    var dataString = 'buscarpalabra='+ buscar;

	    console.log(buscar);

	    if(buscar=='')
	    {
	    	$("#listadoUsers tbody tr").show();
	    }
	    else{

			$("#listadoUsers tbody tr").each(function(){
				var filtro = $(this).find('td').eq(1);
				filtro = filtro.filter(':contains(' + buscar + ')');
				if(filtro.length > 0)
					$(this).show();
				else
					$(this).hide();
				console.log(filtro);
			})
		}   
	});

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
           $("#miTabla").fadeToggle(2000,'swing');
           $("#miTabla").addClass("linea");

            
           $('body').on('click', '.dato_drone', function() {
           	var id = $(this).attr('data-listadook');
				$.ajax({
					type: 'POST',
					url: 'editar-datos-drone.php', 
					data: {ide:id},//parametros

					success: function(data){
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
			           $("#contenedorE").html(data);
			           console.log(data); 
					}
				});
			});
        }
	});
}