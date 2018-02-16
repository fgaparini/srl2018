<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h4>Listado Páginas</h4>
            <hr>
     <div class="row-fluid">
                        <h4>Fechas</h4>
                        <div class="row-fluid">
                            <form action="<?php echo base_url()."admin/publicidad_list/listar_publicidad/" ?>">
                            <div class="span3">
                                <input id="from" id="from" name="fecha_desde" type="text" placeholder="Desde" >
                            </div>
                            <div class="span3">
                                <input type="text" id="to" name="fecha_hasta" value="" placeholder="Hasta" />
                            </div>
                            <div class="span3"><button>buscar</button></div>
                        </form>
                        </div>
                    </div>            <br>
            <br>
            <?php if ($fechas!="none"): ?>
                
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Finalizacion</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
                <?php foreach ($publi_array as $var): ?>
                <?php if ($var['alo_ac']=='D'){
                    $stylo="bg-danger";
                } else{$stylo="";}  ?>
                    
               
                    <tr id="<?php echo "pa_" . $var['ID_alojamiento'] ?>" class="interna <?php echo $stylo ?>" style="cursor:pointer">
                        <td><?php echo $var['ID_alojamiento'] ?></td>
                        <td><?php echo $var['Nombre'] ?></td>
                        <td><?php echo $var['FechaPublicidad'] ?></td>
                        <td><?php echo $var['Precio']." - ".$var['alo_ac'] ?></td>
                        
                        <td>
                          <a title="detalle alojamiento" href="<?php echo base_url() . "admin/alojamientos/form_view/" . $var['ID_alojamiento'] ?>/?pestania=info">
                                <i class="icon-align-justify"></i>
                            </a>
                            
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            </table>
              <?php endif ?>
            <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
            <input type="hidden" name="accion" value="guardar">
        </div>
        <!-- Modal -->
        
        <input id="base_url" value="<?php echo base_url() ?>" type="hidden">
