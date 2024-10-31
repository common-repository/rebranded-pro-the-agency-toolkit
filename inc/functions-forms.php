<?php
// all the forms

function bcATC_form_input($args){

if(!isset($args['title'])){ $args['title'] = 'Title'; } 
if(!isset($args['slug'])){ $args['slug'] = 'slug-here'; } 
if(!isset($args['fallback'])){ $args['fallback'] = ''; } 
if(!isset($args['info'])){ $args['info'] = ''; }else{ $args['info'] = "<p class='bcATC-infolabel'>".$args['info']."</p>"; }
if(!isset($args['type'])){ $args['type'] = 'text'; } 

if(get_option('bcATC_'.$args['slug'])!=''){
    $args['fallback'] = get_option('bcATC_'.$args['slug']);
}

?>
<tr valign="top">
    <th scope="row">
        <?php echo $args['title']; ?>
    </th>
     <td>
        <input type="text" name="bcATC_<?php echo $args['slug']; ?>" value="<?php echo $args['fallback']; ?>" class="regular-text" />
        <?php echo $args['info']; ?>
    </td>
</tr> 
<?php
}

function bcATC_form_textarea($args){

    if(!isset($args['title'])){ $args['title'] = 'Title'; } 
    if(!isset($args['slug'])){ $args['slug'] = 'slug-here'; } 
    if(!isset($args['fallback'])){ $args['fallback'] = ''; }
    if(!isset($args['info'])){ $args['info'] = ''; }else{ $args['info'] = "<p class='bcATC-infolabel'>".$args['info']."</p>"; }
    if(!isset($args['type'])){ $args['type'] = ''; } // does nothing here
    
    if(get_option('bcATC_'.$args['slug'])!=''){
        $args['fallback'] = get_option('bcATC_'.$args['slug']);
    }
    
    ?>
    <tr valign="top">
        <th scope="row">
            <?php echo $args['title']; ?>
        </th>
         <td>
            <textarea name="bcATC_<?php echo $args['slug']; ?>" class="large-text" rows="10" cols="50"><?php echo $args['fallback']; ?></textarea>
            <?php echo $args['info']; ?>
        </td>
    </tr> 
    <?php
    
}

function bcATC_form_radio($args){
    //print_r($args);

    if(!isset($args['title'])){ $args['title'] = 'Title'; } 
    if(!isset($args['slug'])){ $args['slug'] = 'slug-here'; } 
    if(!isset($args['fallback'])){ $args['fallback'] = ''; }
    if(!isset($args['info'])){ $args['info'] = ''; }else{ $args['info'] = "".$args['info'].""; }
    if(!isset($args['labels'])){ } // this does nothing here
    
    if(get_option('bcATC_'.$args['slug'])!=''){
        $selected_item = get_option('bcATC_'.$args['slug']);
    }else{
        $selected_item = $args['fallback'];
    }
    

    ?>
    <tr valign="top">
        <th scope="row">
            <?php echo $args['title']; ?>
        </th>
         <td>

            <?php foreach($args['labels'] as $value => $title){ 
                if($selected_item==$value){
                    $checked = 'checked';
                }else{
                    $checked = '';
                } 
            ?>
                <label for="bcATC_<?php echo $args['slug']; ?>_<?php echo $value; ?>_label">
                <input type="radio" id="bcATC_<?php echo $args['slug']; ?>_<?php echo $value; ?>_label" name="bcATC_<?php echo $args['slug']; ?>" class="agencyfloatleft" value="<?php echo $value; ?>" <?php echo $checked; ?>/>
                <span><?php echo $title; ?></span>
                </label><br />
            <?php } ?>
            <?php echo $args['info']; ?>
        </td>
    </tr> 
    <?php
    
}

function bcATC_form_select($args){
    //print_r($args);

    if(!isset($args['title'])){ $args['title'] = 'Title'; } 
    if(!isset($args['slug'])){ $args['slug'] = 'slug-here'; } 
    if(!isset($args['fallback'])){ $args['fallback'] = ''; }
    if(!isset($args['info'])){ $args['info'] = ''; }else{ $args['info'] = "<p class='bcATC-infolabel'>".$args['info']."</p>"; }
    if(!isset($args['labels'])){ } // this does nothing here
    
    if(get_option('bcATC_'.$args['slug'])!=''){
        $selected_item = get_option('bcATC_'.$args['slug']);
    }else{
        $selected_item = $args['fallback'];
    }
    

    ?>
    <tr valign="top">
        <th scope="row">
            <?php echo $args['title']; ?>
        </th>
         <td>
            <select name="bcATC_<?php echo $args['slug']; ?>">
            <?php foreach($args['labels'] as $value => $title){ 
                if($selected_item==$value){
                    $checked = 'selected';
                }else{
                    $checked = '';
                } 
            ?>
                <option value="<?php echo $value; ?>" <?php echo $checked; ?>/>
                <?php echo $title; ?>
                </option>
            <?php } ?>
            </select>
            <?php echo $args['info']; ?>
        </td>
    </tr> 
    <?php
    
}

function bcATC_form_image($args){
	$imgid  = (isset( $args[ 'fallback' ] )) ? $args[ 'fallback' ] : "";
	$img    = wp_get_attachment_image_src($imgid, 'thumbnail');

	?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		var $ = jQuery;
		if ($('.<?php echo 'bcATC_'.$args['slug']; ?>').length > 0) {
			if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
				$('.<?php echo 'bcATC_'.$args['slug']; ?>').on('click', function(e) {
					e.preventDefault();
					var button = $(this);
					var id = button.prev();
					wp.media.editor.send.attachment = function(props, attachment) {
						id.val(attachment.id);
					};
					wp.media.editor.open(button);
					return false;
				});
			}
		}
	});
	</script>
    <?php
    if(!isset($args['title'])){ $args['title'] = 'Title'; } 
    if(!isset($args['slug'])){ $args['slug'] = 'slug-here'; } 
    if(!isset($args['fallback'])){ $args['fallback'] = '0'; }
    if(!isset($args['info'])){ $args['info'] = ''; }else{ $args['info'] = "<p class='bcATC-infolabel'>".$args['info']."</p>"; }
    if(!isset($args['labels'])){ } // this does nothing here
    
    if(get_option('bcATC_'.$args['slug'])!=''){
        $args['fallback'] = get_option('bcATC_'.$args['slug']);
    }
    

    ?>
    <tr valign="top">
        <th scope="row">
            <?php echo $args['title']; ?>
        </th>
         <td>


        <?php 
        if($img != "") { ?>
        <div class="bcJANN_thumbnail">
            <img src="<?= $img[0]; ?>" width="80px" />
            <p><?php _e('The currently selected image.','betajanitor'); ?></p>
        </div>
        <p><?php _e('Select a new image or paste a image ID to replace the one above:','betajanitor'); ?></p>

        <?php }else{ ?>
        <p><?php _e('Select an image or paste an image ID:','betajanitor'); ?></p>	
        <?php }	?>
        <input type="text" 
            value="<?php echo $args['fallback']; ?>" 
            class="regular-text process_custom_images" 
            id="process_custom_images" 
            name="<?php echo 'bcATC_'.$args['slug']; ?>" 
            max="" 
            min="1" 
            step="1" />
        <button class="<?php echo 'bcATC_'.$args['slug']; ?> button"><?php _e('Media library','betajanitor'); ?></button>
            <?php echo $args['info']; ?>
        </td>
    </tr> 
    <?php
    
    

}

function bcATC_form_checkbox($args){

    if(!isset($args['title'])){ $args['title'] = 'Title'; } 
    if(!isset($args['slug'])){ $args['slug'] = 'slug-here'; } 
    if(!isset($args['fallback'])){ $args['fallback'] = '0'; }
    if(!isset($args['info'])){ $args['info'] = ''; }else{ $args['info'] = "".$args['info'].""; }
    if(!isset($args['type'])){ $args['type'] = 'checkbox'; } // this does nothing here
    
    if(get_option('bcATC_'.$args['slug'])!=''){
        $args['fallback'] = get_option('bcATC_'.$args['slug']);
    }
    
    if($args['fallback']==1){
        $args['fallback'] = 'checked';
    }else{
        $args['fallback'] = '';
    }

    ?>
    <tr valign="top">
        <th scope="row">
            <?php echo $args['title']; ?>
        </th>
         <td><label for="bcATC_<?php echo $args['slug']; ?>">
            <input type="checkbox" id="bcATC_<?php echo $args['slug']; ?>" name="bcATC_<?php echo $args['slug']; ?>" value="1" class="agencyfloatleft" <?php echo $args['fallback']; ?> />
            <?php echo $args['info']; ?></label>
        </td>
    </tr> 
    <?php
    
}

function bcATC_form_checkbox_loop($args){

    if(!isset($args['title'])){ $args['title'] = 'Title'; } 
    if(!isset($args['slug'])){ $args['slug'] = 'slug-here'; } 
    if(!isset($args['fallback'])){ $args['fallback'] = '0'; }
    if(!isset($args['info'])){ $args['info'] = ''; }else{ $args['info'] = "<p class='bcATC-infolabel'>".$args['info']."</p>"; }
    if(!isset($args['type'])){ $args['type'] = 'checkbox'; } // this does nothing here
    

    
    if($args['fallback']==1){
        $args['fallback'] = 'checked';
    }else{
        $args['fallback'] = '';
    }

    ?>
    <tr valign="top">
        <th scope="row">
            <?php echo $args['title']; ?>
        </th>
         <td>
         <div class="checkbox_loop">
         <?php foreach($args['labels'] as $value => $title){ 
                
                if(get_option('bcATC_'.$args['slug'].'_'.$value)!=''){
                    $args['fallback'] = get_option('bcATC_'.$args['slug'].'_'.$value);
                }else{
                    $args['fallback'] = 0;
                }

                if($args['fallback']==1){
                    $args['fallback'] = 'checked';
                }else{
                    $args['fallback'] = '';
                }
            ?>
                <label for="bcATC_<?php echo $args['slug']; ?>_<?php echo $value; ?>_label">
                <input type="checkbox" id="bcATC_<?php echo $args['slug']; ?>_<?php echo $value; ?>_label" name="bcATC_<?php echo $args['slug'].'_'.$value; ?>" value="1" <?php echo $args['fallback']; ?> />
                <span><?php echo $title; ?></span>
                </label>
            <?php } ?>
            <?php echo $args['info']; ?>
        </div>
        </td>
    </tr> 
    <?php
    
}

function bcATC_subtitle($args){

    ?>
    <div class="bcATC-subtitle">
        <h2><?php echo $args['title']; ?></h2>
    </div>
    <?php
    
}



/* ---------------------------------------------------------- */
// metabox forms

function bcATC_meta_input($meta, $slug, $text='',$placeholder=''){


    if (isset($meta[0][$slug])){
        $metaval = $meta[0][$slug];
    }else{
        $metaval = '';
    }

   ?>
    <label for="bcATC_p[<?php echo $slug; ?>]">
    <input 
        value="<?php if ($metaval!=''){ echo $metaval; }else{ echo $placeholder; } ?>" 
        type="text"
        name="bcATC_p[<?php echo $slug; ?>]"
        id="bcATC_p[<?php echo $slug; ?>]"
        class=""
        style="width: 100%;"
        required

        /><span><?php echo $text; ?></span></label>
    <?php 
}


function bcATC_meta_checkbox($meta, $slug, $text=''){


    if (isset($meta[0][$slug])){
        $metaval = $meta[0][$slug];
    }else{
        $metaval = 0;
    }

   ?>
    <label for="bcATC_p[<?php echo $slug; ?>]">
    <input 
        value="1" 
        type="checkbox"
        name="bcATC_p[<?php echo $slug; ?>]"
        id="bcATC_p[<?php echo $slug; ?>]"
        class=""
        style=""
        <?php if ($metaval==1){ echo 'checked'; } ?>
        /><span><?php echo $text; ?></span></label>
    <?php 
}


function bcATC_meta_checkbox_loop($meta, $args){

    foreach ($args as $arg){
        $slug = $arg['slug'];

        if (isset($meta[0][$slug])){
            $metaval = $meta[0][$slug];
        }else{
            $metaval = 0;
        }
    ?>
    <label for="bcATC_p[<?php echo $slug; ?>]">
    <input 
        value="1" 
        type="checkbox"
        name="bcATC_p[<?php echo $slug; ?>]"
        id="bcATC_p[<?php echo $slug; ?>]"
        class=""
        <?php if ($metaval==1){ echo 'checked'; } ?>
        /><span><?php echo $arg['title']; ?></span></label>
    <?php 
    }  
}



// DISPLAY FUNCTIONS



function atcop($slug,$echo=true){
    if($echo==true){
        echo get_option('bcATC_'.$slug);
    }else{
        return get_option('bcATC_'.$slug);
    }
}

function acimg($id,$echo=true,$size='thumbnail'){
    $imgid =(isset( $id)) ? $id : "";
    $img    = wp_get_attachment_image_src($imgid, $size);
    if($echo==true){
        echo $img[0];
    }else{
        return $img[0];
    }
}




?>