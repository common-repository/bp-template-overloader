<?php
/*
* @package bp-template-overloader
*/
 if(!defined('ABSPATH')) {
	exit;
}

// replace member-header.php with the template overload from the plugin
function bp_told_replace_template_nouveau( $templates, $slug, $name ) {
    switch($slug) {
	//Activity Overloads

	case 'activity/single/home' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/single/home-tol.php' ) ) {
			return array( 'activity/single/home-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'activity/activity-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/activity-loop-tol.php' ) ) {
			return array( 'activity/activity-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
	
	case 'activity/comment-form' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/comment-form-tol.php' ) ) {
			return array( 'activity/comment-form-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'activity/comment' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/comment-tol.php' ) ) {
			return array( 'activity/comment-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'activity/entry' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/entry-tol.php' ) ) {
			return array( 'activity/entry-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'activity/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/index-tol.php' ) ) {
			return array( 'activity/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'activity/post-form' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/post-form-tol.php' ) ) {
			return array( 'activity/post-form-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'activity/widget' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/widget-tol.php' ) ) {
			return array( 'activity/widget-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	// Assets overloads

	case 'assets/_attachments/avatars/camera' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/avatars/camera-tol.php' ) ) {
			return array( 'assets/_attachments/avatars/camera-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
	

	case 'assets/_attachments/avatars/crop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/avatars/crop-tol.php' ) ) {
			return array( 'assets/_attachments/avatars/crop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
	

	case 'assets/_attachments/avatars/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/avatars/index-tol.php' ) ) {
			return array( 'assets/_attachments/avatars/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
	

	case 'assets/_attachments/cover-images/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/cover-images/index-tol.php' ) ) {
			return array( 'assets/_attachments/cover-images/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
	
	case 'assets/_attachments/uploader' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/uploader-tol.php' ) ) {
			return array( 'assets/_attachments/uploader-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/emails/single-bp-email' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/emails/single-bp-email-tol.php' ) ) {
			return array( 'assets/emails/single-bp-email-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/embeds/activity' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/embeds/activity-tol.php' ) ) {
			return array( 'assets/embeds/activity-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/embeds/footer' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/embeds/footer-tol.php' ) ) {
			return array( 'assets/embeds/footer-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/embeds/header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/embeds/header-tol.php' ) ) {
			return array( 'assets/embeds/header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/embeds/header-activity' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/embeds/header-activity-tol.php' ) ) {
			return array( 'assets/embeds/header-activity-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

		//Blogs overloads
	case 'blogs/blogs-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'blogs/blogs-loop-tol.php' ) ) {
			return array( 'blogs/blogs-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'blogs/create' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'blogs/create-tol.php' ) ) {
			return array( 'blogs/create-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'blogs/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'blogs/index-tol.php' ) ) {
			return array( 'blogs/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
		//Common overloads
		
	case 'common/filters/directory-filters' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/filters/directory-filters-tol.php' ) ) {
			return array( 'common/filters/directory-filters-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

		
	case 'common/filters/groups-screens-filters' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/filters/groups-screens-filters-tol.php' ) ) {
			return array( 'common/filters/groups-screens-filters-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

		
	case 'common/filters/user-screens-filters' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/filters/user-screens-filters-tol.php' ) ) {
			return array( 'common/filters/user-screens-filters-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'common/js-templates/activity/form' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/js-templates/activity/form-tol.php' ) ) {
			return array( 'common/js-templates/activity/form-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
		
	case 'common/js-templates/invites/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/js-templates/invites/index-tol.php' ) ) {
			return array( 'common/js-templates/invites/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'common/js-templates/messages/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/js-templates/messages/index-tol.php' ) ) {
			return array( 'common/js-templates/messages/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'common/nav/directory-nav' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/nav/directory-nav-tol.php' ) ) {
			return array( 'common/nav/directory-nav-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'common/notices/template-notices-nav' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/notices/template-notices-tol.php' ) ) {
			return array( 'common/notices/template-notices-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'common/search/search-form' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/search/search-form-tol.php' ) ) {
			return array( 'common/search/search-form-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'common/search-and-filters-bar' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/search-and-filters-bar-tol.php' ) ) {
			return array( 'common/search-and-filters-bar-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	//Groups overloads

	case 'groups/single/admin/delete-group' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/delete-group-tol.php' ) ) {
			return array( 'groups/single/admin/delete-group-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/edit-details' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/edit-details-tol.php' ) ) {
			return array( 'groups/single/admin/edit-details-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/group-avatar' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/group-avatar-tol.php' ) ) {
			return array( 'groups/single/admin/group-avatar-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/group-cover-image' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/group-cover-image-tol.php' ) ) {
			return array( 'groups/single/admin/group-cover-image-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/group-settings' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/group-settings-tol.php' ) ) {
			return array( 'groups/single/admin/group-settings-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/manage-members' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/manage-members-tol.php' ) ) {
			return array( 'groups/single/admin/manage-members-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/membership-requests' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/membership-requests-tol.php' ) ) {
			return array( 'groups/single/admin/membership-requests-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/parts/admin-subnav' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/parts/admin-subnav-tol.php' ) ) {
			return array( 'groups/single/admin/parts/admin-subnav-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/parts/header-item-actions' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/parts/header-item-actions-tol.php' ) ) {
			return array( 'groups/single/admin/parts/header-item-actions-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/parts/item-nav' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/parts/item-nav-tol.php' ) ) {
			return array( 'groups/single/admin/parts/item-nav-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/activity' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/activity-tol.php' ) ) {
			return array( 'groups/single/activity-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}		
		
	case 'groups/single/admin' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin-tol.php' ) ) {
			return array( 'groups/single/admin-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

		case 'groups/single/cover-image-header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/cover-image-header-tol.php' ) ) {
			return array( 'groups/single/cover-image-header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/default-front' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/default-front-tol.php' ) ) {
			return array( 'groups/single/default-front-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/group-header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/group-header.php' ) ) {
			return array( 'groups/single/group-header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/home' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/home-tol.php' ) ) {
			return array( 'groups/single/home-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/members-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/members-loop-tol.php' ) ) {
			return array( 'groups/single/members-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/members' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/members-tol.php' ) ) {
			return array( 'groups/single/members-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/plugins' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/plugins-tol.php' ) ) {
			return array( 'groups/single/plugins-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/request-membership' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/request-membership-tol.php' ) ) {
			return array( 'groups/single/request-membership-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/requests-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/requests-loop.php' ) ) {
			return array( 'groups/single/requests-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/send-invites' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/send-invites.php' ) ) {
			return array( 'groups/single/send-invites-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/create' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/create-tol.php' ) ) {
			return array( 'groups/create-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/groups-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/groups-loop-tol.php' ) ) {
			return array( 'groups/groups-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/index-tol.php' ) ) {
			return array( 'groups/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	//Members Overloads
	case 'members/single/friends/request' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/friends/request-tol.php' ) ) {
			return array( 'members/single/friends/request-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/groups/invite' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/groups/invite-tol.php' ) ) {
			return array( 'members/single/groups/invite-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
	
	case 'members/single/notifications/notifications-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/notifications/notifications-loop-tol.php' ) ) {
			return array( 'members/single/notifications/notifications-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/parts/item-nav' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/parts/item-nav-tol.php' ) ) {
			return array( 'members/single/parts/item-nav-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/parts/item-subnav' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/parts/item-subnav-tol.php' ) ) {
			return array( 'members/single/parts/item-subnav-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/parts/profile-visibility' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/parts/profile-visibility-tol.php' ) ) {
			return array( 'members/single/parts/profile-visibility-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}


	case 'members/single/profile/change-avatar' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/change-avatar-tol.php' ) ) {
			return array( 'members/single/profile/change-avatar-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile/change-cover-image' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/change-cover-image-tol.php' ) ) {
			return array( 'members/single/profile/change-cover-image-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'members/single/profile/edit' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/edit-tol.php' ) ) {
			return array( 'members/single/profile/edit-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile/profile-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/profile-loop-tol.php' ) ) {
			return array( 'members/single/profile/profile-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile/profile-wp' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/profile-wp-tol.php' ) ) {
			return array( 'members/single/profile/profile-wp-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/capabilities' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/capabilities-tol.php' ) ) {
			return array( 'members/single/settings/capabilities-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/delete-account' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/delete-account-tol.php' ) ) {
			return array( 'members/single/settings/delete-account-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/general' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/general-tol.php' ) ) {
			return array( 'members/single/settings/general-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}


	case 'members/single/settings/group-invites' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/group-invites-tol.php' ) ) {
			return array( 'members/single/settings/group-invites-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

		case 'members/single/settings/notifications' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/notifications-tol.php' ) ) {
			return array( 'members/single/settings/notifications-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/profile' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/profile-tol.php' ) ) {
			return array( 'members/single/settings/profile-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/activity' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/activity-tol.php' ) ) {
			return array( 'members/single/activity-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/blogs' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/blogs-tol.php' ) ) {
			return array( 'members/single/blogs-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/cover-image-header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/cover-image-header-tol.php' ) ) {
			return array( 'members/single/cover-image-header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/default-front' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/default-front-tol.php' ) ) {
			return array( 'members/single/default-front-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/friends' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/friends-tol.php' ) ) {
			return array( 'members/single/friends-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/groups' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/groups-tol.php' ) ) {
			return array( 'members/single/groups-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/home' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/home-tol.php' ) ) {
			return array( 'members/single/home-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/member-header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/member-header-tol.php' ) ) {
			return array( 'members/single/member-header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}			

	case 'members/single/messages' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/messages-tol.php' ) ) {
			return array( 'members/single/messages-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'members/single/notifications' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/notifications-tol.php' ) ) {
			return array( 'members/single/notifications-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/plugins' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/plugins-tol.php' ) ) {
			return array( 'members/single/plugins-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile-tol.php' ) ) {
			return array( 'members/single/profile-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings-tol.php' ) ) {
			return array( 'members/single/settings-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/activate' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/activate-tol.php' ) ) {
			return array( 'members/activate-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}		

	case 'members/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/index-tol.php' ) ) {
			return array( 'members/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'members/members-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/members-loop-tol.php' ) ) {
			return array( 'members/members-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
	case 'members/register' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/register-tol.php' ) ) {
			return array( 'members/register-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}		

	}
	return $templates;
}

// replace member-header.php with the template overload from the plugin
function bp_told_replace_template_legacy( $templates, $slug, $name ) {
    switch($slug) {
	//Activity Overloads

	case 'activity/single/home' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/single/home-tol.php' ) ) {
			return array( 'activity/single/home-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'activity/activity-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/activity-loop-tol.php' ) ) {
			return array( 'activity/activity-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
	
	case 'activity/comment' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/comment-tol.php' ) ) {
			return array( 'activity/comment-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'activity/entry' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/entry-tol.php' ) ) {
			return array( 'activity/entry-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'activity/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/index-tol.php' ) ) {
			return array( 'activity/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'activity/post-form' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'activity/post-form-tol.php' ) ) {
			return array( 'activity/post-form-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}		
	// Assets overloads

	case 'assets/_attachments/avatars/camera' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/avatars/camera-tol.php' ) ) {
			return array( 'assets/_attachments/avatars/camera-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
	

	case 'assets/_attachments/avatars/crop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/avatars/crop-tol.php' ) ) {
			return array( 'assets/_attachments/avatars/crop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
	

	case 'assets/_attachments/avatars/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/avatars/index-tol.php' ) ) {
			return array( 'assets/_attachments/avatars/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
	

	case 'assets/_attachments/cover-images/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/cover-images/index-tol.php' ) ) {
			return array( 'assets/_attachments/cover-images/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	
	
	case 'assets/_attachments/uploader' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/_attachments/uploader-tol.php' ) ) {
			return array( 'assets/_attachments/uploader-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/emails/single-bp-email' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/emails/single-bp-email-tol.php' ) ) {
			return array( 'assets/emails/single-bp-email-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/embeds/activity' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/embeds/activity-tol.php' ) ) {
			return array( 'assets/embeds/activity-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/embeds/footer' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/embeds/footer-tol.php' ) ) {
			return array( 'assets/embeds/footer-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/embeds/header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/embeds/header-tol.php' ) ) {
			return array( 'assets/embeds/header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

	case 'assets/embeds/header-activity' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'assets/embeds/header-activity-tol.php' ) ) {
			return array( 'assets/embeds/header-activity-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

		//Blogs overloads
	case 'blogs/blogs-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'blogs/blogs-loop-tol.php' ) ) {
			return array( 'blogs/blogs-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'blogs/create' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'blogs/create-tol.php' ) ) {
			return array( 'blogs/create-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'blogs/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'blogs/index-tol.php' ) ) {
			return array( 'blogs/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
		//Common overloads
		
	case 'common/search/dir-search-form' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'common/search/dir-search-form-tol.php' ) ) {
			return array( 'common/search/dir-search-form-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}	

		
	//Groups overloads

	case 'groups/single/admin/delete-group' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/delete-group-tol.php' ) ) {
			return array( 'groups/single/admin/delete-group-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/edit-details' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/edit-details-tol.php' ) ) {
			return array( 'groups/single/admin/edit-details-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/group-avatar' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/group-avatar-tol.php' ) ) {
			return array( 'groups/single/admin/group-avatar-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/group-cover-image' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/group-cover-image-tol.php' ) ) {
			return array( 'groups/single/admin/group-cover-image-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/group-settings' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/group-settings-tol.php' ) ) {
			return array( 'groups/single/admin/group-settings-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/manage-members' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/manage-members-tol.php' ) ) {
			return array( 'groups/single/admin/manage-members-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/admin/membership-requests' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin/membership-requests-tol.php' ) ) {
			return array( 'groups/single/admin/membership-requests-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		

	case 'groups/single/forum/topic' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/forum/topic-tol.php' ) ) {
			return array( 'groups/single/forum/topic-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/activity' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/activity-tol.php' ) ) {
			return array( 'groups/single/activity-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}		
		
	case 'groups/single/admin' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/admin-tol.php' ) ) {
			return array( 'groups/single/admin-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

		case 'groups/single/cover-image-header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/cover-image-header-tol.php' ) ) {
			return array( 'groups/single/cover-image-header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/group-header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/group-header.php' ) ) {
			return array( 'groups/single/group-header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/home' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/home-tol.php' ) ) {
			return array( 'groups/single/home-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/invites-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/invites-loop-tol.php' ) ) {
			return array( 'groups/single/invites-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/members' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/members-tol.php' ) ) {
			return array( 'groups/single/members-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/plugins' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/plugins-tol.php' ) ) {
			return array( 'groups/single/plugins-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/request-membership' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/request-membership-tol.php' ) ) {
			return array( 'groups/single/request-membership-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/single/requests-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/requests-loop.php' ) ) {
			return array( 'groups/single/requests-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'groups/single/send-invites' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/single/send-invites.php' ) ) {
			return array( 'groups/single/send-invites-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/create' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/create-tol.php' ) ) {
			return array( 'groups/create-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/groups-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/groups-loop-tol.php' ) ) {
			return array( 'groups/groups-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'groups/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'groups/index-tol.php' ) ) {
			return array( 'groups/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	//Members Overloads
	case 'members/single/friends/request' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/friends/request-tol.php' ) ) {
			return array( 'members/single/friends/request-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/groups/invite' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/groups/invite-tol.php' ) ) {
			return array( 'members/single/groups/invite-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/messages/compose' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/messages/compose-tol.php' ) ) {
			return array( 'members/single/messages/compose-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/messages/message' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/messages/message-tol.php' ) ) {
			return array( 'members/single/messages/message-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}		
		
	case 'members/single/messages/messages-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/messages/messages-loop-tol.php' ) ) {
			return array( 'members/single/messages/messages-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/messages/notices-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/messages/notices-loop-tol.php' ) ) {
			return array( 'members/single/messages/notices-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/messages/single' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/messages/single-tol.php' ) ) {
			return array( 'members/single/messages/single-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/notifications/feedback-no-notifications' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/notifications/feedback-no-notifications-tol.php' ) ) {
			return array( 'members/single/notifications/feedback-no-notifications-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/notifications/notifications-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/notifications/notifications-loop-tol.php' ) ) {
			return array( 'members/single/notifications/notifications-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/notifications/read' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/notifications/read-tol.php' ) ) {
			return array( 'members/single/notifications/read-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/notifications/unread' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/notifications/unread-tol.php' ) ) {
			return array( 'members/single/notifications/unread-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile/change-avatar' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/change-avatar-tol.php' ) ) {
			return array( 'members/single/profile/change-avatar-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile/change-cover-image' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/change-cover-image-tol.php' ) ) {
			return array( 'members/single/profile/change-cover-image-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'members/single/profile/edit' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/edit-tol.php' ) ) {
			return array( 'members/single/profile/edit-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile/profile-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/profile-loop-tol.php' ) ) {
			return array( 'members/single/profile/profile-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile/profile-wp' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile/profile-wp-tol.php' ) ) {
			return array( 'members/single/profile/profile-wp-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/capabilities' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/capabilities-tol.php' ) ) {
			return array( 'members/single/settings/capabilities-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/delete-account' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/delete-account-tol.php' ) ) {
			return array( 'members/single/settings/delete-account-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/general' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/general-tol.php' ) ) {
			return array( 'members/single/settings/general-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/notifications' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/notifications-tol.php' ) ) {
			return array( 'members/single/settings/notifications-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings/profile' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings/profile-tol.php' ) ) {
			return array( 'members/single/settings/profile-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/activity' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/activity-tol.php' ) ) {
			return array( 'members/single/activity-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/blogs' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/blogs-tol.php' ) ) {
			return array( 'members/single/blogs-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/cover-image-header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/cover-image-header-tol.php' ) ) {
			return array( 'members/single/cover-image-header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/friends' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/friends-tol.php' ) ) {
			return array( 'members/single/friends-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/groups' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/groups-tol.php' ) ) {
			return array( 'members/single/groups-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/home' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/home-tol.php' ) ) {
			return array( 'members/single/home-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/member-header' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/member-header-tol.php' ) ) {
			return array( 'members/single/member-header-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}			

	case 'members/single/messages' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/messages-tol.php' ) ) {
			return array( 'members/single/messages-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'members/single/notifications' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/notifications-tol.php' ) ) {
			return array( 'members/single/notifications-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/plugins' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/plugins-tol.php' ) ) {
			return array( 'members/single/plugins-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/profile' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/profile-tol.php' ) ) {
			return array( 'members/single/profile-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/single/settings' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/single/settings-tol.php' ) ) {
			return array( 'members/single/settings-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}

	case 'members/activate' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/activate-tol.php' ) ) {
			return array( 'members/activate-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}		

	case 'members/index' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/index-tol.php' ) ) {
			return array( 'members/index-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
		
	case 'members/members-loop' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/members-loop-tol.php' ) ) {
			return array( 'members/members-loop-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}
	case 'members/register' :
		if ( file_exists( BP_TOLD_TEMPLATE_DIR . 'members/register-tol.php' ) ) {
			return array( 'members/register-tol.php' );
			break;
		} else {
			return $templates;
			break;
		}		

	}
	return $templates;
}
 
 
function bp_told_start() {
     
    if( function_exists( 'bp_register_template_stack' ) ) {
        bp_register_template_stack( 'bp_told_register_template_location' );
	}
    // if viewing a member page, overload the template
    if ( bp_is_user()  ) {
        if ( bp_get_theme_package_id() == 'legacy' ) {
			add_filter( 'bp_get_template_part', 'bp_told_replace_template_legacy', 10, 3 );
		}
        if ( bp_get_theme_package_id() == 'nouveau' ) {
			add_filter( 'bp_get_template_part', 'bp_told_replace_template_nouveau', 10, 3 );
		}
	}
}
add_action( 'bp_init', 'bp_told_start' );

// register the location of the plugin templates
function bp_told_register_template_location() {
    return BP_TOLD_TEMPLATE_DIR;
}
 