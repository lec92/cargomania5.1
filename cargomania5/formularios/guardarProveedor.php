<?php 
extract($_POST);//con esta función se extrae todo lo que viene desde el formulario y crea una variable por campo
$objGuardar=new CargoMania;
//Observen que en lugar de poner $_POST["txtCodigo"] solo se pone $txtCodigo, esto lo hace extract($_POST); con cada elemento
//Del formulario, para evitar estar poniendo $_POST cada vez
print_r($_POST);//Imprime el arreglo $_POST
$campos=array($txtCodigo,$txtNombre,$txtPais,$txtDireccion,$txtTelefono,$txtCorreo,$lstCliente);
/*echo "<br />";
print_r($campos);*/
if($guardarCont=$objGuardar->guardar_proveedor($campos)){
	echo "Proveedor guardado";

	header("location:?mod=agregar_proveedor");
}
?>