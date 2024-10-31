<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die();
}else{

        $unin_Slug = 'bcATM_';

    delete_option( $unin_Slug.'agency_name' );
    delete_option( $unin_Slug.'agency_contact' );
    delete_option( $unin_Slug.'agency_email' );
    delete_option( $unin_Slug.'agency_phone' );
    delete_option( $unin_Slug.'agency_welcome' );
    delete_option( $unin_Slug.'agency_support' );
    delete_option( $unin_Slug.'agency_content' );
    delete_option( $unin_Slug.'agency_sales' );
    delete_option( $unin_Slug.'agency_big_logo' );
    delete_option( $unin_Slug.'agency_icon_logo' );
    delete_option( $unin_Slug.'agency_widgets_wp_activity' );
    delete_option( $unin_Slug.'agency_widgets_wp_rightnow' );
    delete_option( $unin_Slug.'agency_widgets_wp_recentcomments' );
    delete_option( $unin_Slug.'agency_widgets_wp_incominglinks' );
    delete_option( $unin_Slug.'agency_widgets_wp_plugins' );
    delete_option( $unin_Slug.'agency_widgets_wp_primary' );
    delete_option( $unin_Slug.'agency_widgets_wp_secondary' );
    delete_option( $unin_Slug.'agency_widgets_wp_quickpress' );
    delete_option( $unin_Slug.'agency_widgets_wp_recentdrafts' );
    delete_option( $unin_Slug.'agency_wordpress_posts' );
    delete_option( $unin_Slug.'agency_wordpress_comments' );
    delete_option( $unin_Slug.'agency_wordpress_links' );
    delete_option( $unin_Slug.'agency_documentation_status' );
    delete_option( $unin_Slug.'agency_information_status' );
    delete_option( $unin_Slug.'agency_role_links' );
    delete_option( $unin_Slug.'agency_role_users' );
    delete_option( $unin_Slug.'agency_role_general' );
    delete_option( $unin_Slug.'agency_role_media' );
    delete_option( $unin_Slug.'agency_role_plugins' );
    delete_option( $unin_Slug.'agency_role_appearance' );
    delete_option( $unin_Slug.'agency_role_post' );
    delete_option( $unin_Slug.'agency_role_pages' );
    delete_option( $unin_Slug.'agency_role_comments' );
    delete_option( $unin_Slug.'agency_role_write' );
    delete_option( $unin_Slug.'agency_role_edit' );
    delete_option( $unin_Slug.'agency_role_delete' );
    delete_option( $unin_Slug.'agency_role_view' );

}
?>