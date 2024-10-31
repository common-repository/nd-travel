<?php

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


//icon destination
$nd_travel_meta_box_destinations = get_post_meta( get_the_ID(), 'nd_travel_meta_box_destinations', true );
$nd_travel_meta_box_icon_cpt_3 = get_post_meta( $nd_travel_meta_box_destinations, 'nd_travel_meta_box_icon_cpt_3', true );
$nd_travel_icon_destination = '';

if ( $nd_travel_meta_box_icon_cpt_3 != '' ) { 

    $nd_travel_icon_destination .= '
        <a style=" background: '.$nd_travel_meta_box_color.'; background: -moz-linear-gradient(left, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%); background: -webkit-linear-gradient(left, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%); background: linear-gradient(to right, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%);" class="nd_travel_border_radius_100_percentage nd_travel_right_20 nd_travel_bottom_25_negative nd_travel_position_absolute nd_travel_height_50 nd_travel_width_50" href="'.$nd_travel_permalink.'">
            <img width="26" class="nd_travel_position_absolute nd_travel_top_12 nd_travel_left_12" src="'.$nd_travel_meta_box_icon_cpt_3.'">
        </a>
    ';

}

//get price
$nd_travel_meta_box_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_price', true );
$nd_travel_meta_box_promotion_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_promotion_price', true );
if ( $nd_travel_meta_box_promotion_price != '' ) { $nd_travel_meta_box_price_classes = 'nd_travel_text_decoration_line_through nd_travel_font_size_20 nd_options_color_grey'; }else{ $nd_travel_meta_box_price_classes = ''; }

if ( $nd_travel_meta_box_price == '' ) { 
    $nd_travel_price = ''; 
    $nd_travel_price_ribbon_sale = '';
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

    $nd_travel_price = '
    <a class="nd_travel_section nd_travel_margin_top_8" href="'.$nd_travel_permalink.'">
        <h2 class="nd_travel_font_weight_normal">
            '.$nd_travel_currency_left_value.' <span class="'.$nd_travel_meta_box_price_classes.'">'.$nd_travel_meta_box_price.'</span> '.$nd_travel_meta_box_promotion_price.' '.$nd_travel_currency_right_value.'
        </h2>
    </a>'; 

    if ( $nd_travel_meta_box_promotion_price != '' ) { 
        $nd_travel_price_ribbon_sale = '<a class=" nd_travel_text_align_center nd_travel_position_absolute nd_travel_top_20 nd_travel_left_20 nd_travel_font_size_13 nd_travel_padding_4_12 nd_travel_padding_top_5 nd_travel_border_radius_30 nd_travel_bg_greydark nd_options_color_white " href="'.$nd_travel_permalink.'">'.__('SALE','nd-travel').'</a>';
    }else{ 
        $nd_travel_price_ribbon_sale = '';
    }
}


//image
if ( has_post_thumbnail() ) { 

    $nd_travel_image_id = get_post_thumbnail_id( $nd_travel_id );
    $nd_travel_image_attributes = wp_get_attachment_image_src( $nd_travel_image_id, $nd_travel_image_size );

    $nd_travel_image = '

        <div style="background-image:url('.$nd_travel_image_attributes[0].');" class="nd_travel_background_size_cover nd_travel_background_position_center nd_travel_background_repeat_no_repeat nd_travel_packages_pg_l5_image nd_travel_vertical_align_middle nd_travel_display_table_cell nd_travel_width_40_percentage nd_travel_position_relative">

            '.$nd_travel_price_ribbon_sale.'
            
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


$nd_travel_shortcode_right_content .= '

<div id="nd_travel_packages_pg_l5_'.$nd_travel_id.'" class="nd_travel_masonry_item nd_travel_width_50_percentage nd_travel_width_100_percentage_responsive">

    <div class="nd_travel_section nd_travel_padding_15 nd_travel_box_sizing_border_box">

        <div class="nd_travel_section nd_travel_display_table nd_travel_border_1_solid_grey nd_travel_bg_white">
            
            '.$nd_travel_image;

            
            $nd_travel_shortcode_right_content .= '
            <div class="nd_travel_vertical_align_middle nd_travel_display_table_cell nd_travel_width_60_percentage nd_travel_padding_30 nd_travel_box_sizing_border_box">

                <a href="'.$nd_travel_permalink.'"><h3 class="nd_travel_packages_pg_l5_title nd_travel_letter_spacing_0">'.$nd_travel_title.'</h3></a>
                <div class="nd_travel_section nd_travel_height_10"></div>
                '.$nd_travel_destination.'
                <div class="nd_travel_section nd_travel_height_20"></div>
        
                <p class="nd_travel_packages_pg_l5_text_preview">'.$nd_travel_meta_box_text_preview.'</p>
                <div class="nd_travel_section nd_travel_height_20"></div>

                <div class="nd_travel_section">

                    <div class="nd_travel_float_left nd_travel_width_50_percentage nd_travel_width_100_percentage_responsive">
                        <a style=" background: '.$nd_travel_meta_box_color.'; background: -moz-linear-gradient(left, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%); background: -webkit-linear-gradient(left, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%); background: linear-gradient(to right, '.$nd_travel_meta_box_color.' 0%, '.$nd_travel_meta_box_color_2.' 100%);" href="'.$nd_travel_permalink.'" class="nd_options_color_white nd_travel_packages_pg_l5_button nd_travel_padding_5_20 nd_options_second_font_important nd_travel_border_radius_30  nd_travel_cursor_pointer nd_travel_display_inline_block">'.__('DETAILS','nd-travel').'</a>
                    </div>

                    <div class="nd_travel_float_left nd_travel_width_50_percentage nd_travel_width_100_percentage_responsive nd_travel_text_align_right nd_travel_text_align_left_responsive">
                        '.$nd_travel_price.'
                    </div>
                    
                </div>

            </div>
        </div>

    </div>

</div>';