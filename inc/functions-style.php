<?php
// style sheet stuff

function bcATC_admin_styles() {
	wp_enqueue_style('beta-agencytools', plugin_dir_url( __DIR__ ).'css/admin.css');
}
add_action('admin_enqueue_scripts', 'bcATC_admin_styles');
add_action('login_enqueue_scripts', 'bcATC_admin_styles');

// top logo branding

function bcATC_branding_top() {
	
	$beta_branding = substr(atcop('agency_icon_logo',false),0,15);

	if($beta_branding!=0){

		$beta_branding_url = acimg(atcop('agency_icon_logo',false),false,'thumbnail');
		
		?>
		<style type="text/css">
			#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				background-image: url('<?php echo $beta_branding_url; ?>') !important;
				background-position: center center;
				background-size: 20px auto;
				background-repeat: no-repeat;
				color:rgba(0, 0, 0, 0);
			}

			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
				background-position: 0 0;
			}
		</style>
		<?php
		
	}
	
}

add_action('wp_before_admin_bar_render', 'bcATC_branding_top');

// adding the colour code

function bcATC_colour_header(){
if(get_option('bcATC_agency_colour_header')!=''){
?><meta name="theme-color" content="<?php echo get_option('bcATC_agency_colour_header'); ?>"/>
<?php
}	
}
add_action('wp_head', 'bcATC_colour_header', 100);

// wp-admin bar on front end

if(get_option('bcATC_agency_wp_bar')==1){

	// just hide
	function hide_admin_bar(){ return false; }
	add_filter( 'show_admin_bar', 'hide_admin_bar' );

}elseif(get_option('bcATC_agency_wp_bar')==2){

	// hide with label
	function hide_admin_bar(){ return false; }
	add_filter( 'show_admin_bar', 'hide_admin_bar' );

	function bcATC_admin_label_css(){
		
		?>
		
		<!-- this is not visible when logged out -->
		<style>
			.bcATC_wp-admin-label{
				position: fixed;
				right: -15px;
				top: 25%;
				width: 50px;
				background-color: #000;
				padding: 10px 10px;
				color: #fff;
				font-size: 14px;
				font-family: arial, helvetical;
				font-weight: lighter;
				opacity: .2;
				text-decoration: none;
				border-radius: 5px 0px 0px 5px;
				transition: all 0.2s ease-in-out;
				
			}

			.bcATC_wp-admin-label:hover{	
				opacity: 0.9;
				right: 0;
				transition: all 0.2s ease-in-out;
			}
		</style>
		<!-- /this is not visible when logged out -->
		<?php
			
	}
	add_action('wp_head', 'bcATC_admin_label_css', 99);


	function bcATC_admin_label_html(){
		
		?>
		
		<!-- this is not visible when logged out -->
		<a href="<?php echo get_site_url(); ?>/wp-admin/" class="bcATC_wp-admin-label">WP<strong>A</strong></a>
		<!-- /this is not visible when logged out -->
		<?php
			
	}
	add_action('wp_footer', 'bcATC_admin_label_html', 99);


}else{

	// else: show
	function hide_admin_bar(){ return true; }
	add_filter( 'show_admin_bar', 'hide_admin_bar' );
}

// login page branding

function bcATC_branding_login() { 
	
	$beta_branding = substr(atcop('agency_big_logo',false),0,15);

	if($beta_branding!=0){

		$beta_branding_url = acimg(atcop('agency_big_logo',false),false,'full');
	
	?> 
	<style type="text/css"> 
	body.login div#login h1 a {

			background-image: url('<?php echo $beta_branding_url; ?>'); 
			background-position: center center!important;
			padding-bottom: 0;
			padding-top: 50px !important;
			background-size: 150px !important;
			width: 200px !important;
			height: 100px !important;
		} 

		.login #backtoblog, .login #nav {
			text-align: center !important;
		}    

	</style>
	<?php 
	}
	
} add_action( 'login_enqueue_scripts', 'bcATC_branding_login' );


function bcATC_widget_status() {

	// wp-admin
	$widgets = array(
		array('name'=>'Wordpress Activity', 'slug'=>'wp_activity','type'=>'normal','wp-slug'=>'dashboard_activity'),
		array('name'=>'Wordpress Right Now', 'slug'=>'wp_rightnow','type'=>'normal','wp-slug'=>'dashboard_right_now'),
		array('name'=>'Wordpress Recent Comments', 'slug'=>'wp_recentcomments','type'=>'normal','wp-slug'=>'dashboard_recent_comments'),
		array('name'=>'Wordpress Incoming Links', 'slug'=>'wp_incominglinks','type'=>'normal','wp-slug'=>'dashboard_incoming_links'),
		array('name'=>'Wordpress Plugins', 'slug'=>'wp_plugins','type'=>'normal','wp-slug'=>'dashboard_plugins'),
		array('name'=>'Dashboard Primary', 'slug'=>'wp_primary','type'=>'side','wp-slug'=>'dashboard_primary'),
		array('name'=>'Dashboard Secondary', 'slug'=>'wp_secondary','type'=>'side','wp-slug'=>'dashboard_secondary'),
		array('name'=>'Dashboard Quick Press', 'slug'=>'wp_quickpress','type'=>'side','wp-slug'=>'dashboard_quick_press'),
		array('name'=>'Dashboard Recent Drafts', 'slug'=>'wp_recentdrafts','type'=>'side','wp-slug'=>'dashboard_recent_drafts'),
		
	);
					 
	foreach($widgets as $name => $value){
		if(get_option('bcATC_agency_widgets_'.$value['slug'])==0){
			remove_meta_box( $value['wp-slug'],   'dashboard', $value['type'] );      //Quick Press widget
		}
	}

}
add_action('wp_dashboard_setup', 'bcATC_widget_status', 999);


/* ---------------------------------------- */
/* enable/disable posts                     */

function bcATC_remove_posts_type(){

	if(get_option('bcATC_agency_wordpress_posts')==0){

		
		remove_menu_page('edit.php');
		
		// maybe need to add more here
		
	}
} 

add_action('admin_menu', 'bcATC_remove_posts_type');


/* ---------------------------------------- */
/* enable/disable links                     */

function bcATC_remove_links_type(){

	if(get_option('bcATC_agency_wordpress_links')==1){
		
		add_filter( 'pre_option_link_manager_enabled', '__return_true' );
        // re-enable the menu item
		
        
    }else{
		
		add_filter( 'pre_option_link_manager_enabled', '__return_false' );
        // double check the false state
        
    }

} 

add_action('admin_menu', 'bcATC_remove_links_type');


/* ---------------------------------------- */
/* enable/disable comments                  */

// from:
// https://gist.github.com/mattclements/eab5ef656b2f946c4bfb
// @mattclements

if(get_option('bcATC_agency_wordpress_comments')==0){
	// Disable support for comments and trackbacks in post types
	function bcATC_disable_comments_post_types_support() {

		$post_types = get_post_types();
		foreach ($post_types as $post_type) {
			if(post_type_supports($post_type, 'comments')) {
				remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}

	}

	add_action('admin_init', 'bcATC_disable_comments_post_types_support');

	// Close comments on the front-end
	function bcATC_disable_comments_status() {
		
		return false;
		
	}
	
	add_filter('comments_open', 'bcATC_disable_comments_status', 20, 2);
	add_filter('pings_open', 'bcATC_disable_comments_status', 20, 2);
	
	// Hide existing comments
	
	function bcATC_disable_comments_hide_existing_comments($comments) {
		
		$comments = array();
		return $comments;
		
	}
	
	add_filter('comments_array', 'bcATC_disable_comments_hide_existing_comments', 10, 2);
	
	// Remove comments page in menu
	function bcATC_disable_comments_admin_menu() {
		
		remove_menu_page('edit-comments.php');
		
	}
	
	add_action('admin_menu', 'bcATC_disable_comments_admin_menu');
	
	// Redirect any user trying to access comments page
	function bcATC_disable_comments_admin_menu_redirect() {
		
		global $pagenow;
		
		if ($pagenow === 'edit-comments.php') {
			wp_redirect(admin_url()); exit;
		}
	}
	
	add_action('admin_init', 'bcATC_disable_comments_admin_menu_redirect');
	
	// Remove comments metabox from dashboard
	function bcATC_disable_comments_dashboard() {
		
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
		
	}
	
	add_action('admin_init', 'bcATC_disable_comments_dashboard');
	// Remove comments links from admin bar
	
	function bcATC_disable_comments_admin_bar() {
		
		if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
		
	}
	
	add_action('init', 'bcATC_disable_comments_admin_bar');

	add_action('admin_menu', 'bcATC_remove_posts_type');

}

// edit lists of custom post types:

function bcATC_remove_items( $actions ) {  
    global $post;
	//echo $post->post_type;
	//echo $post->ID;
    if ($post->post_type=='bcatc_docs') {  
        unset($actions['edit']);
        unset($actions['inline hide-if-no-js']);
    }

    if ($post->post_type=='bcatc_cpt') {  
		unset($actions['title']);
		unset($actions['edit']);
		unset($actions['inline hide-if-no-js']);
    }

    if ($post->post_type=='bcatc_cta') {  
        unset($actions['edit']);
        unset($actions['inline hide-if-no-js']);
    }
    return $actions;
}
add_filter('post_row_actions','bcATC_remove_items',10,1);


?>