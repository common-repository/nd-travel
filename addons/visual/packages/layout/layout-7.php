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

//datas
$nd_travel_meta_box_color = get_post_meta( get_the_ID(), 'nd_travel_meta_box_color', true );
$nd_travel_meta_box_color_2 = get_post_meta( get_the_ID(), 'nd_travel_meta_box_color_2', true );
if ( $nd_travel_meta_box_color == '' ){ $nd_travel_meta_box_color = '#1bbc9b'; }
if ( $nd_travel_meta_box_color_2 == '' ){ $nd_travel_meta_box_color_2 = $nd_travel_meta_box_color; }
$nd_travel_meta_box_text_preview = get_post_meta( get_the_ID(), 'nd_travel_meta_box_text_preview', true );


//get price
$nd_travel_meta_box_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_price', true );
$nd_travel_meta_box_promotion_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_promotion_price', true );


if ( $nd_travel_meta_box_promotion_price != '' ) { 
    $nd_travel_meta_box_real_price = $nd_travel_meta_box_promotion_price;
}else{ 
    $nd_travel_meta_box_real_price = $nd_travel_meta_box_price;   
}


if ( $nd_travel_meta_box_price == '' ) { 
    $nd_travel_price = ''; 
} else { 


    //currency position
    $nd_travel_currency_position = get_option('nd_travel_currency_position');
    if ( $nd_travel_currency_position == 0 ) {
        $nd_travel_currency_right_value = '<span class="">'.nd_travel_get_currency().'</span>';
        $nd_travel_currency_left_value = '';
    }else{
        $nd_travel_currency_left_value = '<span class="">'.nd_travel_get_currency().'</span>';
        $nd_travel_currency_right_value = '';
    }

    $nd_travel_price = $nd_travel_currency_left_value.' '.$nd_travel_meta_box_real_price.' '.$nd_travel_currency_right_value; 


}


//image
if ( has_post_thumbnail() ) { 

    $nd_travel_image_id = get_post_thumbnail_id( $nd_travel_id );
    $nd_travel_image_attributes = wp_get_attachment_image_src( $nd_travel_image_id, $nd_travel_image_size );

    $nd_travel_image = '

        <div class="nd_travel_packages_pg_l7_image">

            <a href="'.$nd_travel_permalink.'"><img alt="" class="nd_travel_section" src="'.$nd_travel_image_attributes[0].'"></a>

            <a style=" background: '.$nd_travel_meta_box_color.'; background: -moz-linear-gradient(left, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%); background: -webkit-linear-gradient(left, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%); background: linear-gradient(to right, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%);" href="'.$nd_travel_permalink.'" class="nd_options_color_white nd_travel_packages_pg_l7_button nd_travel_padding_5_20 nd_options_second_font_important nd_travel_border_radius_30  nd_travel_cursor_pointer nd_travel_display_inline_block nd_travel_line_height_14 nd_travel_padding_top_8 nd_travel_position_absolute nd_travel_right_20 nd_travel_top_20">'.$nd_travel_price.'</a>

        </div>


    ';
}else{ 
    $nd_travel_image = '';
}





$str .= '

<div id="nd_travel_packages_pg_l7_'.$nd_travel_id.'" class="nd_travel_masonry_item '.$nd_travel_width.' nd_travel_width_100_percentage_responsive">

    <div class="nd_travel_section nd_travel_padding_15 nd_travel_box_sizing_border_box">

        <div class="nd_travel_section nd_travel_position_relative">
            
            '.$nd_travel_image.'

        </div>

    </div>

</div>';

endwhile;

$str .= '</div>';