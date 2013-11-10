<script type="text/javascript">
function validar(){
	if(document.getElementById("cmdGuardar").value=="Guardar"){
		document.getElementById("agregarProveedor").action="?mod=guardar_proveedor";
	}else{
		document.getElementById("agregarProveedor").action="?mod=actualizar_proveedor";
	}
}</script>
<?php 
$objProveedor=new CargoMania;
$codigo="";
$nombre="";
$pais="";
$direccion="";
$telefono="";
$correo="";
$fk_clientte="";
if(isset($_GET["id"])){
	$consultarProveedor=$objProveedor->mostrar_proveedor($_GET["id"]);
	if($consultarProveedor->rowCount()==1){
		$contene=$consultarProveedor->fetch(PDO::FETCH_OBJ);
		$codigo=$contene->proveedor_id;
		$nombre=$contene->nombre_prov;
		$pais=$contene->pais_prov;
		$direccion=$contene->direccion;
		$telefono=$contene->telefono_prov;
		$correo=$contene->correo_prov;
		$fk_clientte = $contene->fk_cliente;
	}
}

?>
<form name="agregarProveedor" id="agregarProveedor" method="post" onSubmit="return validar();">
<table>
	<caption><h1>AGREGAR UN NUEVO PROVEEDOR</h1></caption>
	<tr>
		<th>Codigo:</th>
		<td><input type="number" name="txtCodigo" id="txtCodigo" value="<?php echo $codigo ?>" /></td>
	</tr>
	<tr>
		<th>Nombre:</th>
		<td><input type="text" name="txtNombre" id="txtNombre" value="<?php echo $nombre ?>" /></td>
	</tr>
	<tr>
		<th>Pais:</th>
		<td><input type="text" name="txtPais" id="txtPais" value="<?php echo $pais ?>" /></td>
	</tr>
	<tr>
		<th>Direccion:</th>
		<td><input type="text" name="txtDireccion" id="txtDireccion"  value="<?php echo $direccion ?>" /></td>
	</tr>
	<tr>
		<th>Telefono:</th>
		<td><input type="text" name="txtTelefono" id="txtTelefono"  value="<?php echo $telefono ?>" /></td>
	</tr>
	<tr>
		<th>Correo:</th>
		<td><input type="text" name="txtCorreo" id="txtCorreo"  value="<?php echo $correo ?>" /></td>
	</tr>

<tr>
<th>Cliente:</th>
		<td><select name="lstCliente" id="lstCliente">
			<?php 
			$consultarProveedor=$objProveedor->consultar_clientes();
			if($consultarProveedor->rowCount()>0){
				echo "<option value='0'>Elija una sucursal</option>";
				while($cliente=$consultarProveedor->fetch(PDO::FETCH_OBJ)){
			?>
			<?php if($cliente->cliente_id==$cliente && $cliente!=""){
				$selected=" selected";
			}else{
				$selected="";
			} ?>
					<option value="<?php echo $cliente->cliente_id ?>" <?php echo $selected; ?>><?php echo $cliente->nombre_empr ?></option>
			<?php
				}
			}else{
			?>
				<option value="0">No hay clientes</option>
			<?php
			}
			?>
		</select></td>


</tr>


	<tr>
		<td><input type="submit" name="cmdGuardar" value="<?php if(isset($_GET["id"])){echo "Actualizar";}else{echo "Guardar";}?>" id="cmdGuardar" /></td>
	</tr>
</table>
</form>
<table>
	<tr><th>Codigo</th><th>Nombre</th><th>Pais</th><th>Direccion</th><th>Telefono</th><th>Correo</th><th>cliente</th><th>opcion</th></tr>
<?php 
$consultarProveedor=$objProveedor->listar_proveedor();
if($consultarProveedor->rowCount()>0){
	while($proveedor=$consultarProveedor->fetch(PDO::FETCH_OBJ)){
		
			
		echo "<tr><td>".$proveedor->proveedor_id."</td><td>".$proveedor->nombre_prov."</td><td>".$proveedor->pais_prov."</td>
		<td>".$proveedor->direccion."</td><td>".$proveedor->telefono_prov."</td><td>".$proveedor->correo_prov."</td><td><a href='?mod=agregar_proveedor&id=".$proveedor->proveedor_id."'>Mostrar</a></td></tr>";
	}
}
?>
</table>