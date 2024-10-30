<?php
/*
* @package bp-Template-Overloader
*/

if(!defined('ABSPATH')) {
	exit;
}

//AJAX TIO Enable
function bp_told_tio_enable() {
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$source = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-legacy/buddypress/' . $path . '.php';
	$dest = BP_TOLD_TEMPLATE_DIR . $path . '-tol.php';
	$dest_dir = substr( $dest, 0, strrpos($dest, '/') + 1 ); 
	
	if ( !file_exists($dest_dir ) ) {
		mkdir( $dest_dir, 0777, true );
	}

	copy($source,$dest);
	
	if ( file_exists( $dest ) ) {
			echo $dest;
	} else {
		echo 'Failed ' . $dest . ' ' . $source . ' ' . $dest_dir;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tio_enable', 'bp_told_tio_enable');

//AJAX TIO Disable
function bp_told_tio_disable(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$source = BP_TOLD_TEMPLATE_DIR . $path . '-tol.php';
	$dest = BP_TOLD_TEMPLATE_DIR . $path . '-dis.php';
	$style_dir = get_stylesheet_directory();
	$tdo_dis_path = $style_dir . '/buddypress/' . $path . '-dis.php';
	
	if(file_exists( $tdo_dis_path ) ) {
		$tdo_path=$tdo_dis_path;
	} else {
		$tdo_path='None';
	}

	if(file_exists( $source ) ) {
		rename( $source,$dest );
	}
	
	if ( file_exists( $dest ) ) {
		$tio_path = $dest;
	} else {
		$tio_path = 'Failed ' . $dest . ' ' . $source ;
	}

	$response = array( $tdo_path,$tio_path);
	$response=json_encode($response);
	echo $response;

	die();
}

add_action( 'wp_ajax_bp_told_tio_disable', 'bp_told_tio_disable');

//AJAX TIO Restore
function bp_told_tio_restore(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$dest = BP_TOLD_TEMPLATE_DIR . $path . '-tol.php';
	$source = BP_TOLD_TEMPLATE_DIR . $path . '-dis.php';
	
	if(file_exists($source) ) {
		rename( $source,$dest );
	}
	
	if ( file_exists( $dest ) ) {
			echo $dest;
	} else {
		echo 'Failed ' . $dest . ' ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tio_restore', 'bp_told_tio_restore');

// AJAX TIO Delete
function bp_told_tio_delete(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$dest = BP_TOLD_TEMPLATE_DIR . $path . '-dis.php';
	
	if(file_exists($dest) ) {
		unlink($dest);
	}
	
	if ( ! file_exists( $dest ) ) {
			echo $dest;
	} else {
		echo 'Failed ' . $dest ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tio_delete', 'bp_told_tio_delete');

//AJAX TDO Enable
function bp_told_tdo_enable() {
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$source = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-legacy/buddypress/' . $path . '.php';
	$style_dir = get_stylesheet_directory();	
	$dest = $style_dir . '/buddypress/' . $path . '.php';
	$dest_dir = substr( $dest, 0, strrpos($dest, '/') + 1 ); 
	
	if ( !file_exists($dest_dir ) ) {
		mkdir( $dest_dir, 0777, true );
	}

	copy($source,$dest);
	
	if ( file_exists( $dest ) ) {
			echo $dest;
	} else {
		echo 'Failed ' . $dest . ' ' . $source . ' ' . $dest_dir;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tdo_enable', 'bp_told_tdo_enable');

// AJAX TDO Disable
function bp_told_tdo_disable(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$style_dir = get_stylesheet_directory();	
	$source = $style_dir . '/buddypress/' . $path . '.php';
	$tio_dis_path = BP_TOLD_TEMPLATE_DIR . $path . '-dis.php';
	$dest = $style_dir . '/buddypress/' . $path . '-dis.php';
	
	if(file_exists( $tio_dis_path ) ) {
		$tio_path=$tio_dis_path;
	} else {
		$tio_path='None';
	}

	if(file_exists( $source ) ) {
		rename($source,$dest);
	}
	
	if ( file_exists( $dest ) ) {
		$tdo_dis = $dest;
	} else {
		$tdo_dis = 'Failed ' . $dest . ' ' . $source ;
	}
	
	$response = array($tio_path,$tdo_dis);
	$response=json_encode($response);
	echo $response;
	
	die();
}

add_action( 'wp_ajax_bp_told_tdo_disable', 'bp_told_tdo_disable');

// AJAX TDO Restore
function bp_told_tdo_restore(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$style_dir = get_stylesheet_directory();	
	$dest = $style_dir . '/buddypress/' . $path . '.php';
	$source = $style_dir . '/buddypress/' . $path . '-dis.php';
	
	if(file_exists( $source ) ) {
		rename($source,$dest);
	}
	
	if ( file_exists( $dest ) ) {
			echo $dest;
	} else {
		echo 'Failed ' . $dest . ' ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tdo_restore', 'bp_told_tdo_restore');

// AJAX Delete disabled TDO 
function bp_told_tdo_delete(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$style_dir = get_stylesheet_directory();	
	$dest = $style_dir . '/buddypress/' . $path . '-dis.php';
	
	IF ( file_exists( $dest ) ) {
		unlink($dest);
	}
	
	if ( !file_exists( $dest ) ) {
			echo $dest;
	} else {
		echo 'Failed ' . $dest ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tdo_delete', 'bp_told_tdo_delete');

//AJAX TIO to TDO migration
function bp_told_tio_to_tdo() {
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$source = BP_TOLD_TEMPLATE_DIR . $path . '-tol.php';
	$style_dir = get_stylesheet_directory();	
	$dest = $style_dir . '/buddypress/' . $path . '.php';
	$dest_dir = substr( $dest, 0, strrpos($dest, '/') + 1 ); 
	
	if ( !file_exists($dest_dir ) ) {
		mkdir( $dest_dir, 0777, true );
	}

	if ( file_exists( $source ) ) {
		rename($source,$dest);
	}

	if ( file_exists( $dest ) ) {
			echo $dest;
	} else {
		echo 'Failed ' . $dest . ' ' . $source . ' ' . $dest_dir;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tio_to_tdo', 'bp_told_tio_to_tdo');

// Ajax TDO to TIO Migration
function bp_told_tdo_to_tio(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$style_dir = get_stylesheet_directory();	
	$source = $style_dir . '/buddypress/' . $path . '.php';
	$dest = BP_TOLD_TEMPLATE_DIR . $path . '-tol.php';
	
	if(file_exists( $source ) ) {
		rename($source,$dest);
	}
	
	if ( file_exists( $dest ) ) {
			echo $dest;
	} else {
		echo 'Failed ' . $dest . ' ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tdo_to_tio', 'bp_told_tdo_to_tio');

// Ajax TIO Compare
function bp_told_tio_compare(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$source = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-legacy/buddypress/' . $path . '.php';
	$dest = BP_TOLD_TEMPLATE_DIR . $path . '-tol.php';
	
	if( file_exists( $source ) && file_exists( $dest ) ) {
		echo bpToldDiff::toTable(bpToldDiff::compareFiles( $source, $dest ));
	} else {
		echo 'Failed ' . $dest . ' ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tio_compare', 'bp_told_tio_compare');

// Ajax TDO Compare
function bp_told_tdo_compare(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$source = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-legacy/buddypress/' . $path . '.php';
	$style_dir = get_stylesheet_directory();	
	$dest = $style_dir . '/buddypress/' . $path . '.php';
	
	if( file_exists( $source ) && file_exists( $dest ) ) {
		echo bpToldDiff::toTable(bpToldDiff::compareFiles( $source, $dest ));
	} else {
		echo 'Failed ' . $dest . ' ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tdo_compare', 'bp_told_tdo_compare');

// Ajax TIO Disabled Compare
function bp_told_tio_dis_compare(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$source = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-legacy/buddypress/' . $path . '.php';
	$dest = BP_TOLD_TEMPLATE_DIR . $path . '-dis.php';
	
	if( file_exists( $source ) && file_exists( $dest ) ) {
		$tio_compare = bpToldDiff::toTable(bpToldDiff::compareFiles( $source, $dest ));
		$response = array($dest,$tio_compare);
		$response=json_encode($response);
		echo $response;
		} else {
		echo 'Failed ' . $dest . ' ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tio_dis_compare', 'bp_told_tio_dis_compare');

// Ajax TDO Disabled Compare
function bp_told_tdo_dis_compare(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$source = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-legacy/buddypress/' . $path . '.php';
	$style_dir = get_stylesheet_directory();	
	$dest = $style_dir . '/buddypress/' . $path . '-dis.php';
	
	if( file_exists( $source ) && file_exists( $dest ) ) {
		$tdo_compare = bpToldDiff::toTable(bpToldDiff::compareFiles( $source, $dest ));
		$response = array($dest,$tdo_compare);
		$response=json_encode($response);
		echo $response;
		} else {
		echo 'Failed ' . $dest . ' ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tdo_dis_compare', 'bp_told_tdo_dis_compare');

// Ajax TNO View
function bp_told_tno_view(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	
	$source = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-legacy/buddypress/' . $path . '.php';
	
	if( file_exists( $source ) ) {
		$tno_view = file_get_contents($source);
		$tno_view = nl2br(htmlentities($tno_view));
		$response = array($source,$tno_view);
		$response=json_encode($response);
		echo $response;
	} else {
		echo 'Failed ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tno_view', 'bp_told_tno_view');

// Ajax TNO Nouveau Compare
function bp_told_tno_nou_compare(){
	
	if ( !wp_verify_nonce( $_POST['security'], 'told-nonce' ) ) {
		die('Nonce check failed, Nonce: ' . $_POST['security']);
	}
	$path = $_POST['path'];
	$path = sanitize_text_field( $path );
	$source = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-legacy/buddypress/' . $path . '.php';
	$dest = WP_PLUGIN_DIR . '/buddypress/bp-templates/bp-nouveau/buddypress/' . $path . '.php';
	
	if( file_exists( $source ) && file_exists( $dest ) ) {
		$compare =  bpToldDiff::toTable(bpToldDiff::compareFiles( $source, $dest ));
		$response = array($dest,$compare);
		$response=json_encode($response);
		echo $response;
	} else {
		echo 'Failed ' . $dest . ' ' . $source ;
	}
	die();
}

add_action( 'wp_ajax_bp_told_tno_nou_compare', 'bp_told_tno_nou_compare');