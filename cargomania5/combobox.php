<?php
include 'conexion.php';

if ($_GET[buscar]=="proveedor")
{
	$consulta="SELECT * FROM proveedor WHERE fk_cliente='".pg_escape_string(intval($_GET["cliente_id"]))."' order by nombre_prov";
	pg_select($dbname);
	$todos=pg_query($consulta);



	// Comienzo a imprimir el select
	echo "<label>proveedor:</label><select name='proveedor_id' id='proveedor_id'>";
	echo "<option value=''>Selecciona un nombre...</option>";
	while($registro=pg_fetch_array($todos))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select
		echo "<option value='".$registro["proveedor_id"]."'";
		if ($registro["proveedor_id"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["nombre_prov"])."</option>";
	}
	echo "</select>";
}

if ($_GET[buscar]=="direccion")
{
	$consulta="SELECT * FROM proveedor WHERE proveedor_id='".pg_escape_string(intval($_GET["proveedor_id"]))."' order by direccion";
	pg_select($dbname);
	$todos=pg_query($consulta);
	
	// Comienzo a imprimir el select
	echo "<label>direccion:</label><select name='id_direccion' id='id_direccion'>";
	echo "<option value=''>Selecciona un direccion...</option>";
	while($registro=pg_fetch_array($todos))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select
		echo "<option value='".$registro["proveedor_id"]."'";
		if ($registro["proveedor_id"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["direccion"])."</option>";
	}
	echo "</select>";
}



if ($_GET[buscar]=="pais")
{
	$consulta="SELECT * FROM proveedor WHERE proveedor_id='".pg_escape_string(intval($_GET["proveedor_id"]))."' order by pais_prov";
	pg_select($dbname);
	$todos=pg_query($consulta);
	
	// Comienzo a imprimir el select
	echo "<label>pais:</label><select name='id_pais' id='id_pais'>";
	echo "<option value=''>Selecciona un pais...</option>";
	while($registro=pg_fetch_array($todos))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select
		echo "<option value='".$registro["proveedor_id"]."'";
		if ($registro["proveedor_id"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["pais_prov"])."</option>";
	}
	echo "</select>";
}

?>