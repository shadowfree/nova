<?php 
	
	wip_bottom_content();
	do_action( 'wip_socials' ); 
	
?>
    
<footer id="footer">
	
    <div class="container">
		
        <div class="row" >
             
			<div class="span12 copyright" >
    
                 <?php if (wip_setting('wip_copyright_text')): ?>
                	<p> <?php echo stripslashes(wip_setting('wip_copyright_text')); ?> </p>
                <?php else: ?>
                	<p> Copyright <?php echo get_bloginfo("name"); ?> <?php echo date("Y"); ?> - Powered by <a href="http://www.wpinprogress.com/" target="_blank">WP in Progress</a> </p>
            	<?php endif; ?>
    
			</div>
                
		</div>
        
	</div>
    
</footer>
    
<div id="back-to-top">
	<a href="#" style=""><i class="fa fa-chevron-up"></i></a> 
</div>
    
<?php wp_footer() ?>  
 
</body>

</html>