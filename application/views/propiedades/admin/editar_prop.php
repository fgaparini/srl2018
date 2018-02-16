<div id="page-wrapper">
  <div class="row"> 
    <div class="col-lg-12">
  <h1><?php echo ucfirst($Prop['Titulo']) ?> - <?php echo $Prop['ID_Propiedades'] ?>

      <div class="btn-group">
  <button type="button" class="btn btn-danger">Editar</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/formprop/'.$Prop['ID_Propiedades']  ?>">Info</a></li>
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/listarfotos/'.$Prop['ID_Propiedades']  ?>">Fotos</a></li>
    <li><a href="<?php echo base_url().'propiedadessrl/adminroot/map_prop/'.$Prop['ID_Propiedades']  ?>">Coordendas</a></li>

  </ul>
</div></h1>
  <ol class="breadcrumb">
              <li><a href="<?php echo base_url() ?>propiedadessrl/adminroot"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> Editar Propiedad</li>
            </ol>
<form  class= "form-horizontal"  role= "form" action="<?php echo base_url() ?>propiedadessrl/adminroot/save" method="post" >
        <div class="col-lg-5">
         
          <div  class= "form-group" >
            <label  for= "Titulo Propiedad"  class= "" > Titulo </label>
            <div  class= "" >
              <input  type= "text"  class= "form-control"  id= "titulo" name="titulo" value="<?php echo $Prop['Titulo'] ?>">
            </div>
          </div>
          <div  class= "form-group" >
             <label  for= "Descripcion"  class= "" > Descripcion </label>
            <div  class= "" >
              <textarea    class= "form-control"  id= "descripcion" name="descripcion"   rows="5"  ><?php echo $Prop['Descripcion'] ?>
              </textarea>
            </div>
             </div>
            <div  class= "form-group" >
             <label  for= "direccion"  class= "" > Direccion </label>
            <div  class= "" >
              <input  type= "text"  class= "form-control"  id= "direccion" name="direccion"  value="<?php echo $Prop['Direccion'] ?>" >
            </div>
             </div>
              <div  class= "form-group" >
             <label  for= "telefono"  class= "" > Telefono </label>
            <div  class= "" >
              <input  type= "text"  class= "form-control"  id= "telefono" name="telefono" value="<?php echo $Prop['Telefono'] ?>" >
            </div>
             </div>
             <hr>
        <div  class= "form-group" >
          <div class="col-lg-6">
            <label  for= "tipoprop"  class= "" > Tipo Propiedad </label>
            <div  class= "" >
              <select name="tipoprop" id="tipoprop" class="form-control">
               <?php foreach ($TipoProp as $var): ?>
                 <option value="<?php echo $var['ID_Tipo'] ?>" <?php  if ($var['ID_Tipo'] == $Prop['TipoPropiedades_ID_Tipo'] ){ echo 'selected="selected"';}?> > <?php echo $var['TipoPropiedades'] ?></option>
               <?php endforeach ?>

              </select>
            </div>
          </div>
      </div>
      <hr>
      <h3 >Operación</h3>
             <div class="checkbox-inline">
              <label>
                <input type="radio" name="operacion" id="operacion"  <?php  if ( $Prop['Operacion']=="venta" ){ echo 'checked="checked"';}?>   value="venta"> Compra
              </label>
            </div>
            <div class="checkbox-inline">
              <label>
                <input type="radio" id="operacion" name="operacion" <?php  if ( $Prop['Operacion']=="alquiler" ){ echo 'checked="checked';}?> value="alquiler"> Alquiler
              </label>
            </div>
            <div class="checkbox-inline">
              <label>
                <input type="radio" id="operacion" name="operacion" <?php  if ( $Prop['Operacion']=="alquiler temporario" ){ echo 'checked="checked';}?> value="alquiler temporario"> Alquiler Temporario
              </label>
            </div>
            <hr>
      <h3 >Valor Propiedad </h3>
               <div  class= "form-group bg-success" >
                 <div class="col-lg-6">
            <label  for= "precio"  class= "" > Precio</label>
            <div  class= "" >
              <input  type= "text"  class= "form-control" name="precio" id= "precio"  value="<?php echo $Prop['Precio'] ?>" > 
            </div>
            </div>
                <div class="col-lg-6">
            <label  for= "ambientes"  class= "" >Moneda </label>
            <div  class= "" >
              <select name="moneda" id="modenda" class="form-control">
                <option value="pesos" <?php  if ( $Prop['Moneda']=="pesos" ){ echo 'selected="selected"';}?>>Peso</option>
                <option value="dolar" <?php  if ( $Prop['Moneda']=="dolar" ){ echo 'selected="selected"';}?>>Dolar</option>

              </select>
            </div>
            </div>
             </div>
             
</div>
      <div class="col-lg-1"></div>
          <div class="col-lg-5">
                 <h3>Caracteristicas Propiedad</h3>
            <div  class= "form-group" >
                 <div class="col-lg-6">
            <label  for= "superficie"  class= "" > Superficie m2</label>
            <div  class= "" >
              <input  type= "text"  class= "form-control" name="superficie"  id= "superficie"  value="<?php echo $Prop['Superficie'] ?>"  > 
            </div>
            </div>
                <div class="col-lg-6">
            <label  for= "superficiecub"  class= "" > Superficie Cubierta m2</label>
            <div  class= "" >
              <input  type= "text"  class=" small form-control" name="superficiecub" id= "superficiecub"  value="<?php echo $Prop['SuperficieCub'] ?>"  > 
            </div>
            </div>
             </div>
            <div class="checkbox-inline">
              <label>
                <input type="checkbox" id="Garage" name="Garage" value="1" <?php  if ( $Prop['Garage']=="1" ){ echo 'checked="checked"';}?>> Garage
              </label>
            </div>
             <div class="checkbox-inline">
              <label>
                <input type="checkbox" id="electricidad" name="electricidad"  value="1" <?php  if ( $Prop['Electricidad']=="1" ){ echo 'checked="checked"';}?>> Electricidad
              </label>
            </div>
              <div class="checkbox-inline">
              <label>
                <input type="checkbox" id="gas" name="gas"  value="1" <?php  if ( $Prop['Gas']=="1" ){ echo 'checked="checked"';}?>> Gas
              </label>
            </div>
             <div class="checkbox-inline">
              <label>
                <input type="checkbox" id="cloacas" name="cloacas"  value="1" <?php  if ( $Prop['Cloacas']=="1" ){ echo 'checked="checked"';}?>> Cloacas
              </label>
            </div>
            
          <div  class= "form-group" >
 <div class="col-lg-4">
            <label  for= "Habitaciones"  class= "" > Habitaciones </label>
            <div  class= "" >
              <select name="habitaciones" id="habitaciones" class="form-control">
                <?php for ($i=0; $i <= 10 ; $i++) { 
                  if($i==$Prop['Habitaciones']){
                    $aa='selected="selected"';
                   } else {$aa="";}
       
                  echo ' <option value="'.$i.'" '.$aa.' >'.$i.'</option>';
                } ?>

              </select>
            </div>
</div>
 <div class="col-lg-4"> 
  <label  for= "banos"  class= "" > Baños </label>
            <div  class= "" >
              <select name="banos" id="banos" class="form-control">
                <?php for ($i=0; $i <= 10 ; $i++) { 
                   if($i==$Prop['Banos']){
                    $aa='selected="selected"';
                   } else {$aa="";}
                  echo ' <option value="'.$i.'" '.$aa.' >'.$i.'</option>';
                } ?>

              </select>
            </div>
          </div>
          <div class="col-lg-4"> 
           <label  for= "ambientes"  class= "" > Ambientes </label>
            <div  class= "" >
              <select name="ambientes" id="ambientes" class="form-control">
                <?php for ($i=0; $i <= 10 ; $i++) { 
                   if($i==$Prop['Ambientes']){
                    $aa='selected="selected"';
                   } else {$aa="";}
                  echo ' <option value="'.$i.'" '.$aa.'>'.$i.'</option>';
                } ?>

              </select>
            </div>
          </div>


          </div>
       <div  class= "form-group" >
                 <div class="col-lg-6">
            <label  for= "hectareas"  class= "" > Hectareas ha (solo para fincas,  etc)</label>
            <div  class= "" >
              <input  type= "text"  class= "form-control" name="hectareas" id= "hectarea"  value="<?php echo $Prop['Hectareas'] ?>" > 
            </div>
            </div>
                <div class="col-lg-6">
            <label  for= "antiguedad"  class= "" >Antiguedad </label>
            <div  class= "" >
              <select name="antiguedad" id="Antiguedad" class="form-control">
                <?php for ($i=0; $i <= 10 ; $i++) 
                { 
                  $e=$i*5;
                  if($e==$Prop['Ambientes']){
                    $aa='selected="selected"';
                   } else {$aa="";}
                  if($e<50)
                  {
                            if ($e==0){
                          echo ' <option value="'.$e.'" '.$aa.'>a Estrenar</option>';

                            } else {
                          echo ' <option value="'.$e.'" '.$aa.'>'.$e.' años</option>';
                          }
                  } else { 
                    echo ' <option value="'.$e.'" '.$aa.'> > '.$e.' años</option>';
                  }
                } ?>

              </select>
            </div>
            </div>
             </div>
                    <div  class= "form-group" >
                               <div class="col-lg-6">
            <label  for= "tipoprop"  class= "" >Ciudad/Distrito </label>
            <div  class= "" >
              <select name="distrito" id="distrito" class="form-control">
               <?php foreach ($Distrito as $var): ?>
                 <option value="<?php echo $var['ID_Distritos'] ?>" <?php if($var['ID_Distritos'] == $Prop['Distritos_ID_Distritos']){echo 'selected="selected"';} ?> > <?php echo $var['Distrito'] ?> - San Rafael</option>
               <?php endforeach ?>

              </select>
            </div>
          </div>
                 <div class="col-lg-6">
             
              
            </div>
          </div>
            <div  class= "form-group" style="margin-top:50px;" >
            <button class="btn btn-warning rigth" id="editprop">Editar Propiedad</button>
            <input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url() ?>">
            <input type="hidden" id="id_prop" name="id_prop" value="<?php echo $Prop['ID_Propiedades'] ?>">
            <input type="hidden" id="ID_infoprop" name="ID_infoprop" value="<?php echo $Prop['InformacionProp_ID_InformacionProp'] ?>">

            <input type="hidden" id="accion" name="accion" value="edit">

           </div>
      </div>   
         </form>
       </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
