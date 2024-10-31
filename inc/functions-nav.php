<?php


/* ---------------------------------------- */
/* Setting up the navigation                */

// this button is for the agency where all the settings house


function bcATC_admin_main_nav() {
    add_menu_page( 
		__('Branding','agencytools'), 
		__('Branding','agencytools'), 
		'manage_options', 
		'bcATC_agency', 
		'bcATC_agency_fb', 
		'dashicons-tickets-alt', 
		75  
	);
	
}
add_action( 'admin_menu', 'bcATC_admin_main_nav' );

function bcATC_admin_sub_nav() {

	add_submenu_page( 
		'bcATC_agency', 
		__('Settings', 'agencytools'), 
		__('Settings', 'agencytools'), 
		'manage_options', 
		'bcATC_settings', 
		'bcATC_settings_fb'  // this should correspond with the function name
	); 
	if(get_option('bcATC_agency_documentation_status')==1){
	add_submenu_page( 
		'bcATC_agency', 
		__('Documentation', 'agencytools'), 
		__('Documentation', 'agencytools'), 
		'manage_options', 
		'edit.php?post_type=bcatc_docs'
	); 
	}

	if(is_plugin_active( 'simple-analytics-tag-beta/simple-analytics-tag.php' )){
		add_submenu_page( 
			'bcATC_agency', 
			__('Analytics Tag', 'agencytools'), 
			__('Analytics Tag', 'agencytools'), 
			'manage_options', 
			'bcATC_analytics', 
			'bcSANY_function_for_analytics'  // this should correspond with the function name
		); 
	}

	if(is_plugin_active( 'super-simple-recaptcha-v3/ssrv3.php' )){
		add_submenu_page( 
			'bcATC_agency', 
			__('Recaptcha V3', 'agencytools'), 
			__('Recaptcha V3', 'agencytools'), 
			'manage_options', 
			'bcRECV_recaptcha', 
			'bcRECV_function_for_recaptcha'  // this should correspond with the function name
		); 
	}

	if(is_plugin_active( 'super-simple-site-offline-beta/simple-site-offline-beta.php' )){
		add_submenu_page( 
			'bcATC_agency', 
			__('Site Offline', 'agencytools'), 
			__('Site Offline', 'agencytools'), 
			'manage_options', 
			'bcATC_site_offline', 
			'bcSOFF_function_for_sub'  // this should correspond with the function name
		); 
	}

	if(is_plugin_active( 'super-simple-age-gate-beta/simple-age-gate.php' )){
		add_submenu_page( 
			'bcATC_agency', 
			__('Age Gate', 'agencytools'), 
			__('Age Gate', 'agencytools'), 
			'manage_options', 
			'bcATC_age_gate', 
			'bcAGGT_function_for_sub'  // this should correspond with the function name
		); 
	}

	add_submenu_page( 
		'bcATC_agency', 
		__('Extensions', 'agencytools'), 
		__('Extensions', 'agencytools'), 
		'manage_options', 
		'bcATC_extensions', 
		'bcATC_extensions_fb'  // this should correspond with the function name
	); 
	
}
add_action( 'admin_menu', 'bcATC_admin_sub_nav' );


// this button keeps the docs information available for the client
if(get_option('bcATC_agency_documentation_status')==1){
function bcATC_user_docs_nav() {
    add_menu_page( 
		__('Documentation','agencytools'), 
		__('Documentation','agencytools'), 
		'read', 
		'bcATC_docs', 
		'bcATC_docs_fb', 
		'dashicons-lightbulb', 
		2  
	);
}
add_action( 'admin_menu', 'bcATC_user_docs_nav' );

function bcATC_user_sub_nav() {


	if(get_option('bcATC_agency_information_status')==1){
		if(atcop('agency_name',false)!=''){ 
			$agency_name = atcop('agency_name', false);  
		}else{
			$agency_name = __('Contact','agencytools'); 
		}

		
		// toggle
		add_submenu_page( 
			'bcATC_docs', 
			$agency_name, 
			$agency_name, 
			'read', 
			'bcATC_contact', 
			'bcATC_contact_fb'  // this should correspond with the function name
		); 
	}
	
	
}
add_action( 'admin_menu', 'bcATC_user_sub_nav' );

}else{
	// when documentation is disabled


	
	if(get_option('bcATC_agency_information_status')==1){
		function bcATC_user_prof_nav() {

			if(atcop('agency_name',false)!=''){ 
				$agency_name = atcop('agency_name', false);  
			}else{
				$agency_name = __('Contact','agencytools'); 
			}

			add_menu_page( 
				$agency_name, 
				$agency_name, 
				'edit_posts', 
				'bcATC_contact', 
				'bcATC_contact_fb',  // this should correspond with the function name
				'dashicons-awards',
				2
			);
		}
		add_action( 'admin_menu', 'bcATC_user_prof_nav' );
	}
	



}

/* ---------------------------------------- */
/* This is the tabbed navigation on the     */
/* plugin page.                             */

function bcATC_nav_tabs($arg){

    $active_tab_html = '';

if( isset( $_GET[ 'tab' ] ) ) {
    
	$active_tab = substr($_GET[ 'tab' ],0,20);
}else{
    $active_tab = '';   
}
    
?><h2 class="nav-tab-wrapper"><?php
	
	foreach($arg['options'] as $name => $value){
		
		if($active_tab==''){
			if ($arg['default'] == $value['slug']){ $active_tab_html = ' nav-tab-active'; }	
		}else{
			if ($active_tab == $value['slug']){ $active_tab_html = ' nav-tab-active'; }
		}
		
		?>
        <a href="?page=<?php echo $arg['func_url'];?>&tab=<?php echo $value['slug']; ?>" 
		   class="nav-tab<?php echo  $active_tab_html; ?>">
			<?php echo $value['name']; ?>
		</a>
		<?php
		$active_tab_html = '';
	}
	
?></h2><?php
}


/* ---------------------------------------- */
/* And a safer return value from GET var    */
/* for the if/else structure that makes     */
/* up the page.                             */

function bcATC_this_tab(){
    
    $active_tab = '';
    
	if( isset( $_GET[ 'tab' ] ) ) {
		$active_tab = substr($_GET[ 'tab' ],0,20);
	}
	return $active_tab;
}


/* ---------------------------------------- */
/* remove the analytics and offline plugin  */
/* nav so they are embedded in the janitor  */

function bcATC_remove_supportplug_nav() {
    remove_submenu_page( 'options-general.php', 'bcSOFF_offline_settings' );
	remove_submenu_page( 'options-general.php', 'bcSANY_analytics' );
	remove_submenu_page( 'options-general.php', 'bcSCHM_gate_settings' );
	remove_submenu_page( 'options-general.php', 'bcRECV_recaptcha' );

}

add_action( 'admin_init', 'bcATC_remove_supportplug_nav' );




?>
