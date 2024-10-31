<div class="wrap">
		
<h1><?php _e('Settings','agencytools'); ?></h1>


<?php $formslug = 'agencysettings'; ?>

<form method="post" action="options.php">
<?php settings_fields( 'bcATC_'.$formslug ); ?>
<?php do_settings_sections( 'bcATC_'.$formslug ); ?>


<?php 
// -------------------------------------------
$args = array(
    'title'     =>  __('Widget settings', 'agencytools')
);
bcATC_subtitle($args);
// -------------------------------------------

?>

<table class="bcATC_forms form-table">
<?php 

// -------------------------------------------
$args = array(
    'title'     =>  __('Dashboard Widgets', 'agencytools'),
    'slug'      =>  'agency_widgets',
    'fallback'  =>  '0',
    'info'      =>  __("Remove the not needed widgets.", 'agencytools'),
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


bcATC_form_checkbox_loop($args); 

// -------------------------------------------
?></table><?php

// -------------------------------------------
$args = array(
    'title'     =>  __("Visual settings", 'agencytools')
);
bcATC_subtitle($args);
// -------------------------------------------
?>

<table class="bcATC_forms form-table">
<?php 
// -------------------------------------------
$args = array(
    'title'     =>  __('Address bar colour (mobile browsers)', 'agencytools'),
    'slug'      =>  'agency_colour_header',
    'fallback'  =>  '',
    'info'      =>  __('Change the colour of the address bar', 'agencytools'),
    'type'      =>  ''
);

bcATC_form_input($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('WP-admin bar on the frontend', 'agencytools'),
    'slug'      =>  'agency_wp_bar',
    'fallback'  =>  '0',
    'info'      =>  '',
    'labels'    =>  array(
        '0'  =>  __('Show (normal)', 'agencytools'),
        '1'  =>  __('Hide', 'agencytools'),
        '2'  =>  __('WP-admin label', 'agencytools')
    )
);

bcATC_form_radio($args); 
// -------------------------------------------
// -------------------------------------------
?></table><?php

// -------------------------------------------
$args = array(
    'title'     =>  __("Wordpress settings", 'agencytools')
);
bcATC_subtitle($args);
// -------------------------------------------
?>

<table class="bcATC_forms form-table">
<?php 
// -------------------------------------------
$args = array(
    'title'     =>  __('Toggle posts', 'agencytools'),
    'slug'      =>  'agency_wordpress_posts',
    'fallback'  =>  '0',
    'info'      =>  __("Enable or disable the entire post (blog) part of Wordpress.", 'agencytools'),
);

bcATC_form_checkbox($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Toggle comments', 'agencytools'),
    'slug'      =>  'agency_wordpress_comments',
    'fallback'  =>  '0',
    'info'      =>  __("Enable or disable the comments part of Wordpress.", 'agencytools'),
);

bcATC_form_checkbox($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Toggle links', 'agencytools'),
    'slug'      =>  'agency_wordpress_links',
    'fallback'  =>  '0',
    'info'      =>  __("Enable or disable the entire links part of Wordpress.", 'agencytools'),
);

bcATC_form_checkbox($args); 
// -------------------------------------------
?></table><?php

// -------------------------------------------
$args = array(
    'title'     =>  __("Documentation settings", 'agencytools')
);
bcATC_subtitle($args);
// -------------------------------------------
?>

<table class="bcATC_forms form-table">
<?php 


// -------------------------------------------
$args = array(
    'title'     =>  __('Use the documentation tool', 'agencytools'),
    'slug'      =>  'agency_documentation_status',
    'fallback'  =>  '0',
    'info'      =>  __("This gives you the oppurtunity to inform and help your client use what you've built for them. The only thing you'll have to do is document everything properly.", 'agencytools'),
);

bcATC_form_checkbox($args); 

// -------------------------------------------
$args = array(
    'title'     =>  __('Show your agency information', 'agencytools'),
    'slug'      =>  'agency_information_status',
    'fallback'  =>  '0',
    'info'      =>  __("If the client is unable to resolve the problem, wants to order new content or has some changes you can use this page to inform them of your contact details. This is a great way to really personalise your clients user experience.", 'agencytools'),
);

bcATC_form_checkbox($args); 
// -------------------------------------------
?></table><?php

// -------------------------------------------
$args = array(
    'title'     =>  __("Users and role settings", 'agencytools')
);
bcATC_subtitle($args);
// -------------------------------------------
?>

<table class="bcATC_forms form-table">
<?php 
// -------------------------------------------
$args = array(
    'title'     =>  __('Access for Client role', 'agencytools'),
    'slug'      =>  'agency_role',
    'fallback'  =>  '0',
    'info'      =>  __("If you use the 'Client' role on the clients user details in the user settings this will allow the client to interact with these items. When disabled it will be invisible for the client.", 'agencytools'),
    'labels'    =>  array(
        // slug extention => field name (value will always be 1 or 0)
                
        'links'  =>  __('Links', 'agencytools'),
        'users'  =>  __('Users', 'agencytools'),
        'general'  =>  __('General Settings', 'agencytools'),
        'media'  =>  __('Media', 'agencytools'),
        'plugins'  =>  __('Plugins', 'agencytools'),
        'appearance'  =>  __('Appearance', 'agencytools'),
        'post'  =>  __('Publish posts', 'agencytools'),
        'pages'  =>  __('Publish pages', 'agencytools'),
        'comments'  =>  __('Comments', 'agencytools'),
        'write'  =>  __('Write pages/posts', 'agencytools'),
        'edit'  =>  __('Edit pages/posts', 'agencytools'),
        'delete'  =>  __('Delete pages/posts', 'agencytools')
        
        
    )
);

bcATC_form_checkbox_loop($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('View WP-admin as Client', 'agencytools'),
    'slug'      =>  'agency_role_view',
    'fallback'  =>  '0',
    'info'      =>  __("If the client is stuck you can use this tool to switch to the clients account.", 'agencytools'),
);

bcATC_form_checkbox($args); 
// -------------------------------------------

?>
</table>

<?php submit_button(); ?>
</form>
</div>