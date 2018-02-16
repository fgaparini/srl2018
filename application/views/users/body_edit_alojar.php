
	
	<!-- Content -->
	<article class="container_12">
		

			<div class="block-border">
				<div class="block-content">
				<!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
				<h1>Editar Datos Alojameinto</h1>
				
				    <form method="post" class="form" action="<?php echo base_url() ?>users/dash/save/">
                <section class="grid_5">
                    <fieldset class=" inline-small-label ">
        <legend>Datos del Alojamiento</legend>
                 <div class="grid_11">
       
                        <p > <label class="control-label" >Nombre:</label>
                         <input type="text" name="Nombre" class="full-width"  value="<?php echo $Nombre ?>">
                        </p>
                        <p>
                        <label class="control-label" >Tipo Alojamiento:</label>
                            <select name="ID_TipoAlojamiento" class="full-width">
                                <?php foreach ($tipoalojamientos_array as $var): ?>
                                    <option value="<?php echo $var['ID_TipoAlojamiento'] ?>" <?php echo $this->gf->comparar_general($var['ID_TipoAlojamiento'], $ID_TipoAlojamiento, "selected='selected'") ?> ><?php echo $var['TipoAlojamiento'] ?></option>
                                <?php endforeach ?>
                            </select>
                      </p>
                      <p>
                        <label class="control-label" >Categoría:</label>
                            <select name="ID_Categorias" class="full-width">
                                <?php foreach ($categorias_array as $var): ?>
                                    <option value="<?php echo $var['ID_Categorias'] ?>" <?php echo $this->gf->comparar_general($var['ID_Categorias'], $ID_Categorias, "selected='selected'") ?> ><?php echo $var['Categoria'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </p>
                           <p>
                        <label class="control-label" >Dirección:</label>
                        
                            <input type="text" name="Direccion" value="<?php echo $Direccion ?>" class="full-width">
                        </p>
                        <p>
                        <label class="control-label">Teléfono:</label>
                        <input type="text" name="Telefono" value="<?php echo $Telefono ?>" class="full-width">
                        </p>
                        <p>
                        <label class="control-label" >Email:</label>
                         <input type="text" name="Email" value="<?php echo $Email ?>" class="full-width">
                       </p>
                        <p>
                        <label class="control-label" >Website:</label>
                       <input type="text" name="WebSite" value="<?php echo $WebSite ?>" class="full-width">
                        </p>
                           <p>
                        <label class="control-label" >Responsable:</label>
                        <input type="text" name="Responsable" Placeholder="Coloque nombre responsable alojamiento" value="<?php echo $Responsable ?>" class="full-width">
                       </p>
                       <p>
                        <label class="control-label" >Facebook.com/</label>
                        <input type="text" name="Facebook" <?php if (isset($Facebook)) {
                           echo 'value="'.$Facebook.'"';} ?>
                        Placeholder="Coloque solo su nombre de Usuario" class="full-width">
                       </p>
                           <p>
                        <label class="control-label" >Twitter.com/</label>
                        <input type="text" name="Twitter" <?php if (isset($Twitter)) {
                           echo 'value="'.$Twitter.'"';}?>
                        Placeholder="Coloque solo su nombre de Usuario" class="full-width">
                       </p>
                        <p>
                        <label class="control-label" >Pinterest.com/</label>
                        <input type="text" name="Pinterest" <?php if (isset($Pinterest)) {
                           echo 'value="'.$Pinterest.'"';}?>
                       Placeholder="Coloque solo su nombre de Usuario" class="full-width">
                       </p>
                       <p>
                        <label class="control-label">plus.Google.com/</label>
                        <input type="text" name="Gplus"  <?php if (isset($Gplus) OR $Gplus!='' OR $Gplus!=NULL ) {
                           echo 'value="'.$Gplus.'"';    } ?> Placeholder="Coloque solo su nombre de Usuario" class="full-width">
                       </p>
                    </div>
                   </fieldset>
               <div class="clearfix"></div>
 </section>


                <section class="grid_6 ">
                        <fieldset class="grey-bg ">
        <legend>Descripcion del Alojamiento</legend>
                    
                    <textarea class="ckeditor" id="Descripcion" rows="10" name="Descripcion"><?php echo $Descripcion ?></textarea>
                  
                    
                    </fieldset>
                   
                   <p> <button  type="submit" >Guardar</button>
                        </p>
                       
                    


                <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
                <input type="hidden" name="accion" value="<?php echo $accion ?>">
                <input type="hidden" name="ID_Alojamiento" value="<?php echo $ID_Alojamiento ?>">
                <input type="hidden" name="ID_MP" value="<?php echo $ID_MP ?>">
                <input type="hidden" name="ID_InformacionGeneral" value="<?php echo $ID_InformacionGeneral ?>">
           </section> </form><div class="clearfix"></div>
				</div>
			</div>
		
		
		
	</article>
	<script type="text/javascript">

	<!-- End content -->
