<?php

// client side

// the documentation page
function bcATC_docs_fb(){

    bcATC_get_template_part('documentation');

}





// admin side

// custom post type:
function bcATC_cpt_docs() {
    $slug = 'bcATC_docs';
    $name = 'Documentation'; // singular
    $name_p = 'Documentation'; // pleural
    $icon = 'dashicons-plugins-checked';
    $pos = 0;
    $show = false;
    $tax = array( );
    $supports = array( 'title', 'editor' );

    $labels = array(
		'name'               => _x( $name, 'post type general name', 'agencytools' ),
		'singular_name'      => _x( $name, 'post type singular name', 'agencytools' ),
		'menu_name'          => _x( $name, 'admin menu', 'agencytools' ),
		'name_admin_bar'     => _x( $name, 'add new on admin bar', 'agencytools' ),
		'add_new'            => _x( 'New', 'plugins', 'agencytools' ),
		'add_new_item'       => __( 'New '.$name, 'agencytools' ),
		'new_item'           => __( 'New '.$name, 'agencytools' ),
		'edit_item'          => __( 'Edit '.$name, 'agencytools' ),
		'view_item'          => __( 'View '.$name, 'agencytools' ),
		'all_items'          => __( 'All '.$name_p, 'agencytools' ),
		'search_items'       => __( 'Search in '.$name_p, 'agencytools' ),
		'parent_item_colon'  => __( 'Parent '.$name.':', 'agencytools' ),
		'not_found'          => __( 'No '.$name_p.' found.', 'agencytools' ),
		'not_found_in_trash' => __( 'No '.$name_p.' found in Trash.', 'agencytools' )
    );

        $args = array(
            'labels'             => $labels,
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => $show,
            'query_var'          => true,
            'capability_type'    => 'post',
            'map_meta_cap'       => true,
            'has_archive'        => false,
            'hierarchical'       => false,
            'rewrite' 			 => false,
            'menu_position'      => $pos,
            'menu_icon' 		 => $icon,
            'taxonomies' 		 =>	$tax,
            'supports'           => $supports
        );
        register_post_type( $slug, $args );

        
}



if(get_option('bcATC_agency_documentation_status')==1){
    // run the cpt when setting is on 1
    bcATC_cpt_docs();
}



?>