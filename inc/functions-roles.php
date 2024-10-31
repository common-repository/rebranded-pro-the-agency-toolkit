<?php // roles


function bcATC_role_rules() {
    // gets the author role
    $role = get_role( 'bcATC_client' );


    $role->add_cap( 'edit_dashboard' );   
    $role->add_cap( 'read_private_pages' ); 
    $role->add_cap( 'read_private_posts' ); 


    if(get_option('bcATC_agency_role_post')==1){
        $role->add_cap( 'publish_posts' ); 
        $role->add_cap( 'post' ); 
    }else{
        $role->remove_cap( 'publish_posts' ); 
        $role->remove_cap( 'post' ); 
    }

    if(get_option('bcATC_agency_role_comments')==1){
        $role->add_cap( 'moderate_comments' ); 
    }else{
        $role->remove_cap( 'moderate_comments' ); 
    }

    if(get_option('bcATC_agency_role_pages')==1){

        $role->add_cap( 'publish_pages' );         
    }else{
        $role->remove_cap( 'publish_pages' ); 
    }

    if(get_option('bcATC_agency_role_links')==1){
        $role->add_cap( 'manage_links' ); 
    }else{
        $role->remove_cap( 'manage_links' ); 
    }

    if(get_option('bcATC_agency_role_users')==1){
        $role->add_cap( 'list_users' ); 
        $role->add_cap( 'promote_users' ); 
        $role->add_cap( 'remove_users' ); 

    }else{
        $role->remove_cap( 'list_users' ); 
        $role->remove_cap( 'promote_users' ); 
        $role->remove_cap( 'remove_users' ); 
    }

    if(get_option('bcATC_agency_role_general')==1){
        $role->add_cap( 'manage_options' ); 
    }else{
        $role->remove_cap( 'manage_options' ); 
    }

    if(get_option('bcATC_agency_role_media')==1){
        $role->add_cap( 'upload_files' ); 
    }else{
        $role->remove_cap( 'upload_files' ); 
    }

    if(get_option('bcATC_agency_role_plugins')==1){
        $role->add_cap( 'activate_plugins' ); 
    }else{
        $role->remove_cap( 'activate_plugins' ); 
    }

    if(get_option('bcATC_agency_role_appearance')==1){
        $role->add_cap( 'edit_theme_options' ); 
        $role->add_cap( 'customize' ); 
        $role->add_cap( 'switch_themes' ); 
    }else{
        $role->remove_cap( 'edit_theme_options' ); 
        $role->remove_cap( 'customize' ); 
        $role->remove_cap( 'switch_themes' ); 
    }

    if(get_option('bcATC_agency_role_write')==1){
        $role->add_cap( 'manage_categories' ); 
    }else{
        $role->remove_cap( 'manage_categories' ); 
    }

    if(get_option('bcATC_agency_role_edit')==1){
        $role->add_cap( 'edit_others_pages' ); 
        $role->add_cap( 'edit_others_posts' ); 
        $role->add_cap( 'edit_pages' ); 
        $role->add_cap( 'edit_posts' ); 
        $role->add_cap( 'edit_private_pages' ); 
        $role->add_cap( 'edit_private_posts' ); 
        $role->add_cap( 'edit_published_pages' ); 
        $role->add_cap( 'edit_published_posts' ); 
    }else{
        $role->remove_cap( 'edit_others_pages' ); 
        $role->remove_cap( 'edit_others_posts' ); 
        $role->remove_cap( 'edit_pages' ); 
        $role->remove_cap( 'edit_posts' ); 
        $role->remove_cap( 'edit_private_pages' ); 
        $role->remove_cap( 'edit_private_posts' ); 
        $role->remove_cap( 'edit_published_pages' ); 
        $role->remove_cap( 'edit_published_posts' ); 
    }

    if(get_option('bcATC_agency_role_delete')==1){
        $role->add_cap( 'delete_others_pages' ); 
        $role->add_cap( 'delete_others_posts' ); 
        $role->add_cap( 'delete_pages' ); 
        $role->add_cap( 'delete_posts' ); 
        $role->add_cap( 'delete_private_pages' ); 
        $role->add_cap( 'delete_private_posts' ); 
        $role->add_cap( 'delete_published_pages' ); 
        $role->add_cap( 'delete_published_posts' ); 
    }else{
        $role->remove_cap( 'delete_others_pages' ); 
        $role->remove_cap( 'delete_others_posts' ); 
        $role->remove_cap( 'delete_pages' ); 
        $role->remove_cap( 'delete_posts' ); 
        $role->remove_cap( 'delete_private_pages' ); 
        $role->remove_cap( 'delete_private_posts' ); 
        $role->remove_cap( 'delete_published_pages' ); 
        $role->remove_cap( 'delete_published_posts' ); 
    }
    /*echo "<pre>";
    print_r($role);
    echo "</pre>";*/
}


add_action( 'admin_init', 'bcATC_role_rules');
add_action( 'init', 'bcATC_role_rules');


// add the roles needed

    // add role if not available
        add_role(
            'bcATC_client',
            __( 'Client', 'agencytools' ),
            array(
                'read'            => true  // true allows this capability
            )
        );

?>