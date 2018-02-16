	
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
 <script src="<?php echo base_url(); ?>users/js/jquery.modal.js"></script>
<?php if (isset($script)): ?>
    <?php foreach ($script as $var): ?>
        <script type="text/javascript" src="<?php echo  $var ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
    <?php if (isset($js)): ?>
    <?php foreach ($js as $var): ?>
        <script type="text/javascript" src="<?php echo base_url() . $var ?>.js"></script>
    <?php endforeach; ?>
<?php endif; ?>


</body>
</html>