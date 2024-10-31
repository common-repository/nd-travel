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

        <div class="nd_travel_packages_pg_l6_image nd_travel_position_absolute nd_travel_left_0 nd_travel_top_0">

            <img width="100" alt="" class="" src="'.$nd_travel_image_attributes[0].'">

        </div>


    ';
}else{ 
    $nd_travel_image = '';
}



//get destination
$nd_travel_meta_box_destinations = get_post_meta( get_the_ID(), 'nd_travel_meta_box_destinations', true );

if ( $nd_travel_meta_box_destinations == '' ) {
    $nd_travel_destination = '';
}else{

    $nd_travel_destination_title = get_the_title($nd_travel_meta_box_destinations);
    $nd_travel_destination_permalink = get_permalink( $nd_travel_meta_box_destinations );

    $nd_travel_destination = '
    <a href="'.$nd_travel_destination_permalink.'">
        <img width="14" class="nd_travel_float_left nd_travel_margin_right_5" src="'.esc_url(plugins_url('icon-pin-grey.png', __FILE__ )).'">
        <h5 class="nd_options_color_grey nd_travel_font_weight_normal nd_travel_letter_spacing_2">'.$nd_travel_destination_title.'</h5>
    </a>';
}



$str .= '

<div id="nd_travel_packages_pg_l6_'.$nd_travel_id.'" class="nd_travel_masonry_item '.$nd_travel_width.' nd_travel_width_100_percentage_responsive">

    <div style="padding: '.$nd_travel_padding.';" class="nd_travel_section nd_travel_box_sizing_border_box">

        <div class="nd_travel_section nd_travel_position_relative">
            
            '.$nd_travel_image.'

            <div class="nd_travel_section nd_travel_box_sizing_border_box nd_travel_padding_left_130">

                <a href="'.$nd_travel_permalink.'"><h3 class="nd_travel_packages_pg_l6_title nd_travel_margin_top_5 nd_travel_margin_bottom_0_important nd_travel_letter_spacing_0 nd_travel_font_weight_normal_important">'.$nd_travel_title.'</h3></a>
                <div class="nd_travel_section nd_travel_height_10"></div>
                '.$nd_travel_destination.'
                <div class="nd_travel_section nd_travel_height_20"></div>
                <a style=" background: '.$nd_travel_meta_box_color.'; background: -moz-linear-gradient(left, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%); background: -webkit-linear-gradient(left, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%); background: linear-gradient(to right, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%);" href="'.$nd_travel_permalink.'" class="nd_options_color_white nd_travel_packages_pg_l6_button nd_travel_padding_5_20 nd_options_second_font_important nd_travel_border_radius_30  nd_travel_cursor_pointer nd_travel_display_inline_block nd_travel_line_height_14 nd_travel_padding_top_8 ">'.__('FROM','nd-travel').' '.$nd_travel_price.'</a>

            </div>
        </div>

    </div>

</div>';

endwhile;

$str .= '</div>';