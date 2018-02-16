<div class="container-fluid">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="row-fluid">
                <h2><?php echo $nombre_alojamiento ?></h2>
                <hr>
            </div>
        </div> 

        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">

                        <?php foreach ($alojamientos_menu_sidebar as $var): ?>
                            <li <?php echo $this->gf->comparar_general($var['tipo'],'app',"class='active'") ?>><a href="<?php echo base_url() . $var['href'] . $alo_APP->ID_informacionAPP . "/?&pestania=" . $var['tipo'] ?>"><?php echo $var['nombre'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->

            <div class="span9">
                <div class="row-fluid">
                    <h3>Agregar a APP Guide Tour</h3>
                    <br>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/alojamientos/alojamientos_app_save">
       <input type="hidden" name="ID_informacionAPP" value="<?php echo $alo_APP->ID_informacionAPP ?>">
                    <div class="control-group">
                        <label class="control-label" >Email:</label>
                        <div class="controls">
                            <input type="text"  name="emailapp" value="<?php echo $alo_APP->emailAPP ?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Telefono</label>
                        <div class="controls">
                            <input type="text"  name="telefonoapp" value="<?php echo $alo_APP->TelefonoAPP ?>" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Descripcion:</label>
                        <div class="controls">
                            <textarea class="ckeditor" rows="10" name="descripcionapp"><?php echo $alo_APP->DescripcionAPP ?></textarea>
                        </div>
                    </div>
                  
                    <div class="control-group">
                        <div class="controls">
                            <input type="submit" class="btn btn-large btn-primary" value="Guardar">
                        </div>
                    </div>
                   
                    <input type="hidden" name="ID_Alojamiento" value="<?php echo $alo_id ?>">

                   
                </form>
            </div>
        </div>

