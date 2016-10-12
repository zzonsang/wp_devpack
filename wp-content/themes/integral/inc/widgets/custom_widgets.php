<?php
get_template_part('inc/widgets/feature_widget');
get_template_part('inc/widgets/service_widget');
get_template_part('inc/widgets/testimonials_widget');
get_template_part('inc/widgets/our_clients_widget');
get_template_part('inc/widgets/our_team_widget');
get_template_part('inc/widgets/projects_single_widget');
add_action( 'admin_enqueue_scripts', 'wcp_upload_script' );
add_action( 'wp_head', 'wcp_image_styles' );
/*
*	Script for Media uploader
 */
function wcp_upload_script($hook){
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script( 'wcp_uploader', get_template_directory_uri(). '/js/admin.js', array('jquery') );
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jqueryui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css', false, null );
}
function wcp_image_styles(){
	wp_register_style( 'wcp-caption-styles', get_template_directory_uri() .'/css/widgets.css' );
}

?>