<?php
add_action('wp_enqueue_scripts', 'shin_scripts');
function shin_scripts()
{
  $version = '3.2.0';

  // Load CSS
  wp_enqueue_style('main-style-css', THEME_URL . '-child' . '/assets/main/main.css', array(), $version, 'all');
  // Load JS
  wp_enqueue_script('main-scripts-js', THEME_URL . '-child' . '/assets/main/main.js', array('jquery'), $version, true);
}

// shortcode create search product button [search_products]
function search_products_shortcode() {
    ob_start();
    ?>
    <form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="flex-search-product">
            <label class="screen-reader-text" for="s"><?php _e('Search for:'); ?></label>
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search Products"/>
            <input type="hidden" name="post_type" value="product" />
            <button type="submit" id="searchsubmit"><?php _e('Search'); ?></button>
        </div>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('search_products', 'search_products_shortcode');