<?php
include("conexion.php");
echo $consulta2 = pg_query("select proveedor_id,nombre_prov from proveedor where fk_cliente=".$_GET['id']."order by nombre_prov ASC");
echo "<select name='pais' id='pais' class='select_style'>";
while ($fila = pg_fetch_array($consulta2)) {

    echo "<option value='" . $fila[0] . "'>" . utf8_encode($fila[1]) . "</option>";
















}
echo "</select>";
?>