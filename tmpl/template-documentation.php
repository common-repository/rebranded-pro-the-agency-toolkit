<div class="wrap agencywrap">
<h1>Website manual</h1>

<?php
$args = array(
  'post_type'   => 'bcatc_docs',
  'post_status' => 'publish',
 );

$docs = new WP_Query( $args );
if( $docs->have_posts() ) :
?>
<div class="bcATC_docs_wrapper">
<div class="bcATC_docs_sidebar">
      <h3><?php _e("Subjects",'agencytools'); ?></h3>
      <ul class="subjectlist">
    <?php
        while( $docs->have_posts() ) :
            $docs->the_post();
            $slug = get_post_field( 'post_name', get_post() );
            ?>
            <li><a href="#<?php echo $slug; ?>"><?php the_title(); ?></a></li>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
        </ul>
  </div>

  <div class="bcATC_docs_list">
  <p><?php 
  if(get_option('bcATC_agency_information_status')==1){ 
  if(atcop('agency_welcome',false)!=''){ ?></p>
<div class="bcATC_docs_welcome">
<?php if(atcop('agency_name',false)!=''){ ?>
  <h2 class="headelement"><?php atcop('agency_name'); ?></h2>
<?php } ?>
<?php if(atcop('agency_big_logo',false)!=''){ ?>
    <div class="agencylogo"><img src="<?php acimg(atcop('agency_big_logo',false),true,'full'); ?>" /></div>
<?php }
} ?>
<p><?php atcop('agency_welcome'); ?></p>

</div>
<?php } ?>
    <?php
      while( $docs->have_posts() ) :
        $docs->the_post();
        $slug = get_post_field( 'post_name', get_post() );
        ?>
          <article id="<?php echo $slug; ?>">
          <h2 class="headelement"><?php the_title(); ?></h1>
          <section>
          <?php the_content(); ?></section>
          </article>
        <?php
      endwhile;
      wp_reset_postdata();
    ?>
  </div>
  
</div>
<?php
else :
    ?>
    <div class="bcATC_nothing-found">

    <h2><?php esc_html_e( 'No documentation found... yet.', 'agencytools' ); ?></h2>
    </div>
    <?php
endif;
?>
</div>