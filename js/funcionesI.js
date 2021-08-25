//CLIENTES

function agregardatosI(ctacte,cuitdni,sitf,nomcliente,ingb,dir,mail,tel,job,desc){


	cadena="ctacte=" + ctacte +
	"&cuitdni=" + cuitdni +
	"&sitf=" + sitf +
	"&nomcliente=" + nomcliente +
	"&ingb=" + ingb +
	"&dir=" + dir +
	"&mail=" + mail +
	"&tel=" + tel +
	"&job=" + job +
	"&desc=" + desc;

	$('#ctacte').val('');
	$('#cuitdni').val('');
	$('#sitf').val('');
	$('#nomcliente').val('');
	$('#ingb').val('');
	$('#dir').val('');
	$('#mail').val('');
	$('#tel').val('');
	$('#job').val('');
	$('#desc').val('');


	$.ajax({
		type:"POST",
		url:"clientes_agr.php",
		data:cadena,
		success:function(r){
			alertify.message(r, 0);

			if(r==1){
				$('#clientes_tabla').load('clientes_tabla.php');
				alertify.success("Agregado con exito");
			}else{
				alertify.message(r, 0);
				alertify.error("Los campos no están completos o el cliente ya existe");
			}
		}
	});

}




function agregaformI(datosI){
	d=datosI.split('||');

	$('#id_cliu').val(d[0]);
	$('#ctacteu').val(d[1]);
	$('#cuitdniu').val(d[2]);
	$('#sitfu').val(d[3]);
	$('#nomclienteu').val(d[4]);
	$('#ingbu').val(d[5]);
	$('#diru').val(d[6]);
	$('#mailu').val(d[7]);
	$('#telu').val(d[8]);
	$('#jobu').val(d[9]);
	$('#descu').val(d[10]);

}

function actualizaDatosI(){


	id_cliu=$('#id_cliu').val();
	ctacteu=$('#ctacteu').val();
	cuitdniu=$('#cuitdniu').val();
	sitfu=$('#sitfu').val();
	nomclienteu=$('#nomclienteu').val();
	ingbu=$('#ingbu').val();
	diru=$('#diru').val();
	mailu=$('#mailu').val();
	telu=$('#telu').val();
	jobu=$('#jobu').val();
	descu=$('#descu').val();


	cadena="id_cliu=" + id_cliu +
	"&ctacteu=" + ctacteu +
	"&cuitdniu=" + cuitdniu +
	"&sitfu=" + sitfu +
	"&nomclienteu=" + nomclienteu +
	"&ingbu=" + ingbu +
	"&diru=" + diru +
	"&mailu=" + mailu +
	"&telu=" + telu +
	"&jobu=" + jobu +
	"&descu=" + descu;

	$.ajax({
		type:"POST",
		url:"clientes_act.php",
		data:cadena,
		success:function(r){
			/*alertify.message(r, 0);
			if(r==1){
				$('#clientes_tabla').load('clientes_tabla.php');
				alertify.success("Actualizado con exito");
			}else{
				alertify.message(r, 0);
				alertify.error("Los campos no están completos o el interno ya existe");
			}*/
			$('#clientes_tabla').load('clientes_tabla.php');
			alertify.success("Actualizado con exito");
		}
	});

}

function preguntarSiNoI(id_I){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
	function(){ eliminarDatosI(id_I) }
	, function(){ alertify.error('Se cancelo')});
}

function eliminarDatosI(id_I){
	cadena="id_I=" + id_I;

	$.ajax({
		type:"POST",
		url:"clientes_elim.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#clientes_tabla').load('clientes_tabla.php');
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});
}
