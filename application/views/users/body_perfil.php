
	
	<!-- Content -->
	<article class="container_12">
		

			<div class="block-border">
				<div class="block-content">
				<!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
				<h1>Perfil</h1>
				
				    <form method="post" class="form" action="<?php echo base_url() ?>users/dash/clientes_save/">
                <section class="grid_7">
                    <fieldset class=" inline-small-label ">
        <legend>Datos Usuario</legend>
                 <div class="grid_9">
       
                        <p > <label class="control-label" >Usuario:</label>
                         <input type="text" name="Usuario" class="full-width"  value="<?php echo $Usuario2 ?>">
                        </p>
                        
                     
                           <p>
                        <label class="control-label" >Clave:</label>
                        
                            <input type="password" name="Clave" id="clave" value="<?php echo $Clave; ?>" class="full-width">
                            <input type="text" name="Clave" id="clave2" value="<?php echo $Clave; ?>" class="full-width " style="display:none">

                        </p>
                        <p><label class="control-label" >Ver Clave:</label>
                                                     
                                                            <input   value="1" name="verpass" id="verpass" type="checkbox" class="">
                                                         
                        </p>
                        <p>
                        <label class="control-label" >Nombre Usuario:</label>
                         <input type="text" name="NombreCliente" value="<?php echo $NombreCliente ?>" class="full-width">
                       </p>
                        <p>
                        <label class="control-label" >Apellido Usuario:</label>
                       <input type="text" name="WebSite" value="<?php echo $ApellidoCliente ?>" class="full-width">
                        </p>
                           <p>
                        <label class="control-label" >Email :</label>
                        <input type="text" name="EmailCliente" value="<?php echo $EmailCliente ?>" class="full-width">
                       </p>
                       <p>
                        <label class="control-label" >Cargo:</label>
                        <input type="text" name="Cargo" value="<?php echo $Cargo ;?>" class="full-width">
                       </p>
                           <p>
                               
                              <p> <button  type="submit" >Guardar</button>
                           </p>
                       
                    </div>
                   </fieldset>
              
 </section>


                </form><div class="clearfix"></div>
				</div>
			</div>
		
		
		
	</article>
	
	<!-- End content -->
