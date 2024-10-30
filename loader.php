<?php
/*
Plugin Name: BP Template Overloader
Plugin URI: https://wordpress.org/plugins/bp-template-overloader/
Description: Simplify the management of BuddyPress customisations, scan your site for overloads, compare the file content and manage the overload status.
Version: 1.2.0
Author: Venutius
Author URI: https://buddyuser.com/plugin-bp-template-overloader
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
@package bp-template-overloader

*/
 
if ( !defined( 'ABSPATH' ) ) exit;
function bptold_check_buddypress() {
    
	if ( ! class_exists( 'buddypress' ) ) {
        
		add_action( 'admin_notices', 'bptold_no_bp_admin_notice' );
    
		return;
	
	}

}

add_action( 'plugins_loaded', 'bptold_check_buddypress' );


function bptold_no_bp_admin_notice() {
    ?>

    <div class="error fade notice-error6 is-dismissible">

		<p><?php esc_textarea(_e( 'BuddyPress needs to be active for BP Template Overloader to work.', 'bp-template-overloader' ) ); ?></p>
    
	</div>

	<?php
	return;
}

 
//Set up plugin globals
 function bp_told_init() {
	
	$uploads = wp_upload_dir();
	$content_dir = WP_CONTENT_DIR;
	$content_url = content_url();

	if ( bp_get_theme_package_id() == 'legacy' ) {
		define ( 'BP_TOLD_TEMPLATE_DIR', $content_dir . '/bp-template-overloads/bp-legacy/' );
		define ( 'BP_TOLD_TEMPLATE_URL', $content_url . '/bp-template-overloads/bp-legacy/' );
	}
	if ( bp_get_theme_package_id() == 'nouveau' ) {
		define ( 'BP_TOLD_TEMPLATE_DIR', $content_dir . '/bp-template-overloads/bp-nouveau/' );
		define ( 'BP_TOLD_TEMPLATE_URL', $content_url . '/bp-template-overloads/bp-nouveau/' );
	}
	
	define	( 'BP_TOLD_DIR', dirname( __FILE__ ) );
	define	( 'BP_TOLD_URL', plugins_url( '', __FILE__ ) );
 
    require( BP_TOLD_DIR . '/inc/bp-told.php' );
    require( BP_TOLD_DIR . '/inc/bp-told-admin.php' );
	require( BP_TOLD_DIR . '/inc/bp-told-ajax.php' );

	if ( ! class_exists( 'bpToldDiff' ) ) {
		require( dirname( __FILE__ ) . '/vendor/classDiff/class.Diff.php' );
	}
}
add_action( 'bp_include', 'bp_told_init'); 

//Enqueue scripts and styles plus JavaScript translations
function bp_told_enqueue_scripts() {
	if ( isset( $_REQUEST['page'] ) ) {
		$page = $_REQUEST['page'];
		if ( $page != 'bpTold' ) {
			return;
		}
	} else {
		return;
	}
	wp_register_script( 'bp-told-translation', BP_TOLD_URL . '/js/bp-told-admin.js', array('jquery'));
	
	$translation_array = array(
		'bpTemplateOriginal'	=> sanitize_text_field( esc_attr__( 'Latest bp-legacy BuddyPress Template file | ', 'bp-template-overloader' ) ),
		'bpTemplateNouveau'		=> sanitize_text_field( esc_attr__( 'Latest bp-nouveau BuddyPress Template file | ', 'bp-template-overloader' ) ),
		'tioThemeOverload' 		=> sanitize_text_field( esc_attr__( 'Theme Independent Overload in operation', 'bp-template-overloader' ) ),
		'tdoThemeOverload' 		=> sanitize_text_field( esc_attr__( 'Theme Dependent Overload in operation', 'bp-template-overloader' ) ),
		'notOverloaded' 		=> sanitize_text_field( esc_attr__( 'Not overloaded', 'bp-template-overloader' ) ),
		'pluginUrl'				=> plugins_url() . '/bp-template-overloader',
		'migrateToTio'			=> sanitize_text_field( esc_attr__( 'Migration to BP TIO Template Overload for ', 'bp-template-overloader' ) ),
		'migrateToTdo'			=> sanitize_text_field( esc_attr__( 'Migration to BP TDO Template Overload for ', 'bp-template-overloader' ) ),
		'tioEnabled'			=> sanitize_text_field( esc_attr__( 'Creation of BP TIO Template Overload for ', 'bp-template-overloader' ) ),
		'tdoEnabled'			=> sanitize_text_field( esc_attr__( 'Creation of BP TDO Template Overload for ', 'bp-template-overloader' ) ),
		'completed'				=> sanitize_text_field( esc_attr__( ' has been completed', 'bp-template-overloader' ) ),
		'tioDisabled'			=> sanitize_text_field( esc_attr__( 'The BP TIO Template Overload has been disabled, the disable file is located at ', 'bp-template-overloader' ) ),
		'tdoDisabled'			=> sanitize_text_field( esc_attr__( 'The BP TDO Template Overload has been disabled, the disable file is located at ', 'bp-template-overloader' ) ),
		'tioDeleted'			=> sanitize_text_field( esc_attr__( 'The BP TIO Template Overload has been deleted', 'bp-template-overloader' ) ),
		'tdoDeleted'			=> sanitize_text_field( esc_attr__( 'The BP TDO Template Overload has been deleted', 'bp-template-overloader' ) ),
		'restoreTio'			=> sanitize_text_field( esc_attr__( 'Restore of BP TIO Template Overload for ', 'bp-template-overloader' ) ),
		'restoreTdo'			=> sanitize_text_field( esc_attr__( 'Restore of BP TDO Template Overload for ', 'bp-template-overloader' ) ),
		'tioEnableOverload' 	=> sanitize_text_field( esc_attr__( 'Enable Theme Independent Overload', 'bp-template-overloader' ) ),
		'tdoEnableOverload' 	=> sanitize_text_field( esc_attr__( 'Enable Theme Dependent Overload', 'bp-template-overloader' ) ),
		'tioDisableOverload' 	=> sanitize_text_field( esc_attr__( 'Disable Theme Independent Overload', 'bp-template-overloader')),
		'tdoDisableOverload' 	=> sanitize_text_field( esc_attr__( 'Disable Theme Dependent Overload', 'bp-template-overloader')),
		'tioRestoreOverload' 	=> sanitize_text_field( esc_attr__( 'Restore Theme Independent Overload', 'bp-template-overloader' ) ),
		'tdoRestoreOverload' 	=> sanitize_text_field( esc_attr__( 'Restore Theme Dependent Overload', 'bp-template-overloader' ) ),	
		'tioToTdoMigrate' 		=> sanitize_text_field( esc_attr__( 'Migrate TIO to TDO', 'bp-template-overloader')),
		'tdoToTioMigrate' 		=> sanitize_text_field( esc_attr__( 'Migrate TDO to TIO', 'bp-template-overloader')),
		'tioDelete' 			=> sanitize_text_field( esc_attr__( 'Delete Theme Independent Overload', 'bp-template-overloader' ) ),
		'tdoDelete' 			=> sanitize_text_field( esc_attr__( 'Delete Theme Dependent Overload', 'bp-template-overloader' ) ),
		'originalFile' 			=> sanitize_text_field( esc_attr__( 'Original Source File', 'bp-template-overloader' ) ),
		'overloadFile' 			=> sanitize_text_field( esc_attr__( 'Overload File', 'bp-template-overloader' ) ),
		'tioCompare'			=> sanitize_text_field( esc_attr__( 'Compare Theme Independent Overload', 'bp-template-overloader' ) ),
		'tioDisCompare'			=> sanitize_text_field( esc_attr__( 'Compare disabled Theme Independent Overload', 'bp-template-overloader' ) ),
		'tdoCompare'			=> sanitize_text_field( esc_attr__( 'Compare Theme Dependent Overload', 'bp-template-overloader' ) ),
		'tdoDisCompare'			=> sanitize_text_field( esc_attr__( 'Compare disabled Theme Dependent Overload', 'bp-template-overloader' ) )
		);
	
	wp_localize_script( 'bp-told-translation', 'bp_told_translate', $translation_array );
	wp_enqueue_script( 'bp-told-translation');
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bp-template-overloader', BP_TOLD_URL . '/js/bp-told-admin.js', array('jquery'));
	wp_localize_script( 'bp-template-overloader', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php') ) );
	wp_enqueue_script( 'fancybox', BP_TOLD_URL . '/vendor/fancybox/jquery.fancybox.min.js', array('jquery'), '3.2.10');
//	wp_enqueue_style( 'bp-told-admin-style', BP_TOLD_URL . '/css/bp-told-admin.css');
}

add_action( 'admin_enqueue_scripts', 'bp_told_enqueue_scripts');



// Localization
function bp_told_localization() {

load_plugin_textdomain('bp-template-overloader', false, dirname(plugin_basename( __FILE__ ) ).'/langs/' );
}
 
add_action('init', 'bp_told_localization');

//Check for template directories and create if missing
function bp_told_check_templates_location() {

	$content_dir = WP_CONTENT_DIR;
	
	if ( ! file_exists( $content_dir . '/bp-template-overloads/' ) ) {
		wp_mkdir_p( $content_dir . '/bp-template-overloads/' );
	}
	if ( ! file_exists( $content_dir . '/bp-template-overloads/bp-legacy/' ) ) {
		wp_mkdir_p( $content_dir . '/bp-template-overloads/bp-legacy/' );
	}	
	if ( ! file_exists( $content_dir . '/bp-template-overloads/bp-nouveau/' ) ) {
		wp_mkdir_p( $content_dir . '/bp-template-overloads/bp-nouveau/' );
	}	
}
add_action( 'init','bp_told_check_templates_location' );

// Create Tools and review links
function bp_told_add_action_links( $links ) {
	$review_link = '<a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/bp-template-overloader?filter=5#pages" title="' . esc_attr(__('If you like it, please review the plugin', 'BP-Template-Overloader')) . '">' . esc_attr(__('Review the plugin', 'BP-Template-Overloader')) . '</a>';
	$url = get_admin_url(null, 'tools.php?page=bpTold');
 
	$links[] = '<a href="'. $url .'">'.esc_attr(__('Configure','BP-Template-Overloader')).'</a>';
	$links[] = $review_link;
	return $links;

}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'bp_told_add_action_links' );
