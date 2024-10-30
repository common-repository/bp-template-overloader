<?php
/*
*
* @package bp-Template-Overloader
*
*/

if(!defined('ABSPATH')) {
	exit;
}

// Todo: Add bp-custom.php checkdate
// Todo: Add css overload


//Set up tools Submenu Page
function bp_told_tools_menu() {
	global $starter_plugin_admin_page;
	$title = sanitize_text_field(_x('BP Template Overloader','bp-Template-Overloader'));
	
	$starter_plugin_admin_page = add_submenu_page ('tools.php', $title, $title, 'manage_options', 'bpTold', 'bp_told_admin_screen');
}

add_action('admin_menu', 'bp_told_tools_menu');

// Output overload array
function bp_told_admin_screen() {

	$templates_nouveau = array(
	'Activity Single Home'								=> 'activity/single/home',
	'Activity Loop' 									=> 'activity/activity-loop',
	'Activity Comment Form'								=> 'activity/comment-form',
	'Activity Comment' 									=> 'activity/comment',
	'Activity Entry' 									=> 'activity/entry',
	'Activity Index' 									=> 'activity/index',
	'Activity Post Form' 								=> 'activity/post-form',
	'Activity Widget'									=> 'activity/widget',
	'Assets Attachments Avatars Camera'					=> 'assets/_attachments/avatars/camera',
	'Assets Attachments Avatars Crop'					=> 'assets/_attachments/avatars/crop',
	'Assets Attachments Avatars Index'					=> 'assets/_attachments/avatars/index',
	'Assets Attachments Cover Images Index'				=> 'assets/_attachments/cover-images/index',
	'Assets Attachments Uploader'						=> 'assets/_attachments/uploader',
	'Assets Emails Single bp Email'						=> 'assets/emails/single-bp-email',
	'Assets Embeds Activity'							=> 'assets/embeds/activity',
	'Assets Embeds Footer'								=> 'assets/embeds/footer',
	'Assets Embeds Header Activity'						=> 'assets/embeds/header-activity',
	'Blogs Loop' 										=> 'blogs/blogs-loop',
	'Blogs Create' 										=> 'blogs/create',
	'Blogs Index' 										=> 'blogs/index',
	'Common Filters Directory Filters'					=> 'common/filters/directory-filters',
	'Common Filters Groups Screens Filters'				=> 'common/filters/groups-screens-filters',
	'Common Filters User Screens Filters'				=> 'common/filters/user-screens-filters',
	'Common js Templates Activity Form'					=> 'common/js-templates/activity/form',
	'Common js Templates Invites Index'					=> 'common/js-templates/invites/index',
	'Common js Templates Messages Index'				=> 'common/js-templates/messages/index',
	'Common Nav Directory Nav'							=> 'common/nav/directory-nav',
	'Common Notices Template Notices'					=> 'common/notices/template-notices',
	'Common Search Form'								=> 'common/search/search-form',
	'Common Search and Filters Bar'						=> 'common/search-and-filters-bar',
	'Groups Single Admin Delete Group'					=> 'groups/single/admin/delete-group',
	'Groups Single Admin Edit Details'					=> 'groups/single/admin/edit-details',
	'Groups Single Admin Group Avatar'					=> 'groups/single/admin/group-avatar',
	'Groups Single Admin Cover Image'					=> 'groups/single/admin/group-cover-image',
	'Groups Single Admin Group Settings'				=> 'groups/single/admin/group-settings',
	'Groups Single Admin Manage Members'				=> 'groups/single/admin/manage-members',
	'Groups Single Admin Membership Requests'			=> 'groups/single/admin/membership-requests',
	'Groups Single Parts Admin Subnav'					=> 'groups/single/parts/admin-subnav',
	'Groups Single Parts Header Item Actions'			=> 'groups/single/parts/header-item-actions',
	'Groups Single Parts Item Nav'						=> 'groups/single/parts/item-nav',
	'Groups Single Activity' 							=> 'groups/single/activity',
	'Groups Single Admin' 								=> 'groups/single/admin',
	'Groups Single Cover Image Header'					=> 'groups/single/cover-image-header',
	'Groups Single Default Front'						=> 'groups/single/default-front',
	'Groups Single Group Header' 						=> 'groups/single/group-header',
	'Groups Single Home' 								=> 'groups/single/home',
	'Groups Single Members Loop'						=> 'groups/single/members-loop',
	'Groups Single Members' 							=> 'groups/single/members',
	'Groups Single Plugins' 							=> 'groups/single/plugins',
	'Groups Single Request Membership' 					=> 'groups/single/request-membership',
	'Groups Single Requests Loop'						=> 'groups/single/requests-loop',
	'Groups Single Send Invites' 						=> 'groups/single/send-invites',
	'Groups Create' 									=> 'groups/create',
	'Groups Loop' 										=> 'groups/groups-loop',
	'Groups Index' 										=> 'groups/index',
	'Members Single Friends Requests' 					=> 'members/single/friends/requests',
	'Members Single Groups Invites' 					=> 'members/single/groups/invites',
	'Members Single Notifications Loop' 				=> 'members/single/notifications/notifications-loop',
	'Members Single Parts Item Nav'						=> 'members/single/parts/item-nav',
	'Members Single Parts Item Subnav'					=> 'members/single/parts/item-subnav',
	'Members Single Parts Profile Visibility'			=> 'members/single/parts/profile-visibility',
	'Members Single Profile Change Avatar' 				=> 'members/single/profile/change-avatar',
	'Members Single Profile Change Cover Image'			=> 'members/single/profile/change-cover-image',
	'Members Single Profile Edit' 						=> 'members/single/profile/edit',
	'Members Single Profile Loop' 						=> 'members/single/profile/profile-loop',
	'Members Single Profile WP' 						=> 'members/single/profile/profile-wp',
	'Members Single Settings Capabilities' 				=> 'members/single/settings/capabilities',
	'Members Single Settings Delete Account' 			=> 'members/single/settings/delete-account',
	'Members Single Settings General' 					=> 'members/single/settings/general',
	'Members Single Settings Group Invites'				=> 'members/single/settings/group-invites',
	'Members Single Settings Notifications' 			=> 'members/single/settings/notifications',
	'Members Single Settings Profile' 					=> 'members/single/settings/profile',
	'Members Single Activity' 							=> 'members/single/activity',
	'Members Single Blogs' 								=> 'members/single/blogs',
	'Members Single Cover Image Header' 				=> 'members/single/cover-image-header',
	'Members Single Default-front.php'					=> 'members/single/default-front',
	'Members Single Friends' 							=> 'members/single/friends',
	'Members Single Groups' 							=> 'members/single/groups',
	'Members Single Home' 								=> 'members/single/home',
	'Members Single Member Header' 						=> 'members/single/member-header',
	'Members Single Messages' 							=> 'members/single/messages',
	'Members Single Notifications' 						=> 'members/single/notifications',
	'Members Single Plugins' 							=> 'members/single/plugins',
	'Members Single Profile' 							=> 'members/single/profile',
	'Members Single Settings' 							=> 'members/single/settings',
	'Members Activate'									=> 'members/activate',
	'Members Loop' 										=> 'members/members-loop',
	'Members Index' 									=> 'members/index',
	'Members Register'									=> 'members/register'
	);

	$templates_legacy = array(
	'activity/single/home.php Activity Home Page'														=> 'activity/single/home',
	'activity/activity-loop.php The main Activity Loop'													=> 'activity/activity-loop',
	'activity/comment.php Activity Comments page'														=> 'activity/comment',
	'activity/entry.php Used by Activity Loop to display each activity' 								=> 'activity/entry',
	'activity/index.php Creates the structure of the activity page'										=> 'activity/index',
	'activity/post-form.php Creates new activity post form'												=> 'activity/post-form',
	'assets/attachments/avatars/camera.php The webcam backbone views'									=> 'assets/_attachments/avatars/camera',
	'assets/attachments/avatars/crop.php Avatar crop page content'										=> 'assets/_attachments/avatars/crop',
	'assets/attachments/avatars/index.php Creates the BP backbone views for avatars'					=> 'assets/_attachments/avatars/index',
	'assets/attachments/cover-images/index.php Used to inject cover-image backbone views'				=> 'assets/_attachments/cover-images/index',
	'assets/attachments/uploader.php Creates uploader Backbone views'									=> 'assets/_attachments/uploader',
	'assets/emails/single-bp-email.php Single email template'											=> 'assets/emails/single-bp-email',
	'assets/embeds/activity.php Used for Media Embeds'													=> 'assets/embeds/activity',
	'assets/embeds/footer.php Embeds footer'															=> 'assets/embeds/footer',
	'assets/embeds/header-activity.php Header for Activity Embeds'										=> 'assets/embeds/header-activity',
	'assets/embeds/header.php'																			=> 'assets/embeds/header',
	'blogs/blogs-loop.php Multisite blog listing loop'	 												=> 'blogs/blogs-loop',
	'blogs/create.php Create page for multisite blogs' 													=> 'blogs/create',
	'blogs/index.php Blogs index page' 																	=> 'blogs/index',
	'common/dir-search-form.php Search form'															=> 'common/search/dir-search-form',
	'groups/single/admin/delete-group.php Group admin delete group page'								=> 'groups/single/admin/delete-group',
	'groups/single/admin/edit-details.php Group admin edit group details page'							=> 'groups/single/admin/edit-details',
	'groups/single/admin/group-avatar.php Group avatar admin page'										=> 'groups/single/admin/group-avatar',
	'groups/single/admin/group-cover-image.php Group cover image admin page'							=> 'groups/single/admin/group-cover-image',
	'groups/single/admin/group-settings.php Group settings admin page'									=> 'groups/single/admin/group-settings',
	'groups/single/admin/manage-members.php Group admin manage members page'							=> 'groups/single/admin/manage-members',
	'groups/single/admin/membership-requests.php Manage membership requests page'						=> 'groups/single/admin/membership-requests',
	'groups/single/activity.php Group Activity page'			 										=> 'groups/single/activity',
	'groups/single/admin.php Group admin/settings page'		 											=> 'groups/single/admin',
	'groups/single/cover-image-header.php Group cover image header'										=> 'groups/single/cover-image-header',
	'groups/single/group-header Group header used when cover images are disabled'						=> 'groups/single/group-header',
	'groups/single/home.php Group home page'				 											=> 'groups/single/home',
	'groups/single/invite-loop.php Group invites loop'													=> 'groups/single/invites-loop',
	'groups/single/members Group members page'					 										=> 'groups/single/members',
	'groups/single/plugins.php Displays group extensions content' 										=> 'groups/single/plugins',
	'groups/single/request-membership.php Group request membership page' 								=> 'groups/single/request-membership',
	'groups/single/requests-loop.php Group membership requests loop'									=> 'groups/single/requests-loop',
	'groups/single/send-invites.php Group send invites page'		 									=> 'groups/single/send-invites',
	'groups/create.php Create group page'				 												=> 'groups/create',
	'groups/groups-loop.php Main loop used for displaying group list'									=> 'groups/groups-loop',
	'groups/index.php Groups page index file'		 													=> 'groups/index',
	'members/single/friends-requests.php Friends requests page'			 								=> 'members/single/friends/requests',
	'members/single/groups-invites.php Members group invites page'		 								=> 'members/single/groups/invites',
	'members/single/messages/compose.php Compose email page'			 								=> 'members/single/messages/compose',
	'members/single/messages/message.php Members message page'											=> 'members/single/messages/message',
	'members/single/messages/messages-loop.php Loop to list all messages'	 							=> 'members/single/messages/messages-loop',
	'members/single/messages/notices-loop.php Displays members notices'		 							=> 'members/single/messages/notices-loop',
	'members/single/messages/single.php Single message content'		 									=> 'members/single/messages/single',
	'members/single/notifications/feedback-no-notifications.php used when there are no notifications' 	=> 'members/single/notifications/feedback-no-notifications',
	'members/single/notifications/notifications-loop.php Displays notifications list'	 				=> 'members/single/notifications/notifications-loop',
	'members/single/notifications/read.php Read notifications page'						 				=> 'members/single/notifications/read',
	'members/single/notifications/unread.php Unread notifications page'					 				=> 'members/single/notifications/unread',
	'members/single/profile/change-avatar.php Members change avatar page'				 				=> 'members/single/profile/change-avatar',
	'members/single/profile/change-cover-Image.php Members change profile cover image page'				=> 'members/single/profile/change-cover-image',
	'members/single/profile/edit.php Members edit profile page'					 						=> 'members/single/profile/edit',
	'members/single/profile/profile-Loop.php Members profile loop - displays profile fields'			=> 'members/single/profile/profile-loop',
	'members/single/profile/profile-wp.php Fires before the members profile loop' 						=> 'members/single/profile/profile-wp',
	'members/single/settings/capabilities.php Capabilities for members settings'		 				=> 'members/single/settings/capabilities',
	'members/single/settings/delete-account.php Members delete account page'				 			=> 'members/single/settings/delete-account',
	'members/single/settings/general.php General settings, includes change password' 					=> 'members/single/settings/general',
	'members/single/settings/notifications.php Notifications settings for members'			 			=> 'members/single/settings/notifications',
	'members/single/settings/profile.php Xprofile settings'							 					=> 'members/single/settings/profile',
	'members/single/activity.php Profile activity page'						 							=> 'members/single/activity',
	'members/single/blogs.php Members blogs page (multisite)'			 								=> 'members/single/blogs',
	'members/single/cover-image-header.php Profile header where cover images are used'	 				=> 'members/single/cover-image-header',
	'members/single/friends.php Members profile friends page'				 							=> 'members/single/friends',
	'members/single/groups.php Members profile groups page'					 							=> 'members/single/groups',
	'members/single/home.php Profile home page' 														=> 'members/single/home',
	'members/single/member-header.php Profile header content when cover images are disabled'			=> 'members/single/member-header',
	'members/single/messages.php Members messages'							 							=> 'members/single/messages',
	'members/single/notifications.php Profile notifications page'				 						=> 'members/single/notifications',
	'members/single/plugins.php Used for plugins using the BuddyPress extension'						=> 'members/single/plugins',
	'members/single/profile.php Members profile page'						 							=> 'members/single/profile',
	'members/single/settings.php Members settings page'						 							=> 'members/single/settings',
	'members/activate.php - Membership activation'														=> 'members/activate',
	'members/members-loop.php Members loop, displays member list' 										=> 'members/members-loop',
	'members/index.php Index for Members pages'						 									=> 'members/index',
	'members/register.php Registration page'															=> 'members/register'
	);

	$style_dir = get_stylesheet_directory();	
	$style_url = get_stylesheet_directory_uri();
	$plugins_url = WP_PLUGIN_URL;
	$plugins_path = WP_PLUGIN_DIR . '/';

	$leg_path = '/buddypress/bp-templates/bp-legacy/buddypress/';
	$nou_path = '/buddypress/bp-templates/bp-nouveau/buddypress/';
	
	$tio_class = 'tio-enable';
	$tdo_class = 'tdo-enable';
	$tio_disable_class = 'tio-disable';
	$tdo_disable_class = 'tdo-disable';
	$tio_restore_class = 'tio-restore';
	$tdo_restore_class = 'tdo-restore';
	$tio_to_tdo_migrate_class = 'tio-to-tdo';
	$tdo_to_tio_migrate_class = 'tdo-to-tio';
	$tio_delete_class = 'tio-delete';
	$tdo_delete_class = 'tdo-delete';
	$tio_compare_class = 'tio-comp';
	$tio_dis_compare_class = 'tio-dis-comp';
	$tdo_compare_class = 'tdo-comp';
	$tdo_dis_compare_class = 'tdo-dis-comp';
	$tno_view_class = 'tno-view';
	$tno_nou_comp_class = 'tno-nou-comp';
	
	$tio_compare_id = 'tio-compare';
	$tdo_compare_id = 'tdo-compare';

	$date_id = '-Date';
	$status_id = '-Status';
	$option_id = 'Option';
	$path = '-File';
	$row_id = '-row';
	$file_path_id = '-filePath';
	$tio_buttons_id = '-tioButtons';
	$tio_button_id = '-tioButton';
	$tio_to_tdo_button_id = '-tioToTdo';
	$tdo_buttons_id = '-tdoButtons';
	$tdo_button_id = '-tdoButton';
	$tdo_to_tio_button_id ='-tdoToTio';
	$tio_compare_button_id = '-tioCompButton';
	$tdo_compare_button_id = '-tdoCompButton';
	$tno_view_button_id = '-tnoViewButton';
	$tno_nou_comp_button_id = '-tnoNouCompButton';
	
	$tio_theme_overload = sanitize_text_field( esc_attr__( 'Theme Independent Overload in operation', 'bp-template-overloader' ) );
	$tdo_theme_overload = sanitize_text_field( esc_attr__( 'Theme Dependent Overload in operation', 'bp-Template-Overloader' ) );
	$tio_enable_overload = sanitize_text_field( esc_attr__( 'Enable Theme Independent Overload', 'bp-template-overloader' ) );
	$tdo_enable_overload = sanitize_text_field( esc_attr__( 'Enable Theme Dependent Overload', 'bp-Template-Overloader' ) );
	$tio_disable_overload = sanitize_text_field( esc_attr__( 'Disable Theme Independent Overload', 'bp-Template-Overloader'));
	$tdo_disable_overload = sanitize_text_field( esc_attr__( 'Disable Theme Dependent Overload', 'bp-Template-Overloader'));
	$tio_restore_overload = sanitize_text_field( esc_attr__( 'Restore Theme Independent Overload', 'bp-template-overloader' ) );
	$tdo_restore_overload = sanitize_text_field( esc_attr__( 'Restore Theme dependent overload in operation', 'bp-Template-Overloader' ) );	
	$tio_to_tdo_migrate = sanitize_text_field( esc_attr__( 'Migrate TIO to TDO', 'bp-Template-Overloader'));	
	$tdo_to_tio_migrate = sanitize_text_field( esc_attr__( 'Migrate TDO to TIO', 'bp-Template-Overloader'));
	$tio_delete = sanitize_text_field( esc_attr__( 'Delete Theme Independent Overload', 'bp-template-overloader' ) );
	$tdo_delete = sanitize_text_field( esc_attr__( 'Delete Theme Dependent Overload', 'bp-Template-Overloader' ) );
	$tio_compare = sanitize_text_field( esc_attr__( 'Compare Theme Independent Overload', 'bp-template-overloader' ) );
	$tio_dis_compare = sanitize_text_field( esc_attr__( 'Compare disabled Theme Independent Overload', 'bp-Template-Overloader' ) );
	$tdo_compare = sanitize_text_field( esc_attr__( 'Compare Theme Dependent Overload', 'bp-template-overloader' ) );
	$tdo_dis_compare = sanitize_text_field( esc_attr__( 'Compare disabled Theme Dependent Overload', 'bp-Template-Overloader' ) );
	$tno_view = sanitize_text_field( esc_attr__( 'View current BuddyPress source template file', 'bp-Template-Overloader' ) );
	$tno_nou_comp = sanitize_text_field( esc_attr__( 'Compare bp-legacy file with bp-nouveau file', 'bp-Template-Overloader' ) );
	$buddy_version = sanitize_text_field( esc_attr__( 'Current BP Version: ', 'bp-Template-Overloader') );
	
	$not_overloaded = sanitize_text_field( esc_attr__( 'Not overloaded', 'bp-Template-Overloader' ) );
	$option_header = sanitize_text_field( esc_attr__( 'Template Function', 'bp-Template-Overloader' ) ) ;
	$status_header = sanitize_text_field( esc_attr__( 'Overload Status', 'bp-Template-Overloader' ) ) ;
	$filepath_header = sanitize_text_field( esc_attr__( 'Active Template File Path', 'bp-Template-Overloader' ) ) ;
	$date_header = sanitize_text_field( esc_attr__( 'Modified Date', 'bp-Template-Overloader' ) ) ;
	$tio_header = sanitize_text_field( esc_attr__( 'TIO Options', 'bp-Template-Overloader' ) ) ;
	$tdo_header = sanitize_text_field( esc_attr__( 'TDO Options', 'bp-Template-Overloader' ) ) ;
	$told_title = sanitize_text_field( esc_attr__( 'BP Template Overloader', 'bp-Template-Overloader' ) ) ;
	$told_templates = sanitize_text_field( esc_attr__( 'Template Status', 'bp-Template-Overloader' ) ) ;
	$using_told = sanitize_text_field( esc_attr__( 'Using Template Overloader', 'bp-Template-Overloader' ) ) ;
	$active = sanitize_text_field( esc_attr__( ' | Active Theme: ', 'bp-Template-Overloader' ) ) ;

	//Text for Using BP TOLD tab
	$using_intro = sanitize_text_field( esc_attr__( ' is a tool to help you manage your BuddyPress template overloads. You can see the overload status of every BP template file, enable overloads and compare your overload with the BP master file. Any existing overloads will be identified and their status shown.', 'bp-Template-Overloader') );
	$overload_explain = sanitize_text_field( esc_attr__( 'Template Overloading is a mechanism enabled in BuddyPress where default theme files that are used to create various BuddyPress pages can be overloaded, where an alternative file located in a specific directory is loaded instead of the default file. This enables a high degree of customization. Normally you would copy the file you want to overload into a specific directory and then edit it, adding your custom code.', 'bp-Template-Overloader' ) ) ;
	$tdo_explain = sanitize_text_field( esc_attr__( 'TDO - Template Dependent Overload, this is where the template is overloaded in the traditional way, the overload file is stored in your child theme directory.', 'bp-Template-Overloader') );
	$tio_explain = sanitize_text_field( esc_attr__( 'TIO - Template Independent Overload, this is where the template is overloaded in a none theme specific way, the overload file is stored in the wp-content/bp-template-overloads directory and it has a filename of template-overload-filename-tol.php.', 'bp-Template-Overloader' ) );
	$using_two = sanitize_text_field( esc_attr__( 'If you have no template overloads installed, the Template Status will show as not overloaded and you will see buttons to enable the TIO or TDO.', 'bp-Template-Overloader') );
	$view_intro = sanitize_text_field( esc_attr__( ' Every template file, whether it is overloaded or not has a View button, this allows you to view the contents of the BuddyPress master file, this should help you decide which files need to be overloaded.', 'bp-Template-Overloader') );
	$view_button = sanitize_text_field( esc_attr__( 'View Button', 'bp-Template-Overloader' ) ) ;
	$enable_intro = sanitize_text_field( esc_attr__( ' The enable button is shown when there is no template overload, or disabled template overload file existing in the overload directories. Pressing the enable button will copy the template master file from the BuddyPress plugin directory to the overload directory of your choice (either the theme directory for a TDO or the Template Overloads directory for a TDO). Once you have enabled the overload you will then need to edit this file and add your template overload script. Due to the potential for total site outage via typos in your script it\'s not appropriate for Template Overloader to provide the ability to edit these files direct.', 'bp-Template-Overloader') );
	$enable_button = sanitize_text_field( esc_attr__( 'Enable Button', 'bp-Template-Overloader' ) ) ;
	$disable_intro = sanitize_text_field( esc_attr__( ' Where an active template overload is in place a Disable button is shown. Clicking this button will rename the template overload file (filename-dis.php) thus removing it from being loaded.', 'bp-Template-Overloader') );
	$disable_button = sanitize_text_field( esc_attr__( 'Disable Button', 'bp-Template-Overloader' ) ) ;
	$migrate_intro = sanitize_text_field( esc_attr__( ' For templates that have an active overload you can choose to migrate the overload between overload types. So if you have a TDO in place you can easily make this a TIO or vice versa. The process of migration will move the overload files between overload directories.', 'bp-Template-Overloader') );
	$migrate_button = sanitize_text_field( esc_attr__( 'Migrate Button', 'bp-Template-Overloader' ) ) ;
	$delete_intro = sanitize_text_field( esc_attr__( ' Once a template overload has been Disabled you can choose to Delete it. This will delete the disabled overload file.', 'bp-Template-Overloader') );
	$delete_button = sanitize_text_field( esc_attr__( 'Delete Button', 'bp-Template-Overloader' ) ) ;
	$restore_intro = sanitize_text_field( esc_attr__( ' The restore button will restore the disabled template overload for a given template file type. The overload file is renamed by removing the -dis extension, in the case of a TIO a new -tol extension is added', 'bp-Template-Overloader') );
	$restore_button = sanitize_text_field( esc_attr__( 'Restore Button', 'bp-Template-Overloader' ) ) ;
	$compare_intro = sanitize_text_field( esc_attr__( 'One of the potential pitfalls of using template overloads is that future updates to the BuddyPress master templates will be ignored so it is important to periodically compare the latest version of the master file with your overload file. To make this task easier, BP Template Overloader has a compare button which displays the two files side by side and highlights any differences between the two.', 'bp-Template-Overloader') );
	$compare_button = sanitize_text_field( esc_attr__( 'Overload Compare Button', 'bp-Template-Overloader' ) ) ;
	$other_info = sanitize_text_field( esc_attr__( 'If you choose to try BP Template Overloader and decide it\'s not for you, when you delete the plugin it will delete the wp-content/bp-template-overloads directory and it\'s contents, but any overloads in your theme directory will be left intact in the theme/buddypress directory. These will stay active.', 'bp-Template-Overloader' ) ) ;
	$nouveau_comp = sanitize_text_field( esc_attr__( ' Once the BuddyPress Nouveau theme is launched, if you have not migrated to Nouveau a compare button will appear, this will allow you to compare BP-Legacy master file with the BP-Nouveau master file to help you understand what has changed. Note that not all BP-Legacy theme files have a Nouveau equivalent and vice versa.', 'bp-Template-Overloader' ) ) ;
	$nouveau_comp2 = sanitize_text_field( esc_attr__( ' If you have not migrated to Nouveau a compare button will appear, this will allow you to compare BP-Legacy master file with the BP-Nouveau master file to help you understand what has changed. Note that not all BP-Legacy theme files have a Nouveau equivalent and vice versa.', 'bp-Template-Overloader' ) ) ;
	$nou_comp_button = sanitize_text_field( esc_attr__( 'Nouveau Compare Button', 'bp-Template-Overloader' ) ) ;
	
	$buddy_feed = sanitize_text_field(__( 'BuddyPress User Feed', 'bp-Template-Overloader' ));
	$Buddy_news = sanitize_text_field( esc_attr__( 'Connect with BuddyPress User for news and reviews on BuddyPress', 'bp-Template-Overloader' ) );
	$buddy_reviews = sanitize_text_field( esc_attr__( '* Reviews of all the major and emerging BuddyPress Plugins.', 'bp-Template-Overloader' ) );
	$buddy_help = sanitize_text_field( esc_attr__( '* Help and advice for running your BuddyPress solution.', 'bp-Template-Overloader' ) );
	$buddy_plugins = sanitize_text_field( esc_attr__( '* Our own BuddyPress plugins, designed with you in mind.', 'bp-Template-Overloader' ) );
	$buddy_howtos = sanitize_text_field( esc_attr__( '* How to\'s for code snippets and these customisations.', 'bp-Template-Overloader' ) );
	$buddy_articles = sanitize_text_field( esc_attr__( '* Articles that help you manage your BuddyPress install better.', 'bp-Template-Overloader' ) );
	$buddy_more = sanitize_text_field( esc_attr__( 'more information can be found at: ', 'bp-Template-Overloader' ) );

	$date_time_format = apply_filters( 'pdates_date_time_format', sprintf( '%s - %s', get_option('date_format'), get_option('time_format') ) );
	
	// if ( !current_theme_supports( 'buddypress') ) {
		// echo sanitize_text_field( esc_attr__( 'Theme support for BuddyPress is disabled, BP Template Overloader will not work in this instance', 'bp-Template-Overloader' ) );
	// }
	
	If ( bp_get_theme_package_id() != 'legacy' && bp_get_theme_package_id() != 'nouveau' ) {
		echo sanitize_text_field( esc_attr__( 'BP Template Overloader only supports bp-legacy and bp-nouveau templates, ', 'bp-Template-Overloader') );
		echo bp_get_theme_package_id() . sanitize_text_field( esc_attr__( ' is not supported', 'bp-Template-Overloader') );
		return;
	}

	//Nouveau status 0 = pre-launch, 1 = launched, not in use, 2 = active

	$nouv_comp = 'colspan="2"';
	if ( bp_get_theme_package_id() == 'legacy' && !file_exists( $plugins_path . '/buddypress/bp-templates/bp-nouveau/buddypress/') ) { 
		$nouveau_status = 0;
		$templates_master = $templates_legacy;
		$tno_path = $leg_path;
	}
	If ( bp_get_theme_package_id() == 'legacy' && file_exists( $plugins_path . '/buddypress/bp-templates/bp-nouveau/buddypress/') ) { 
		$nouveau_status = 1;
		$templates_master = $templates_legacy;
		$tno_path = $leg_path;
		$nouv_comp = 'colspan="3"';
	}
	if ( bp_get_theme_package_id() == 'nouveau' ) {
		$nouveau_status = 2;
		$tno_path = $nou_path;
		$templates_master = $templates_nouveau;
	}

	echo '<link rel="stylesheet" type="text/css" href="' . BP_TOLD_URL . '/css/bp-told-admin.css">';
	echo '<link rel="stylesheet" type="text/css" href="' . BP_TOLD_URL . '/vendor/fancybox/jquery.fancybox.min.css">';

	echo '<h2 class="told-title">'. $told_title . '</h2>';
	wp_nonce_field('told-nonce', 'told-nonce' );
	echo '<span class="bp-status">' . $buddy_version . '<strong>' . BP_VERSION . '</strong>' . $active . '<strong>bp-' . bp_get_theme_package_id() . '</strong></span>
		
		<ul class="nav nav-tabs">
			<li id="template-li" class="active"><a href="#tab-1">' . $told_templates . '</a></li>
			<li id="using-li" ><a href="#tab-2">' . $using_told . '</a></li>
		</ul>
		<div class="bp-told-admin tab-content">
		<div id="tab-1" class="tab-pane active">
		<table class="bp-told-table">
		<tr>
			<th id="told-function" ' . $nouv_comp . '>' . $option_header . '</th>
			<th id="told-status" >' . $status_header . '</th>
			<th id="told-filepath" >' . $filepath_header . '</th>
			<th id="told-date" >' . $date_header . '</th>
			<th id="told-tio-options" colspan="3" >' . $tio_header . ' </th>
			<th colspan="3" id="told-tdo-options" colspan="3" >' . $tdo_header . ' </th>
		</tr>';
	
	foreach ( $templates_master as $option => $path ) {

	echo '
			<tr id=' . $path . $row_id . '">
				<td id="' . $path . $option_id . '">' . $option . '</td>
				<td>
					<img id="' . $path . $tno_view_button_id . '" alt="' . $tno_view . '" title="' . $tno_view
						. '" class="' . $tno_view_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-v.png" />
				</td>';
		if ( $nouveau_status == 1 ) {
			if ( file_exists( WP_PLUGIN_DIR . $nou_path . $path . '.php' ) ) {
				echo '<td>
						<img id="' . $path . $tno_nou_comp_button_id . '" alt="' . $tno_nou_comp . '" title="' . $tno_nou_comp
							. '" class="' . $tno_nou_comp_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-c.png" />
					</td>';
			} else {
				echo '<td>
						<img id="' . $path . $tno_nou_comp_button_id . '" style="visibility: hidden;" alt="' . $tno_nou_comp . '" title="' . $tno_nou_comp
							. '" class="' . $tno_nou_comp_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-c.png" />
					</td>';
			}
		}		
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . $path . '-tol.php' ) ) {

		// Theme Independent Overload Enabled
			echo '
				<td id="' . $path . $status_id . '">' . $tio_theme_overload	. '</td>
				<td id="' . $path . $file_path_id . '">' . BP_TOLD_TEMPLATE_URL . $path . '-tol.php</td>
				<td id="' . $path . $date_id . '">' . date_i18n($date_time_format, filemtime(BP_TOLD_TEMPLATE_DIR . $path . '-tol.php' ) ) . '</td>
				<td id="' . $path . $tio_buttons_id . '">
					<img id="' . $path . $tio_button_id . '" alt="' . $tio_disable_overload . '" title="' . $tio_disable_overload
						. '" class="' . $tio_disable_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-d.png" />
				</td>
				<td>
					<img id="' . $path . $tio_to_tdo_button_id . '" alt="' . $tio_to_tdo_migrate . '" title="' . $tio_to_tdo_migrate
						. '" class="' . $tio_to_tdo_migrate_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-m.png" />
				</td>
				<td>
					<img id="' . $path . $tio_compare_button_id . '" alt="' . $tio_compare . '" title="' . $tio_compare
						. '" class="' . $tio_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />
				</td>
				<td id="' . $path . $tdo_buttons_id . '">
						<img id="' . $path . $tdo_button_id . '" style="visibility: hidden;" alt="' . $tdo_enable_overload . '" title="' . $tdo_enable_overload . '" class="'
							. $tdo_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-e.png" />
					</td>
				<td>';
					if ( file_exists( $style_dir . '/buddypress/' . $path . '-dis.php' ) ) {
						echo '<img id="' . $path . $tdo_to_tio_button_id . '" alt="' . $tdo_delete . '" title="' . $tdo_delete
							. '" class="' . $tdo_delete_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-x.png" />
				</td>
				<td>
							<img id="' . $path . $tdo_compare_button_id . '" alt="' . $tdo_dis_compare . '" title="' . $tdo_dis_compare
							. '" class="' . $tdo_dis_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />';
					}
					if ( ! file_exists( $style_dir . '/buddypress/' . $path . '-dis.php' ) ) {
						echo '<img id="' . $path . $tdo_to_tio_button_id . '" style="visibility: hidden;" alt="' . $tdo_to_tio_migrate . '" title="' . $tdo_to_tio_migrate
							. '" class="' . $tdo_to_tio_migrate_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-m.png" />
				</td>
				<td>
							<img id="' . $path . $tdo_compare_button_id . '" style="visibility: hidden;" alt="' . $tdo_dis_compare . '" title="' . $tio_dis_compare
								. '" class="' . $tio_dis_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />';
					}
					echo
				'</td>
			</tr>';
			
		} else if ( file_exists ( $style_dir . '/buddypress/' . $path . '.php' ) ) {

		// Theme Dependent Overload in operation
			echo '
				<td id="' . $path . $status_id . '">' . $tdo_theme_overload	. '</td>
				<td id="' . $path . $file_path_id . '">' . $style_url . '/buddypress/' . $path . '.php</td>
				<td id="' . $path . $date_id . '">' . date_i18n($date_time_format, filemtime($style_dir . '/buddypress/' . $path . '.php' ) ) . '</td>
				<td id="' . $path . $tio_buttons_id . '">
						<img id="' . $path . $tio_button_id . '" style="visibility: hidden;" alt="' . $tio_enable_overload . '" title="' . $tio_enable_overload . '" class="'
							. $tio_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-e.png" />
						</td>
				<td>';
					if ( ! file_exists( BP_TOLD_TEMPLATE_DIR . $path . '-dis.php') ) {
						echo '<img id="' . $path . $tio_to_tdo_button_id . '" style="visibility: hidden; alt="' . $tio_delete . '" title="'
							. $tio_delete . '" class="' . $tio_delete_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-x.png" />
				</td>
				<td>
							<img id="' . $path . $tio_compare_button_id . '" style="visibility: hidden;" alt="' . $tio_dis_compare . '" title="' . $tio_dis_compare
							. '" class="' . $tio_dis_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />';
					}
					if ( file_exists( BP_TOLD_TEMPLATE_DIR . $path . '-dis.php') ) {
						echo '<img id="' . $path . $tio_to_tdo_button_id . '"alt="' . $tio_delete . '" title="'
							. $tio_delete . '" class="' . $tio_delete_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-x.png" />
				</td>
				<td>
							<img id="' . $path . $tio_compare_button_id . '" alt="' . $tio_dis_compare . '" title="' . $tio_dis_compare
								. '" class="' . $tio_dis_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />';
					}
					echo '
				</td>
				<td id="' . $path . $tdo_buttons_id . '">
					<img id="' . $path . $tdo_button_id . '" alt="' . $tdo_disable_overload . '" title="' . $tdo_disable_overload 
						. '" class="' . $tdo_disable_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-d.png" />
				</td>
				<td>
					<img id="' . $path . $tdo_to_tio_button_id . '" alt="' . $tdo_to_tio_migrate . '" title="' . $tdo_to_tio_migrate
						. '" class="' . $tdo_to_tio_migrate_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-m.png" />
				</td>			
				<td>
					<img id="' . $path . $tdo_compare_button_id . '" alt="' . $tdo_compare . '" title="' . $tdo_compare
						. '" class="' . $tdo_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />
				</td>
			</tr>';
		
		} else if ( file_exists( BP_TOLD_TEMPLATE_DIR . $path . '-dis.php') || file_exists ( $style_dir . '/buddypress/' . $path . '-dis.php' ) ) {
			// TIO or TDO disabled, bp theme not overloaded.
			echo '
				<td id="' . $path . $status_id . '">' . $not_overloaded	.
				'</td>
				<td id="' . $path . $file_path_id . '">' . $plugins_url . $tno_path . $path .
				'.php</td>
				<td id="' . $path . $date_id . '">' . date_i18n($date_time_format, filemtime(WP_PLUGIN_DIR . $tno_path . $path . '.php' ) ) .
				'</td>
				<td id="' . $path . $tio_buttons_id . '">';
					if ( file_exists( BP_TOLD_TEMPLATE_DIR . $path . '-dis.php') ) {
						echo '<img id="' . $path . $tio_button_id . '" alt="' . $tio_restore_overload . '" title="' . $tio_restore_overload
							. '" class="' . $tio_restore_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-r.png" />
				</td>
				<td>
							<img id="' . $path . $tio_to_tdo_button_id . '"alt="' . $tio_delete . '" title="'
							. $tio_delete . '" class="' . $tio_delete_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-x.png" />
				</td>
				<td>
							<img id="' . $path . $tio_compare_button_id . '" alt="' . $tio_dis_compare . '" title="' . $tio_dis_compare
							. '" class="' . $tio_dis_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />';
					}
					if ( ! file_exists( BP_TOLD_TEMPLATE_DIR . $path . '-dis.php') ) {
						echo '<img id="' . $path . $tio_button_id . '" alt="' . $tio_theme_overload . '" title="' . $tio_theme_overload
							. '" class="' . $tio_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-e.png" />
				</td>
				<td>
							<img id="' . $path . $tio_to_tdo_button_id . '" style="visibility: hidden; alt="' . $tio_delete . '" title="'
							. $tio_delete . '" class="' . $tio_delete_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-x.png" />
				</td>
				<td>
							<img id="' . $path . $tio_compare_button_id . '" style="visibility: hidden;" alt="' . $tio_dis_compare . '" title="' . $tio_dis_compare
							. '" class="' . $tio_dis_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />';
					}
					echo '
				</td>
				<td id="' . $path . $tdo_buttons_id . '">';
					if ( file_exists( $style_dir . '/buddypress/' . $path . '-dis.php' ) ) {
						echo '<img id="' . $path . $tdo_button_id . '" alt="' . $tdo_restore_overload . '" title="' . $tdo_restore_overload 
						. '" class="' . $tdo_restore_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-r.png" />
				</td>
				<td>
							<img id="' . $path . $tdo_to_tio_button_id . '" alt="' . $tdo_delete . '" title="' . $tdo_delete
							. '" class="' . $tdo_delete_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/red-x.png" />
				</td>
				<td>
							<img id="' . $path . $tdo_compare_button_id . '" alt="' . $tdo_dis_compare . '" title="' . $tdo_dis_compare
							. '" class="' . $tdo_dis_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />';
					}
					if ( !file_exists( $style_dir . '/buddypress/' . $path . '-dis.php' ) ) {
						echo '<img id="' . $path . $tdo_button_id . '" alt="' . $tdo_enable_overload . '" title="' . $tdo_enable_overload 
						. '" class="' . $tdo_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-e.png" />
				</td>
				<td>
							<img id="' . $path . $tdo_to_tio_button_id . '" style="visibility: hidden;" alt="' . $tdo_to_tio_migrate . '" title="' . $tdo_to_tio_migrate
							. '" class="' . $tdo_to_tio_migrate_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-m.png" />
				</td>
				<td>
							<img id="' . $path . $tdo_compare_button_id . '" style="visibility: hidden;" alt="' . $tdo_dis_compare . '" title="' . $tio_dis_compare
							. '" class="' . $tio_dis_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />';
					}
					echo '
				</td>
			</tr>';
		} else {
			// Theme not overloaded
			echo '<td id="' . $path . $status_id . '">' . $not_overloaded	.
					'</td>
					<td id="' . $path . $file_path_id . '">' . $plugins_url . $tno_path . $path	.
					'.php</td>
					<td id="' . $path . $date_id . '">' . date_i18n($date_time_format, filemtime( WP_PLUGIN_DIR . $tno_path . $path	. '.php' ) ) .
						'</td>
					<td id="' . $path . $tio_buttons_id . '">
						<img id="' . $path . $tio_button_id . '" alt="' . $tio_enable_overload . '" title="' . $tio_enable_overload . '" class="'
							. $tio_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-e.png" />
						</td>
						<td>
						<img id="' . $path . $tio_to_tdo_button_id . '" style="visibility: hidden;" alt"' . $tio_to_tdo_migrate . '" title="'
							. $tio_to_tdo_migrate . '" class="' . $tio_to_tdo_migrate_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-m.png" />
					</td>
					<td>
						<img id="' . $path . $tio_compare_button_id . '" style="visibility: hidden;" alt="' . $tio_compare . '" title="' . $tio_compare
							. '" class="' . $tio_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />
					</td>
					<td id="' . $path . $tdo_buttons_id . '">
						<img id="' . $path . $tdo_button_id . '" alt="' . $tdo_enable_overload . '" title="' . $tdo_enable_overload . '" class="'
							. $tdo_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-e.png" />
					</td>
					<td>
						<img id="' . $path . $tdo_to_tio_button_id . '" style="visibility: hidden;" alt="' . $tdo_to_tio_migrate . '" title="'
							. $tdo_to_tio_migrate . '" class="' . $tdo_to_tio_migrate_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/green-m.png" />
					</td>
					<td>
						<img id="' . $path . $tdo_compare_button_id . '" style="visibility: hidden;" alt="' . $tdo_compare . '" title="' . $tdo_compare
							. '" class="' . $tdo_compare_class . '" name="' . $path . '" src="' . BP_TOLD_URL . '/images/blue-c.png" />
					</td>
				</tr>';
		}
	}
	echo '</table>
		</div><!--tab-1-->
		<div id="tab-2" class="tab-pane">
			<div class="tab-2-left">
				<div class="tab-2l-interior">
					<p><strong>' . $told_title . '</strong>' . $using_intro . '</p>
					<p>' . $overload_explain . '</p>
					<p>' . $tio_explain . '</p>
					<p>' . $tdo_explain . '</p>
					<p>' . $using_two . '</p>
					<p><img src="' . BP_TOLD_URL . '/images/red-v.png"><strong>' . $view_button . '</strong>' . $view_intro . '</p>
					<p><img src="' . BP_TOLD_URL . '/images/blue-e.png"><strong>' . $enable_button . '</strong>' . $enable_intro . '</p>
					<p><img src="' . BP_TOLD_URL . '/images/red-d.png"><strong>' . $disable_button . '</strong>' . $disable_intro . '</p>
					<p><img src="' . BP_TOLD_URL . '/images/green-r.png"><strong>' . $restore_button . '</strong>' . $restore_intro . '</p>
					<p><img src="' . BP_TOLD_URL . '/images/green-m.png"><strong>' . $migrate_button . '</strong>' . $migrate_intro . '</p>
					<p><img src="' . BP_TOLD_URL . '/images/red-x.png"><strong>' . $delete_button . '</strong>' . $delete_intro . '</p>
					<p><img src="' . BP_TOLD_URL . '/images/blue-c.png"><strong>' . $compare_button . '</strong>' . $compare_intro . '</p>';
					if ( $nouveau_status == 1 ) {
						echo '<p><img src="' . BP_TOLD_URL . '/images/green-c.png"><strong>' . $nou_comp_button . '</strong>' . $nouveau_comp2 . '</p>';
					}
					if ( $nouveau_status == 0 ) {
						echo '<p><img src="' . BP_TOLD_URL . '/images/green-c.png"><strong>' . $nou_comp_button . '</strong>' . $nouveau_comp . '</p>';
					}
					echo
					'<p>' . $other_info . '</p>
				</div><!--tab-2l-interior-->
			</div><!--tab-2-left-->
			<div class="tab-2-right">
				<div class="tab-2r-interior">
					<a href="http://buddyuser.com/" target="_blank" ><img class="bpu-logo" src="' . BP_TOLD_URL . '/images/buddypressUserLogo.jpg"></a>
					<h3 class="hndle" style="padding: 5px 0px; font-size: 18px;">
						<span>
							<a class="" target="_blank" href="http://buddyuser.com/">' . $Buddy_news . '</a></span>
					</h3>
					<div class="inside">
						<ul>
						<li>
							' . $buddy_reviews . '
						</li>
						<li>
							' . $buddy_help . '
						</li>
						<li>
							' . $buddy_plugins . '
						</li>
						<li>
							' . $buddy_howtos . '
						</li>									
						<li>
							' . $buddy_articles . '
						</li>
						<li>
						<b>' . $buddy_more . '<a class="" target="_blank" href="http://buddyuser.com/">http://buddyuser.com/</a></b>
						</li>
					</div><!--inside-->
					<div class="postbox">
						<h3 class="hndle" style="padding: 5px 0px;">
							<span>' . $buddy_feed . '</span>
						</h3>
						<div class="rss-widget" style="padding-left:5px;">';
								wp_widget_rss_output('http://buddyuser.com/feed/', array(
								'items' => 10, 
								'show_summary' => 0, 
								'show_author' => 0, 
								'show_date' => 1)
								);
							echo '
						</div><!--rss-widget-->
					</div><!--postbox-->
				</div><!--tab-2r-interior-->
			</div><!--tab-2-right-->
		</div><!--tab-2-->
	</div><!--bp-told-admin-->';
}