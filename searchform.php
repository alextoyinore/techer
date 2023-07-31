<div id="techer-search">
	
	<div id="close-search" class="touch-close" style="cursor:default;"></div>

	<form id="techer-search-form" 
		  role="search" 
		  method="get" 
		  class="techer-search-form group" 
		  action="<?php echo home_url('/'); ?>">

		<input type="search" id="techer-search-input" class="techer-input"
			   placeholder="<?php echo esc_attr_x( 'Search '.get_bloginfo('name'), 'placeholder' ) ?>"
			   value="<?php echo get_search_query() ?>" name="s" /> <br><br>
		
		<!--<div id="close-search">Close</div>-->
	</form>
</div>

<style>
	.touch-close{
		position: absolute;
		width: 100%;
		height: 100%;
		z-index: -1;
	}
</style>

