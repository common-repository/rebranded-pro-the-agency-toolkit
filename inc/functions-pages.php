<?php
// custom page functions

function bcATC_agency_fb(){

    bcATC_get_template_part('agencyform');
    bcATC_get_template_part('footer');

}

function bcATC_settings_fb(){

    bcATC_get_template_part('settings');
    bcATC_get_template_part('footer');

}

function bcATC_extensions_fb(){

    bcATC_get_template_part('extensions');
    //bcATC_get_template_part('footer');

}

// client functions



function bcATC_contact_fb(){

    bcATC_get_template_part('agencyprofile');

}

// page template function

function bcATC_get_template_part($type){

    include plugin_dir_path( __DIR__ ).'tmpl/template-'.$type.'.php';

}

// save the info

/* ---------------------------------------- */
/* Add form data to the database after	    */
/* sanitising the input.	                */ 

function bcATC_form_register() {
	
	// this corresponds to some information added at the top of the form
	$setting_name = 'bcATC_';
	
	// sanitize settings
    $sani['html'] = array(
            'type' => 'string', 
            'sanitize_callback' => 'wp_kses_post',
            'default' => NULL,
            );	
	
    $sani['int']  = 'intval';
	
    $sani['text']  = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_text_field',
            'default' => NULL,
            );
	
	// adding the information to the database as options

    $register_me = array(
        array( 'page' => 'agencyform', 'slug'=> 'agency_name', 'sanitize'=>'text'),
        array( 'page' => 'agencyform', 'slug'=> 'agency_contact', 'sanitize'=>'text'),
        array( 'page' => 'agencyform', 'slug'=> 'agency_email', 'sanitize'=>'text'),
        array( 'page' => 'agencyform', 'slug'=> 'agency_phone', 'sanitize'=>'text'),
        array( 'page' => 'agencyform', 'slug'=> 'agency_welcome', 'sanitize'=>'html'),

        array( 'page' => 'agencyform', 'slug'=> 'agency_content', 'sanitize'=>'text'),
        array( 'page' => 'agencyform', 'slug'=> 'agency_support', 'sanitize'=>'text'),
        array( 'page' => 'agencyform', 'slug'=> 'agency_sales', 'sanitize'=>'text'),

        array( 'page' => 'agencyform', 'slug'=> 'agency_big_logo', 'sanitize'=>'int'),
        array( 'page' => 'agencyform', 'slug'=> 'agency_icon_logo', 'sanitize'=>'int'),
        

        //array( 'page' => 'agencysettings', 'slug'=> 'agency_widgets', 'sanitize'=>'int'),
        //array( 'page' => 'agencysettings', 'slug'=> 'agency_widgets', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_documentation_status', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_documentation_wp', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_information_status', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_role_status', 'sanitize'=>'int'),
        //array( 'page' => 'agencysettings', 'slug'=> 'agency_role', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_role_view', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_email_status', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_mail_frequency', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_administrator_email', 'sanitize'=>'text'),

        array( 'page' => 'agencysettings', 'slug'=> 'agency_wordpress_posts', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_wordpress_comments', 'sanitize'=>'int'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_wordpress_links', 'sanitize'=>'int'),

        array( 'page' => 'agencysettings', 'slug'=> 'agency_colour_header', 'sanitize'=>'text'),
        array( 'page' => 'agencysettings', 'slug'=> 'agency_wp_bar', 'sanitize'=>'text'),
        
    );

    foreach ($register_me as $row){
        register_setting( $setting_name.$row['page'], $setting_name.$row['slug'], $sani[$row['sanitize']] ); // check
    }


    $register_subs[0] = array(
        'page' => 'agencysettings',
        'slug' => 'agency_widgets_',
        'labels'    =>  array(
            // slug extention => field name (value will always be 1 or 0)
            'wp_activity'  =>  __('Wordpress Activity', 'agencytools'),
            'wp_rightnow'  =>  __('Wordpress Right Now', 'agencytools'),
            'wp_recentcomments'  =>  __('Wordpress Recent Comments', 'agencytools'),
            'wp_incominglinks'  =>  __('Wordpress Incoming Links', 'agencytools'),
            'wp_plugins'  =>  __('Wordpress Plugins', 'agencytools'),
            'wp_primary'  =>  __('Dashboard Primary', 'agencytools'),
            'wp_secondary'  =>  __('Dashboard Secondary', 'agencytools'),
            'wp_quickpress'  =>  __('Dashboard Quick Press', 'agencytools'),
            'wp_recentdrafts'  =>  __('Dashboard Recent Drafts', 'agencytools')
        )
    );

    foreach ($register_subs[0]['labels'] as $slug => $name){
        register_setting( $setting_name.$register_subs[0]['page'], $setting_name.$register_subs[0]['slug'].$slug, $sani['int'] ); // check
    }

    $register_subs[1] = array(
        'page' => 'agencysettings',
        'slug' => 'agency_role_',
        'labels'    =>  array(
            // slug extention => field name (value will always be 1 or 0)
            'post'  =>  __('Posts', 'agencytools'),
            'comments'  =>  __('Comments', 'agencytools'),
            'pages'  =>  __('Pages', 'agencytools'),
            'links'  =>  __('Links', 'agencytools'),
            'users'  =>  __('Users', 'agencytools'),
            'general'  =>  __('General Settings', 'agencytools'),
            'media'  =>  __('Media', 'agencytools'),
            'plugins'  =>  __('Plugins', 'agencytools'),
            'appearance'  =>  __('Appearance', 'agencytools'),
            'write'  =>  __('Write pages/posts', 'agencytools'),
            'edit'  =>  __('Edit pages/posts', 'agencytools'),
            'delete'  =>  __('Delete pages/posts', 'agencytools')
        )
    );

    foreach ($register_subs[1]['labels'] as $slug => $name){
        register_setting( $setting_name.$register_subs[1]['page'], $setting_name.$register_subs[1]['slug'].$slug, $sani['int'] ); // check
    }
	
}

add_action( 'admin_init', 'bcATC_form_register' );

?>