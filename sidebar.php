<?php if ( ( is_active_sidebar(wip_postmeta('wip_sidebar')) ) && ( wip_template('span') == "span8" ) ) : ?>
        
	<section id="sidebar" class="span4">
		<div class="row">
			<?php dynamic_sidebar(wip_postmeta('wip_sidebar')) ?>
		</div>
	</section>
    
<?php endif; ?>