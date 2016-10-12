<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 */

/** Disable Redux Demo Mode **/
function disable_redux_demo() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'disable_redux_demo');

/** Remove Redux Menu Under Tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}

/** Display upgrade notice on customizer page **/
function integral_prefix_upsell_notice() {

	// Enqueue the script
	wp_enqueue_script(
		'prefix-customizer-upsell',
		get_template_directory_uri() . '/js/upsell.js',
		array(), '1.0.0',
		true
	);

	// Localize the script
	wp_localize_script(
		'prefix-customizer-upsell',
		'prefixL10n',
		array(
			'prefixURL'	=> esc_url( 'https://www.themely.com/themes/integral/' ),
			'prefixLabel'	=> __( 'View Pro Version', 'integral' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'integral_prefix_upsell_notice' );


/** Custom Excerpts **/
function integral_custom_excerpts($limit) {
    return wp_trim_words(get_the_content(), $limit);
}


/** Display Themely Blog Feed **/
add_action( 'wp_dashboard_setup', 'integral_dashboard_setup_function' );
function integral_dashboard_setup_function() {
    add_meta_box( 'integral_dashboard_widget', 'Themely News & Updates', 'integral_dashboard_widget_function', 'dashboard', 'side', 'high' );
}
function integral_dashboard_widget_function() {
    echo '<div class="rss-widget">';
     wp_widget_rss_output(array(
          'url' => esc_url( 'https://www.themely.com/feed/' ),
          'title' => 'Themely News & Updates',
          'items' => 3,
          'show_summary' => 1,
          'show_author' => 0,
          'show_date' => 1
     ));
     echo '</div>';
}
