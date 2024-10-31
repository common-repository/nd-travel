<?php


wp_enqueue_script('masonry');

$str .= '

	<script type="text/javascript">
    //<![CDATA[
    
    jQuery(document).ready(function() {

      //START masonry
      jQuery(function ($) {
        
        //Masonry
    		var $nd_travel_masonry_content = $(".nd_travel_masonry_content").imagesLoaded( function() {
    		  // init Masonry after all images have loaded
    		  $nd_travel_masonry_content.masonry({
    		    itemSelector: ".nd_travel_masonry_item"
    		  });
    		});

      });
      //END masonry

    });

    //]]>
  </script>

';


$str .= '<div class="nd_travel_section nd_travel_masonry_content '.$nd_travel_class.' ">';

while ( $the_query->have_posts() ) : $the_query->the_post();

//default
$nd_travel_title = get_the_title();
$nd_travel_id = get_the_ID();
$nd_travel_permalink = get_permalink( $nd_travel_id );
$nd_travel_meta_box_cpt_2_icon = get_post_meta( get_the_ID(), 'nd_travel_meta_box_cpt_2_icon', true );


//image
if ( has_post_thumbnail() ) { 

    $nd_travel_image_id = get_post_thumbnail_id( $nd_travel_id );
    $nd_travel_image_attributes = wp_get_attachment_image_src( $nd_travel_image_id );

    $nd_travel_image = '
        <a href="'.$nd_travel_permalink.'"><img width="40" src="'.$nd_travel_image_attributes[0].'"></a>
        <div class="nd_travel_section nd_travel_height_5"></div>
    ';

}else{ 
    $nd_travel_image = '';
}


$str .= '

<div id="nd_travel_typologies_pg_l1_'.$nd_travel_id.'" class="nd_travel_masonry_item '.$nd_travel_width.' nd_travel_width_100_percentage_responsive">

    <div style="padding:'.$nd_travel_margin.';" class="nd_travel_section nd_travel_box_sizing_border_box">

        <div style="padding:'.$nd_travel_padding.'; background:'.$nd_travel_bg_color.'" class="nd_travel_section nd_travel_bg_greydark nd_travel_text_align_center nd_travel_box_sizing_border_box">

            '.$nd_travel_image.'
           
            <a href="'.$nd_travel_permalink.'"><h6 class="nd_travel_font_weight_normal nd_travel_letter_spacing_2 nd_travel_font_size_11 nd_travel_text_transform_uppercase nd_options_color_white">'.$nd_travel_title.'</h6></a>
    
        </div>

    </div>

</div>';

endwhile;

$str .= '</div>';