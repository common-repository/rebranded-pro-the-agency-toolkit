<div class="wrap">
		
<h1><?php _e('About our agency','agencytools'); ?></h1>


<?php $formslug = 'agencyform'; ?>

<form method="post" action="options.php">
<?php settings_fields( 'bcATC_'.$formslug ); ?>
<?php do_settings_sections( 'bcATC_'.$formslug ); ?>


<?php 
// -------------------------------------------
$args = array(
    'title'     =>  __('My agency details', 'agencytools')
);
bcATC_subtitle($args);
// -------------------------------------------

?>

<table class="bcATC_forms form-table">
<?php 
// -------------------------------------------
$args = array(
    'title'     =>  __('Agency name', 'agencytools'),
    'slug'      =>  'agency_name',
    'fallback'  =>  '',
    'info'      =>  __('', 'agencytools'),
    'type'      =>  'text'
);

bcATC_form_input($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Agency contact', 'agencytools'),
    'slug'      =>  'agency_contact',
    'fallback'  =>  '',
    'info'      =>  __('Contact person name', 'agencytools'),
    'type'      =>  'text'
);

bcATC_form_input($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Agency email', 'agencytools'),
    'slug'      =>  'agency_email',
    'fallback'  =>  '',
    'info'      =>  __('Overall email address', 'agencytools'),
    'type'      =>  'email'
);

bcATC_form_input($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Agency phonenumber', 'agencytools'),
    'slug'      =>  'agency_phone',
    'fallback'  =>  '',
    'info'      =>  __('', 'agencytools'),
    'type'      =>  'text'
);

bcATC_form_input($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Welcome message', 'agencytools'),
    'slug'      =>  'agency_welcome',
    'fallback'  =>  '',
    'info'      =>  __('A message to display on yout agency admin page', 'agencytools'),
    'type'      =>  ''
);

bcATC_form_textarea($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Agency support email', 'agencytools'),
    'slug'      =>  'agency_support',
    'fallback'  =>  '',
    'info'      =>  __('This will become a button', 'agencytools'),
    'type'      =>  'email'
);

bcATC_form_input($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Agency content email', 'agencytools'),
    'slug'      =>  'agency_content',
    'fallback'  =>  '',
    'info'      =>  __('This will become a button', 'agencytools'),
    'type'      =>  'email'
);

bcATC_form_input($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Agency sales email', 'agencytools'),
    'slug'      =>  'agency_sales',
    'fallback'  =>  '',
    'info'      =>  __('This will become a button', 'agencytools'),
    'type'      =>  'email'
);

bcATC_form_input($args); 
// -------------------------------------------
/*$args = array(
    'title'     =>  __('Welcome check', 'agencytools'),
    'slug'      =>  'agency_check',
    'fallback'  =>  '0',
    'info'      =>  __('Show a welcome message', 'agencytools'),
    'type'      =>  ''
);

bcATC_form_checkbox($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Welcome check', 'agencytools'),
    'slug'      =>  'agency_radio2',
    'fallback'  =>  'raduidosi',
    'info'      =>  __('Show a welcome message', 'agencytools'),
    'labels'    =>  array(
        'checkex_this'  =>  __('Checked box1', 'agencytools'),
        'raduidosi'  =>  __('Checked box2', 'agencytools'),
        'dsfsdff'  =>  __('Checked box3', 'agencytools'),
        'tyyrtyt'  =>  __('Checked box4', 'agencytools')
    )
);

bcATC_form_radio($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Welcome check', 'agencytools'),
    'slug'      =>  'agency_radio2',
    'fallback'  =>  'raduidosi',
    'info'      =>  __('Show a welcome message', 'agencytools'),
    'labels'    =>  array(
        'checkex_this'  =>  __('Checked box1', 'agencytools'),
        'raduidosi'  =>  __('Checked box2', 'agencytools'),
        'dsfsdff'  =>  __('Checked box3', 'agencytools'),
        'tyyrtyt'  =>  __('Checked box4', 'agencytools')
    )
);

bcATC_form_select($args); 
// -------------------------------------------
*/

?><table><?php

// -------------------------------------------
$args = array(
    'title'     =>  __("Wordpress Rebranding", 'agencytools')
);
bcATC_subtitle($args);
// -------------------------------------------
?>

<table class="bcATC_forms form-table">
<?php 
// -------------------------------------------
$args = array(
    'title'     =>  __('Logo', 'agencytools'),
    'slug'      =>  'agency_big_logo',
    'fallback'  =>  '0',
    'info'      =>  __('This is the logo that will be visible on your agencies contact page.', 'agencytools'),
    'type'      =>  ''
);
bcATC_form_image($args); 
// -------------------------------------------
$args = array(
    'title'     =>  __('Icon logo', 'agencytools'),
    'slug'      =>  'agency_icon_logo',
    'fallback'  =>  '0',
    'info'      =>  __('This is for the wp-admin header and login page. Recommended dimensions are 150x150px.', 'agencytools'),
    'type'      =>  ''
);
bcATC_form_image($args); 
// -------------------------------------------

?>
</table>

<?php submit_button(); ?>
</form>

</div>