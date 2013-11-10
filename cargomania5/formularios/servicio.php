<?php
function cliente_id($nombre,$valor)
{
	//include("conexion.php");
	$query = "SELECT * from cliente order by nombre_empr";
	//mysql_select_db($dbname);
	$result = pg_query($query);
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona un cliente...</option>";
	while($registro=pg_fetch_array($result))
	{
		echo "<option value='".$registro["cliente_id"]."'";
		if ($registro["cliente_id"]==$valor) echo " selected";
		echo ">".$registro["nombre_empr"]."</option>\r\n";            
	}
	echo "</select>";
}

function proveedor_id($nombre,$valor)
{
	//include("../conexion.php");
	$query = "SELECT * FROM proveedor order by nombre_prov";
	//pg_select($dbname);
	$result = pg_query($query);
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona un proveedor...</option>";
	while($registro=pg_fetch_array($result))
	{
		echo "<option value='".$registro["proveedor_id"]."'";
		if ($registro["proveedor_id"]==$valor) echo " selected";
		echo ">".$registro["nombre_prov"]."</option>\r\n";
	}
	echo "</select>";
}

function direccion($nombre,$valor)
{
	//include("../conexion.php");
	$query = "SELECT * FROM proveedor order by direccion";
	//pg_select($dbname);
	$result = pg_query($query);
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona un direccion...</option>";
	while($registro=pg_fetch_array($result))
	{
		echo "<option value='".$registro["proveedor_id"]."'";
		if ($registro["proveedor_id"]==$valor) echo " selected";
		echo ">".$registro["direccion"]."</option>\r\n";
	}
	echo "</select>";
}



function pais($nombre,$valor)
{
	//include("conexion.php");
	$query = "SELECT * FROM proveedor order by pais_prov";
	//pg_select($dbname);
	$result = pg_query($query);
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona un pais...</option>";
	while($registro=pg_fetch_array($result))
	{
		echo "<option value='".$registro["proveedor_id"]."'";
		if ($registro["proveedor_id"]==$valor) echo " selected";
		echo ">".$registro["pais_prov"]."</option>\r\n";
	}
	echo "</select>";
}


$objAgentebodega = new Cargomania;

if(isset($_GET["id"])){
  $consultarAgentebodega=$objAgentebodega->mostrar_agentebodega($_GET["id"]);
  if($consultarAgentebodega->rowCount()==1){
    $bod=$consultarAgentebodega->fetch(PDO::FETCH_OBJ);
    $bod=$contene->nombre_aget_bod;


  }

} 




//cliente


$objCliente = new Cargomania;

if(isset($_GET["id"])){
  $consultarCliente=$objCliente->mostrar_cliente($_GET["id"]);
  if($consultarCliente->rowCount()==1){
    $cliente=$consultarCliente->fetch(PDO::FETCH_OBJ);
    $cli=$cliente->nombre_empr;


  }

} 

//

$objServicio = new Cargomania;
$agente="";
if(isset($_GET["id"])){
  $consultarContenedor=$objContenedor->mostrar_contenedor($_GET["id"]);
  if($consultarContenedor->rowCount()==1){
    $contene=$consultarContenedor->fetch(PDO::FETCH_OBJ);
    $proveedor=$contene->fk_proveedor;



  }

}


   

$objAduana = new Cargomania;

if(isset($_GET["id"])){
  $consultarAduana=$objAduana->mostrar_aduana_llegada($_GET["id"]);
  if($consultarAduana->rowCount()==1){
    $adu=$consultarAduana->fetch(PDO::FETCH_OBJ);
    $adu=$contene->nombre_adu_llega;


  }

} 



$objFlete = new Cargomania;

if(isset($_GET["id"])){
  $consultarFlete=$objFlete->mostrar_flete($_GET["id"]);
  if($consultarFlete->rowCount()==1){
    $flete=$consultarFlete->fetch(PDO::FETCH_OBJ);
    $nombre=$contene->nombre_agent_fle;
   


  }


}




$objServiciobodega = new Cargomania;

if(isset($_GET["id"])){
  $consultarServiciobodega=$objServiciobodega->mostrar_serviciobodega($_GET["id"]);
  if($consultarServiciobodega->rowCount()==1){
    $servbod=$consultarServiciobodega->fetch(PDO::FETCH_OBJ);
    $servbod=$contene->nombre_serv_bod;


  }

}  









	
?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
	<title>SERVICIO</title>



	
        <script type="text/javascript">
            $(document).ready(function(){
                $('#cliente_id').change(function(){
                    var id=$('#cliente_id').val();
                    $('#clientes').load('ajax_cliente.php?id='+id);
                    
                   

                });    
            });

        </script>


	<script type="text/javascript" src="js/jquery_combos_anidados.js"></script>
	<script type="text/javascript">

	$(document).ready(function() {
		/* COMBOBOX */
		$("#cliente_id").change(function(event)
		{
			var cliente_id = $(this).find(':selected').val();
			$("#pidproveedor").html("<img src='images/loading.gif' />");
			$("#pidproveedor").load('combobox.php?buscar=proveedor&cliente_id='+cliente_id);
			var proveedor_id = $("#proveedor_id").find(':selected').val();
			$("#piddireccion").html("<img src='images/loading.gif' />");
			$("#piddireccion").load('combobox.php?buscar=direccion&proveedor_id='+proveedor_id);
			$("#pidpais").html("<img src='images/loading.gif' />");
			$("#pidpais").load('combobox.php?buscar=pais&proveedor_id='+proveedor_id);
		});
		$("#proveedor_id").live("change",function(event)
		{
			var id = $(this).find(':selected').val();
			$("#piddireccion").html("<img src='images/loading.gif' />");
			$("#piddireccion").load('combobox.php?buscar=direccion&proveedor_id='+id);
			$("#pidpais").html("<img src='images/loading.gif' />");
			$("#pidpais").load('combobox.php?buscar=pais&proveedor_id='+id);
		});
	});
	</script>
	<style>
	select{padding:5px;border:1px solid #bbb;border-radius:5px;margin:5px 0;display:;box-shadow:0 0 10px #ddd}

	
	input{padding:5px;border:1px solid #bbb;border-radius:5px;margin:5px 0;display:;box-shadow:0 0 10px #ddd}
	
	</style>
</head>
<body>
<h1>Formulario Servicio </h1>
<p>
<strong>Formualio MASTER</strong> </p>
</p>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
	<fieldset>
		<table class="formulario" border="0" cellpadding="0" cellspacing="0">
		


			
      <tbody>
        <tr>
          <td colspan="20" rowspan="1" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Cliente</span></td>

          </table>
        </tr>
	
		
		<p><label>Cliente:</label><?php cliente_id("cliente_id","1"); ?></p>
	<hr>




			<table class="formulario" border="0" cellpadding="0" cellspacing="0">
		


			
      <tbody>
        <tr>
          <td colspan="20" rowspan="1" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Informacion
              de la carga</span></td>

          </table>
        </tr>

        <input type="text" name="txtPeso" placeholder="Peso" />
         <input type="text" name="txtVolumen" placeholder="Volumen" />
         <select name="cmbTcarga"  id="combo">

         	<option>seleccione un tipo de carga.... </option>


         </select>

          <select name="lstServicioBodega" id="lstServicioBodega" class="">
              <?php 
      $consultarServiciobodega=$objServiciobodega->consultar_serviciobodegas();
      if($consultarServiciobodega->rowCount()>0){
        echo "<option value='0'>Elija un servicio de bodega</option>";
        while($bod=$consultarServiciobodega->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($servbod->serv_bod_id==$servbod && $servbod!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $servbod->serv_bod_id ?>" <?php echo $selected; ?>><?php echo $bod->nombre_serv_bod ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay servicio de bodega</option>
      <?php
      }
      ?>
            </select> 
          

         <select name="lstBodega" id="lstBodega" class="">
              <?php 
      $consultarAgentebodega=$objAgentebodega->consultar_agentes();
      if($consultarAgentebodega->rowCount()>0){
        echo "<option value='0'>Elija un bodega</option>";
        while($bod=$consultarAgentebodega->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($bod->aget_bod_id==$bod && $bod!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $bod->aget_bod_id ?>" <?php echo $selected; ?>><?php echo $bod->nombre_aget_bod ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay bodegas</option>
      <?php
      }
      ?>
</select> 




         </select>

          <select name="cmbEstado"  >

         	<option>seleccione  estado de la carga.... </option>


         </select>

          <a href="javascript:popup('?mod=agregar_cliente',500,700)"><img
              title="Agregar cliente" src="imagenes/botones/agregar.png" align="right"></a>
          
         
         
          <a href="javascript:popup('?mod=agregar_cliente',500,700)"><img

              title="Editar cliente" src="imagenes/botones/editar.png" align="right"></a> </img>



		<hr>



			<table class="formulario" border="0" cellpadding="0" cellspacing="0">
		


			
      <tbody>
        <tr>
          <td colspan="20" rowspan="1" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Proveedor</span></td>

          </table>
        </tr>


		<p id="pidproveedor"><label>proveedor:</label><?php proveedor_id("proveedor_id","2"); ?></p>
		<p id="piddireccion"><label>direccion:</label><?php direccion("proveedor_id","3"); ?></p>
		
		<p id="pidpais"><label>pais:</label><?php pais("proveedor_id","4"); ?></p>


	


		<table class="formulario" border="0" cellpadding="0" cellspacing="0">
		


			
      <tbody>
        <tr>
          <td colspan="20" rowspan="1" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Flete</span></td>

         
        </tr>


        <tr>
        	
        		
        	<td>
        		<label>Dia de salida:</label>
        	</td>
        	<td>
        		
        		<input type="date" name="txtDsalida" />
        	</td>

        	<td>
        		<input type="text" style="visibility:hidden" />
        	</td>

			<td>
        		<label>nombre del flete:</label>
        	</td>
        	<td>
        		
        		<select name="cmbFlete" >
        			<option>seleccione un flete </option>
        		</select>
        	</td>


        	<td>
        		<input type="text" style="visibility:hidden" />
        	</td>

        	<td><label>tipo transporte:</label></td>
        	<td><select name="cmbTipoTrans" >
        		<option value="TERRESTRE">TERRESTRE</option>
        		<option value="AEREO">AEREO</option>
        	</select>
        	</td>




        </tr>

         <tr>
         	<td>
        		<label>Dia de llegada:</label>
        	</td>
        	<td>

        		
        		<input type="date" name="txtDllegada" />
        	</td>

        	<td>
        		<input type="text" style="visibility:hidden" />
        	</td>

        	<td><label>Pais flete:</label></td>

        	<td>
        		<select name="cmbPais_flete">

        			<option>selecciones pais..</option>

        		</select>
        	</td>


        	<td>
        		<input type="text" style="visibility:hidden" />
        	</td>

        	<td><label></label></td>

        	

        </tr>


         <tr>
         	<td>
        		<label>lugar de salida:</label>
        	</td>
        	<td>

        		
        		<select name="lstAduana" id="lstAduana" class="">
      <?php 
      $consultarAduana=$objAduana->consultar_aduana();
      if($consultarAduana->rowCount()>0){
        echo "<option value='0'>Elija un aduana</option>";
        while($adu=$consultarAduana->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($adu->adu_llega_id==$adu && $adu!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $adu->adu_llega_id ?>" <?php echo $selected; ?>><?php echo $adu->nombre_adu_llega ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay aduanas</option>
      <?php
      }
      ?>
    </select>


        	</td>

        	<td>
        		<input type="text" style="visibility:hidden" />
        	</td>

        	<td><label>Numero Booking:</label></td>

        	<td><input type="text" name="txtNBokking"  placeholder="CLZ 07-13" </td>

        </tr>
        




        <tr>
         	<td>
        		<label>lugar de llegada:</label>
        	</td>
        	<td>

        		
        		
            <select name="lstAduana" id="lstAduana" class="">
      <?php 
      $consultarAduana=$objAduana->consultar_aduana();
      if($consultarAduana->rowCount()>0){
        echo "<option value='0'>Elija un aduana</option>";
        while($adu=$consultarAduana->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($adu->adu_llega_id==$adu && $adu!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $adu->adu_llega_id ?>" <?php echo $selected; ?>><?php echo $adu->nombre_adu_llega ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay aduanas</option>
      <?php
      }
      ?>
    </select>



        	</td>

        	<td>
        		<input type="text" style="visibility:hidden" />
        	</td>

        	<td><label>numero de BL:</label></td>
        	<td><input type="text" name="txtBl" placelholder="54654HGOH-5" </td>


        	

        </tr>




        <hr>

<div align="center">

	<td><p><input type="submit" name="submit" value="Guardar" /></p></td>
		

	<td><p><input type="submit" name="submit" value="Cancelar" /></p></td>
			
</div>

 </table>
        
	</fieldset>



</form>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-266167-20");
//pageTracker._setDomainName(".martiniglesias.eu");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>