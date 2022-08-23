
<form id="techer-search-form" role="search" method="get" class="techer-search-form group" action="<?php echo home_url(
        '/'
); ?>">
    <input type="search" id="techer-search-input" class="techer-input"
           placeholder="<?php echo esc_attr_x( 'What do you want to search for?', 'placeholder' ) ?>"
           value="<?php echo get_search_query() ?>" name="s" />
</form>

