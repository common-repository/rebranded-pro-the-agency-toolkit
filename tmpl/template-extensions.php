
<?php
/* ------------------------ */
/* THE FOOTER.              */

$bcATC_my_plugins = array(
    array(
        'slug'=>'rebranded-pro-the-agency-toolkit',
        'name'=>'Re:Branded Pro | The Agency Toolkit',
        'features'=>'https://betacore.tech/plugins/rebranded-pro-agency-toolkit/',
        'content'=>'This is a total rebranding package for the WordPress admin built for for agencies, designers and website builders. This plugin also protects essential parts of the WordPress installation in order to create an awesome user experience for the client on the WP-admin dashboard. My other plugins (Super Simple Age Gate, Super Simple Site Offline, Simple Analytics Tag) hook right in! So it feels as if they are part of Re:Branded. Or are they?' ),
    array(
        'slug'=>'super-simple-site-offline-beta',
        'name'=>'Super Simple Site Offline',
        'features'=>'https://betacore.tech/plugins/super-simple-site-offline-for-wordpress/',
        'content'=>'Site offline plugins are made awesome again with this piece of code. While most site offline plugins are bulky, intrusive and annoying this one is as light as a feather and has no paid options. The nav item is neatly tucked away within the settings menu so it feels like it is part of WordPress.' ),
    array(
        'slug'=>'super-simple-recaptcha-v3',
        'name'=>'Super Simple Recapthca V3',
        'features'=>'https://betacore.tech/plugins/super-simple-recaptcha-v3/',
        'content'=>'Got spammers? Add Recaptcha V3 in an instant! Works for any contact form. Uses Google Recaptcha V3. A how-to is included.' ),
    array(
        'slug'=>'simple-analytics-tag-beta',
        'name'=>'Simple Analytics Tag',
        'features'=>'https://betacore.tech/plugins/simple-analytics-tag-for-wordpress/',
        'content'=>'Simple Analytics Tag helps you get up and running quick. This plugin has a non-intrusive interface and fits very well within the Wordpress Settings menu. Just paste in the ID from Google Tagmanager or Google Analytics and you are good to go.' ),
    array(
        'slug'=>'super-simple-age-gate-beta',
        'name'=>'Super Simple Age Gate',
        'features'=>'https://betacore.tech/plugins/super-simple-age-gate-for-wordpress/',
        'content'=>"Do you have to filter out younger visitors? With this super simple age gate you'll fix those age restrictions quickly. Ment for webshops and other types of websites that has to have a curtain where people below your set age can't peek behind.." ),
    array(
        'slug'=>'age-checkbox-for-woocommerce',
        'name'=>'Age Checkbox for Woocommerce',
        'features'=>'https://betacore.tech/plugins/age-checkbox-for-woocommerce/',
        'content'=>"Complementary to the Super Simple Age Gate this adds an additional checkbox to the checkout form so customers have to confirm that they are age 18 (you can modify the age) or up." )

);

// get the slug of this plugin
$get_slug = explode('/', plugin_basename( __FILE__ ));
?>
<div class="wrap">
<div class="bcATC_footer">

<div class="bcATC_mailinglist">
<form action="https://oneweekendwebsite.us20.list-manage.com/subscribe/post?u=72e22e9c5e66e05351f6c92af&amp;id=87b9e508b0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
<h2>Are you running Wordpress inefficient? <span>Betacore is developing plugins to fix that!</span></h2>
<p>Get an email when new plugins arrive! The only thing you'll have to do is subscribe to the mailing list now!</p>
<ul class="bcATC_mailingform">
    <li>
        

        <input type="text" value="" name="FNAME" class="" id="mce-FNAME" required>
        <label for="mce-FNAME">First Name</label>
    </li>
    <li>
        
        
        
        <input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL" required/>
        <label for="mce-EMAIL">Email Address</label>
    </li>
    <li>
        <input type="submit" value="Join!" name="subscribe" id="mc-embedded-subscribe" />
    </li>
    

<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_72e22e9c5e66e05351f6c92af_87b9e508b0" tabindex="-1" value=""></div>


</ul>
</form>
</div>
<br />
<h2>Making Wordpress more awesome <span>with useful plugins like these...</span></h2>

<ul class="bcATC_plugins">
<?php foreach($bcATC_my_plugins as $bc_id => $bc_value){ 
if($get_slug[0] != $bc_value['slug']){
?>
<li>
    <img src="<?php echo plugin_dir_url( __DIR__ ).'img/'.$bc_value['slug'].'.png'; ?>" title="<?php echo $bc_value['name']; ?> by Beta" class="bcATC_icon" />
    <h3><a href="https://wordpress.org/plugins/<?php echo $bc_value['slug']; ?>/" target="_blank"><?php echo $bc_value['name']; ?></a></h3>
    <p><?php echo $bc_value['content']; ?></p>
    <a href="https://wordpress.org/plugins/<?php echo $bc_value['slug']; ?>/" class="button" target="_blank"><?php _e('Plugin page'); ?></a>
    <?php if (isset($bc_value['features'])){ ?>
    <a href="<?php echo $bc_value['features']; ?>" class="button" target="_blank"><?php _e('Features'); ?></a>
    <?php } ?>
    <a href="<?php bloginfo('wpurl'); ?>/wp-admin/plugin-install.php?tab=plugin-information&plugin=<?php echo $bc_value['slug']; ?>&TB_iframe=false" class="button button-primary" target="_blank"><?php _e('Install'); ?></a>
</li>

<?php }} ?>
</ul>


<div class="bcATC_logobar">
<a href="https://betacore.tech/plugins/rebranded-pro-agency-toolkit/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
<p class="bcATC_url"><span>By:</span> <a href="https://betacore.tech/plugins/rebranded-pro-agency-toolkit/" target="_blank">www.betacore.tech</a></p>
</div>
</div>