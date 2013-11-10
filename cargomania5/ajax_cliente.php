<?php
include("conexion.php");
echo $consulta2 = pg_query("select cliente_id,giro,direccion,telefono_represent from cliente where cliente_id=".$_GET['id']);
//echo "<select name='pais' id='pais' class='select_style'>";
while ($row = pg_fetch_array($consulta2)) {
    //echo "<option value='" . $fila[0] . "'>" . utf8_encode($fila[1]) . "</option>";

?>

<table>
	<tr>
<td class="categoria_cliente">Codigo</td>
          <td><input class="text_area" name="test" disabled="disabled" value="<?php echo $row['cliente_id']; ?>"

              type="text"></td>
          <td class="categoria_cliente">País cliente</td>
          <td class="categoria_cliente_derecha"> <label class="text_area">el salvador (campo faltante)</label> </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Fecha</td>
          <td><input class="text_area" name="test" disabled="disabled" value="<?php  date_default_timezone_get('UTC'); echo date("d-m-Y") ?>"

              type="text"></td>
          <td class="categoria_cliente">Direccion cliente</td>
          <td> <label class="text_area"><?php echo $row['direccion'];?></label></td>
        </tr>
        <tr>
          <td class="categoria_cliente">Hora</td>
          <td><input class="text_area" name="test" disabled="disabled" value="<?php echo date('H:i:s'); ?> "

              type="text"></td>
          <td class="categoria_cliente">Telefono</td>
          <td> <label class="text_area"><?php  echo $row['telefono_represent'];?></label> </td>
        </tr>
        <tr>

          <td class="categoria_cliente">Tarifa</td>
          <td><label class="text_area">$500</label> </td>
</tr>


</table>









<?php










}
//echo "</select>";
?>