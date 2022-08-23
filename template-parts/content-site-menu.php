
<div id="techer-site-navigation">
    <hr>
    <br>
    <?php wp_nav_menu(
        array(
            'menu' => 'site',
            'container' => '',
            'theme_location' => 'site',
            'items_wrap' => '<div>%3$s<br><br><br></div>'
        )
    ); ?>
</div>

<style>

</style>