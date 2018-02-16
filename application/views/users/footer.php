	
<footer>
    <div class="float-right">
        <a href="#top" class="button"><img src="images/icons/fugue/navigation-090.png" width="16" height="16"> Page top</a>
    </div>
</footer>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
<!--

Updated as v1.5:
Libs are moved here to improve performance
-->
<!-- Generic libs -->
<script src="<?php echo base_url(); ?>users/js/libs/jquery-1.6.3.min.js"></script>
<script src="<?php echo base_url(); ?>users/js/old-browsers.js"></script>		<!-- remove if you do not need older browsers detection -->
<script src="<?php echo base_url(); ?>users/js/libs/jquery.hashchange.js"></script>

<!-- Template libs -->
<script src="<?php echo base_url(); ?>users/js/jquery.accessibleList.js"></script>
<script src="<?php echo base_url(); ?>users/js/searchField.js"></script>
<script src="<?php echo base_url(); ?>users/js/common.js"></script>
<script src="<?php echo base_url(); ?>users/js/standard.js"></script>
<!--[if lte IE 8]><script src="js/standard.ie.js"></script><![endif]-->
<script src="<?php echo base_url(); ?>users/js/jquery.tip.js"></script>
<script src="<?php echo base_url(); ?>users/js/jquery.contextMenu.js"></script>
<script src="<?php echo base_url(); ?>js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script src="<?php echo base_url(); ?>js/fancybox/jquery.fancybox-1.3.4.js"></script>
<script src="<?php echo base_url(); ?>js/blockui-master/jquery.blockUI.js"></script>
<?php if (isset($edito)): ?>
    <script src="<?php echo base_url(); ?>js/user/alojamientos_user_view.js"></script>
<?php endif; ?>
<?php if (isset($Descripcion)): ?>
    <script src="<?php echo base_url(); ?>js/ckeditor/ckeditor.js"></script>
    <script>

        // Replace the <textarea id="editor"> with an CKEditor
        // instance, using default configurations.
        CKEDITOR.replace( 'Descripcion', {
            uiColor: '#F0AD64',
            toolbar: [
                { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
                { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
                        '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
                { name: 'links', items : [ 'Link','Unlink' ] },
                '/',
                { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
                { name: 'colors', items : [ 'TextColor','BGColor' ] },
            ]
        });

    </script>
<?php endif; ?>

<?php if (isset($perfil)): ?>
    <script type="text/javascript">
        $(document).ready(function(){  
                          
            $("#verpass").click(function() {  
                           
                if($("#verpass").is(':checked')) {  
                    $("#clave").hide();
                    $("#clave2").show();
                                    
                                
                                    
                } else {  
                    $("#clave2").hide();
                    $("#clave").show();
                                  
                }  
            });  
                        
        });    
    </script>
<?php endif; ?>
<!-- Charts library -->
<!--Load the AJAX API-->
<?php if (isset($tipacc)): ?>
    <script src="http://www.google.com/jsapi"></script>
    <script>
                    		
        /*
         * This script is dedicated to building and refreshing the demo chart
         * Remove if not needed
         */
                    		
        // Load the Visualization API and the piechart package.
    //     google.load('visualization', '1', {'packages':['corechart']});
                    		
    //     // Add listener for tab
    //     $('#tab-stats').onTabShow(function() { drawVisitorsChart(); }, true);
                    		
    //     // Handle viewport resizing
    //     var previousWidth = $(window).width();
    //     $(window).resize(function()
    //     {
    //         if (previousWidth != $(window).width())
    //         {
    //             drawVisitorsChart();
    //             previousWidth = $(window).width();
    //         }
    //     });
                    		
    //     // Demo chart
    //     function drawVisitorsChart() {

    //         // Create our data table.
    //         var data = new google.visualization.DataTable();
    //         var raw_data = [<?php
    // foreach ($tipacc as $key => $value)
    // {
    //     if (isset($jsondata[$value]))
    //     {
    //         $datos = $jsondata[$value];
    //     }
    //     else
    //     {
    //         $datos = "0,0,0,0,0,0,0,0,0,0,0,0";
    //     }

    //     echo "['" . $key . "',";
    //     print_r($datos);
    //     echo "],";
    // }
    // ?>];
                    			
    //             var months = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
                    			
    //             data.addColumn('string', 'Month');
    //             for (var i = 0; i < raw_data.length; ++i)
    //             {
    //                 data.addColumn('number', raw_data[i][0]);	
    //             }
                    			
    //             data.addRows(months.length);
                    			
    //             for (var j = 0; j < months.length; ++j)
    //             {	
    //                 data.setValue(j, 0, months[j]);	
    //             }
    //             for (var i = 0; i < raw_data.length; ++i)
    //             {
    //                 for (var j = 1; j < raw_data[i].length; ++j)
    //                 {
    //                     data.setValue(j-1, i+1, raw_data[i][j]);	
    //                 }
    //             }
                    			
    //             // Create and draw the visualization.
    //             var div = $('#chart_div');
    //             //new google.visualization.ColumnChart(div.get(0)).draw(data, {
    //             new google.visualization.LineChart(div.get(0)).draw(data, {
    //                 title: 'Visitas Anuales por Destino',
    //                 width: '100%',
    //                 height: 330,
    //                 legend: {position: 'buttom', textStyle: {color: 'blue', fontSize: 13}},

    //                 //vAxis: {title: 'Visitas'},
    //                 hAxis: {title: 'Meses'}
    //             });
                    			
                    			
    //         };
                    		
    </script>
<?php endif ?>
<?php if (isset($js)): ?>
    <?php foreach ($js as $var): ?>
        <script type="text/javascript" src="<?php echo base_url() . $var ?>.js"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>