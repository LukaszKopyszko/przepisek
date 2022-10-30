<?php 
/**
 * REGISTER STYLES AND SCRIPTS
 */
function scripts()
{
    wp_register_style('style-reset', get_template_directory_uri() . '/assets/css/reset.css', [], 1, 'all');
    wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], 1, 'all');
    wp_enqueue_style('style-reset');
    wp_enqueue_style('style');
    wp_enqueue_script('jquery');

    wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], 1, true);
    wp_enqueue_script('app');

}
add_action('wp_enqueue_scripts','scripts');




/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );

add_theme_support('post-thumbnails');

/**
* REJESTRACJA POSTÓW - PRZEPISY
*/


function recipes_post_type() {
    $labels = array(
        'name'                      => __( 'Przepisy', 'text_domain' ),
        'singular_name'             => __( 'Przepis', 'text_domain' ),
        'add_new'                   => __( 'Dodaj nowy', 'text_domain' ),
        'add_new_item'              => __( 'Dodaj nowy przepis', 'text_domain' ),
        'edit_item'                 => __( 'Edytuj przepis', 'text_domain' ),
        'new_item'                  => __( 'Nowy przepis', 'text_domain' ),
        'view_item'                 => __( 'Zobacz przepis', 'text_domain' ),
        'view_items'                => __( 'Zobacz przepisy', 'text_domain' ),
        'not_found'                 => __( 'Nie znaleziono', 'text_domain' ),
        'not_found_in_trash'        => __( 'Nie znaleziono w koszu', 'text_domain' ),
        'parent_item_colon'         => __( 'Rodzic:', 'text_domain' ),
        'all_items'                 => __( 'Wszystkie przepisy', 'text_domain' ),
        'archives'                  => __( 'Archiwum przepisów', 'text_domain' ),
        'attributes'                => __( 'Atrybuty przepisów', 'text_domain' ),
        'insert_into_item'          => __( 'Umieść w przepisie', 'text_domain' ),
        'uploaded_to_this_item'     => __( 'Wgrane do tego przepisu', 'text_domain' ),
        'featured_image'            => __( 'Obrazek wyróżniający', 'text_domain' ),
        'set_featured_image'        => __( 'Ustaw obrazek wyróżniający', 'text_domain' ),
        'remove_featured_image'     => __( 'Ustaw obrazek wyróżniający', 'text_domain' ),
        'use_featured_image'        => __( 'Użyj jako obrazek wyróżniający', 'text_domain' ),
        'menu_name'                 => __( 'Przepisy', 'text_domain' ),
        'filter_items_list'         => __( 'Filter Przepisy list', 'text_domain' ),
        'filter_by_date '           => __( 'Filter by date', 'text_domain' ),
        'items_list_navigation'     => __( 'Przepisy list', 'text_domain' ),
        'items_list'                => __( 'Przepisy list', 'text_domain' ),
        'item_published'            => __( 'Przepisy published', 'text_domain' ),
        'item_published_privately'  => __( 'Przepisy published privately', 'text_domain' ),
        'item_reverted_to_draft'    => __( 'Przepisy reverted to draft', 'text_domain' ),
        'item_scheduled'            => __( 'Przepisy scheduled', 'text_domain' ),
        'item_updated'              => __( 'Przepisy updated', 'text_domain' ),
        'item_link'                 => __( 'Przepisy link', 'text_domain' ),
        'item_link_description'     => __( 'Przepisy link description', 'text_domain' ),
        'name_admin_bar'            => __( 'Przepisy', 'text_domain' ),
        'update_item'               => __( 'Update Przepisy', 'text_domain' ),
        'search_items'              => __( 'Search Przepisy', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Przepis', 'text_domain' ),
        'labels'                => $labels,
        'description'           => __( 'Opis przepisu', 'text_domain' ),
        'public'                => true,
        'hierarchical'          => false,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-carrot',
        'capability_type'       => 'page',
        'supports'              => array('title', 'editor','thumbnail', 'comments', 'trackbacks', 'revisions', 'page-attributes', 'post-formats'),
        'taxonomies'            => array( 'category', 'post_tag' ),
    );
    register_post_type( 'recipes', $args );
}
add_action( 'init', 'recipes_post_type' );

/* SEARCH BOX */
function search_form() {
	$search_form = '<form method="get" id="search-form-alt" action="'. esc_url(home_url('/')) .'">
        <label for="search">Search for stuff</label>
        <input id="search" type="search" placeholder="Wyszukaj..." autofocus required />
        <button type="submit">Idź</button>
	</form>';
	return $search_form;
}
add_shortcode('display_search_form', 'search_form');

?>

