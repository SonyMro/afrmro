$(document).ready(
);

function getFila(obj) {
	var id= $(obj).attr('id');
	var vId=$('#'+id).parents('tr').find('td')[0].innerHTML;
	$('#txtIdG').val(vId);
	var vNombre = $('#' + id).parents('tr').find('td')[1].innerHTML;
	$('#txtNombreM').val(vNombre);
	var vDescrip = $('#' + id).parents('tr').find('td')[2].innerHTML;
	$('#txtDesM').val(vDescrip);
	console.log(obj);

}
function alerta() {
	swal("¡Bien!", "Actualizacion completada :)", "success");
}



