		<div id="form_contact" align="center">
			<div align="left">
		
  <h2>CONTACTENOS </h2>
  
 <form id="fromAa" method="post"> <div id="form"  align="left" >
    <div class=""><label for="namexa">Nombre y Apellido:</label><br/><input type="text" name="namexa" id="namexa" placeholder="Su nombre Aqui"/> </div>
    <div class=""><label for="emailxa">Email:</label><br/><input type="text" name="emailxa" placeholder="Su email Aqui" id="emailxa"/> </div>
    <div class=""><label for="telefonoxa">Telefono:</label><br/><input type="text" name="telefonoxa" id="telefonoxa" placeholder="Su telefono Aqui"/> </div>

    <div class=""><label for="consultaxa">Consulta:</label><br/><textarea name="consultaxa" id="consultaxa" cols="40" rows="5" id="consulta" placeholder="Agregue su consulta"></textarea> </div>
    <button type="button" id="enviarIF" class="ib_button">Enviar</button>
    <input type="hidden" name="asunto" id="asunto" value="<?php echo $asunto; ?>">   
    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">   
    <input type="hidden" name="tipoc" id="tipoc" value="<?php echo $tipoc; ?>">   

 </div></form>
</div>
		</div>