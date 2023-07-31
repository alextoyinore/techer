<div id="techer-big-menu">
	
	<div id="close-big-menu" class="touch-close" style="cursor:default;"></div>
	
	<div id="techer-site-navigation">
			<div id="site-nav-content">
				<?php wp_nav_menu(
				array(
					'menu' => 'site',
					'container' => '',
					'theme_location' => 'site',
					'items_wrap' => '<div id="the-navs">%3$s</div>'
				)
			); ?>

			<br>
		
			<div id="site-nav-footer">

			<hr>
			<br>

			<?php wp_nav_menu( 
				array(
					'menu' => 'footer',
					'container' => '',
					'theme_location' => 'footer',
					'items_wrap' => '<div id="the-navs">%3$s</div>'
				)
			 ); ?>

			</div>
		</div>
		
		<!--<div id="close-big-menu">Close</div>-->
		
	</div>
	
</div>


<style>
	.touch-close{
		position: absolute;
		width: 100%;
		height: 100%;
		z-index: -1;
	}
	
	/* #site-nav-footer{
		position: relative;
		bottom: 0;
		height: 25%;
	} */
</style>

