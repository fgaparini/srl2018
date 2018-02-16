<div data-role="panel" id="mypanel" data-theme="a" data-position="left" data-display="overlay">
    <!-- panel content goes here -->
    <a href="#mypanel" data-role="button" Title="Cerrar Panel" data-icon="delete" data-iconpos="notext" data-theme="a" data-inline="true"></a>
        <a href="<?php echo base_url() ?>m" Title="Pagina Inicio" data-role="button" data-icon="home" data-iconpos="notext" data-theme="a" data-inline="true"></a>
    <h2>Menu Principal</h2>
     <div data-role="collapsible-set" data-inset="false" data-theme="a" id="menuhome">
      <div data-role="collapsible" >
        <h3>Alojamientos</h3>
        <ul data-role="listview" data-inset="false">
          <li><a href="<?php echo base_url() ?>m/alojamientos/hoteles-san-rafael.html">Hoteles</a></li>
          <li><a href="<?php echo base_url() ?>m/alojamientos/cabanas-san-rafael.html">Cabañas</a></li>
          <li><a href="<?php echo base_url() ?>m/alojamientos/chalets-san-rafael.html">Chalets</a></li>
          <li><a href="<?php echo base_url() ?>m/alojamientos/departamentos-san-rafael.html">Departamentos</a></li>
          <li><a href="<?php echo base_url() ?>m/alojamientos/apart-hoteles-san-rafael.html">Apart Hoteles</a></li>
          <li><a href="<?php echo base_url() ?>m/alojamientos/casas-turisticas.html">Alquiler Casas</a></li>
        </ul>
      </div>
      <div data-role="collapsible" id="circuitos">
        <h3>Circuitos Turísticos</h3>
        <ul data-role="listview" data-inset="false">
          <li><a href="<?php echo base_url(); ?>m/circuitos-turisticos/valle-grande.html"> 
        <img src="<?php echo base_url() ?>imagenes/valleGrande.jpg" >
        <h2>Valle Grande</h2>
        <p>Paisajes y Aventura</p></a></li>
          <li><a href="<?php echo base_url(); ?>m/circuitos-turisticos/los-reyunos.html"> 
        <img src="<?php echo base_url() ?>imagenes/losReyunos.jpg" >
        <h2>Los Reyunos</h2>
        <p>Relajacion e Impactante</p></a></li>
            <li><a href="<?php echo base_url(); ?>m/circuitos-turisticos/el-nihuil.html"> 
        <img src="<?php echo base_url() ?>imagenes/nihuil1.jpg" >
        <h2>El Nihuil</h2>
        <p>Nautica y Paz</p></a></li>
          <li><a href="<?php echo base_url(); ?>m/circuitos-turisticos/ciudad-san-rafael.html"> 
        <img src="<?php echo base_url() ?>imagenes/ciudad.jpg" >
        <h2>Ciudad</h2>
        <p>Tradicional, vinos ..</p></a></li>
           <li><a href="<?php echo base_url(); ?>m/circuitos-turisticos/villa-25-mayo.html"> 
        <img src="<?php echo base_url() ?>imagenes/villa25mayo.jpg" >
        <h2>Villa 25 Mayo</h2>
        <p>Museo Viviente</p></a></li>
         <li><a href="<?php echo base_url(); ?>m/circuitos-turisticos/alta-montana.html"> 
        <img src="<?php echo base_url() ?>imagenes/sosneado.jpg" >
        <h2>Alta Montaña</h2>
        <p>Bellezas Naturales</p></a></li>

      <li><a href="<?php echo base_url(); ?>m/circuitos-turisticos/las-lenas.html"> 
        <img src="<?php echo base_url() ?>imagenes/lasLenas.jpg" >
        <h2>Las Leñas</h2>
        <p>La mejor Nieve</p></a></li>
         <li><a href="<?php echo base_url(); ?>m/circuitos-turisticos/canon-atuel.html"> 
        <img src="<?php echo base_url() ?>imagenes/canonAtuel.jpg" >
        <h2>Cañon del Atuel</h2>
        <p>Unico en Belleza </p></a></li>
        </ul>
      </div>
      <div data-role="collapsible">
        <h3>¿Que Hacer?</h3>
        <ul data-role="listview" data-inset="false">
          <li><a href="<?php echo base_url() ?>m/turismoaventura"> <img src="<?php echo base_url() ?>iconos/taventura.jpg" class="ui-li-icon">
        Turismo Aventura</a></li>
          <li><a href="<?php echo base_url() ?>m/vinos/vinos-san-rafael.html"><img src="<?php echo base_url() ?>iconos/vinos.jpg" class="ui-li-icon">Camino del Vino</a></li>
          <li><a href="<?php echo base_url() ?>m/olivos/olivos-san-rafael.html"><img src="<?php echo base_url() ?>iconos/olivos.jpg" class="ui-li-icon">Camino del Olivo</a></li>
          <li><a href="<?php echo base_url() ?>m/agenda/agenda-san-rafael.html"><img src="<?php echo base_url() ?>iconos/agenda.jpg" class="ui-li-icon">Agenda</a></li>
          
        </ul>
      </div>
      <div data-role="collapsible">
        <h3>Servicios Turisticos</h3>
        <ul data-role="listview" data-inset="false">
          <li><a href="<?php echo base_url() ?>m/servicios/gastronomia/">Donde Comer?</a></li>
          <li><a href="<?php echo base_url() ?>m/servicios/transporte/">Transportes</a></li>
          <li><a href="<?php echo base_url() ?>m/servicios/turisticos/">Agencias y Emp. Aventura</a></li>

        </ul>
      </div>
      
    </div>
  </div><!-- /panel -->