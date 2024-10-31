<div class="wrap agencywrap">
<h1><?php _e('Contact details', 'agencytools'); ?></h1>

<div class="bcATC_docs_wrapper">
<div class="bcATC_docs_sidebar">

<ul class="bcATC_buttonlist">
<?php if(atcop('agency_content',false)!=''){ ?>
    <li><a href="mailto:<?php atcop('agency_content'); ?>"><?php _e('Order content', 'agencytools'); ?></a></li>
<?php } ?>
<?php if(atcop('agency_support',false)!=''){ ?>
    <li><a href="mailto:<?php atcop('agency_support'); ?>"><?php _e('Email support', 'agencytools'); ?></a></li>
<?php } ?>
<?php if(atcop('agency_sales',false)!=''){ ?>
    <li><a href="mailto:<?php atcop('agency_sales'); ?>"><?php _e('Email sales', 'agencytools'); ?></a></li>
<?php } ?>
</ul>

</div>
<div class="bcATC_docs_list">
  <p><?php if(atcop('agency_welcome',false)!=''){ ?></p>
<div class="bcATC_docs_welcome">
<?php if(atcop('agency_name',false)!=''){ ?>
  <h2 class="headelement"><?php atcop('agency_name'); ?></h2>
<?php } ?>
<?php if(atcop('agency_big_logo',false)!=''){ ?>
    <div class="agencylogo"><img src="<?php acimg(atcop('agency_big_logo',false),true,'full'); ?>" /></div>
<?php } ?>
<p><?php atcop('agency_welcome'); ?></p>

</div>
<?php } ?>

<ul class="bcATC_gridlist">
<?php if(atcop('agency_contact',false)!=''){ ?>
    <li><span><?php _e('Contact:', 'agencytools'); ?></span><span class="agencydetails"><?php atcop('agency_contact'); ?></span></li>
<?php } ?>
<?php if(atcop('agency_email',false)!=''){ ?>
    <li><span><?php _e('Email:', 'agencytools'); ?></span><span class="agencydetails"><?php atcop('agency_email'); ?></span></li>
<?php } ?>
<?php if(atcop('agency_phone',false)!=''){ ?>
    <li><span><?php _e('Call:', 'agencytools'); ?></span><span class="agencydetails"><?php atcop('agency_phone'); ?></span></li>
<?php } ?>
<?php if(atcop('agency_content',false)!=''){ ?>
    <li><span><?php _e('Order content:', 'agencytools'); ?></span><span class="agencydetails"><?php atcop('agency_content'); ?></span></li>
<?php } ?>
<?php if(atcop('agency_support',false)!=''){ ?>
    <li><span><?php _e('Email support:', 'agencytools'); ?></span><span class="agencydetails"><?php atcop('agency_support'); ?></span></li>
<?php } ?>
<?php if(atcop('agency_sales',false)!=''){ ?>
    <li><span><?php _e('Email sales:', 'agencytools'); ?></span><span class="agencydetails"><?php atcop('agency_sales'); ?></span></li>
<?php } ?>
<?php if(atcop('agency_welcome',false)!=''){ ?>
    <li><span><?php _e('Welcome message', 'agencytools'); ?></span><span class="agencydetails"><?php atcop('agency_welcome'); ?></span></li>
<?php } ?>
</ul>
</div>
</div>
</div>