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
        $nd_travel_price_ribbon_sale = '<a class=" nd_travel_text_align_center nd_travel_position_absolute nd_travel_top_20 nd_travel_right_20 nd_travel_font_size_13 nd_travel_padding_4_12 nd_travel_padding_top_5 nd_travel_border_radius_30 nd_travel_bg_greydark nd_options_color_white " href="'.$nd_travel_permalink.'">'.__('SALE','nd-travel').'</a>';
    }else{ 
        $nd_travel_price_ribbon_sale = '';
    }
}


//image
if ( has_post_thumbnail() ) { 

    $nd_travel_image_id = get_post_thumbnail_id( $nd_travel_id );
    $nd_travel_image_attributes = wp_get_attachment_image_src( $nd_travel_image_id,'large');

    $nd_travel_image = '

        <div class="nd_travel_packages_pg_l5_image nd_travel_section nd_travel_position_relative">

            '.$nd_travel_price_ribbon_sale.'
            
            <img alt="" class="nd_travel_section" src="'.$nd_travel_image_attributes[0].'">

            '.$nd_travel_icon_destination.'

        </div>


    ';
}else{ 
    $nd_travel_image = '';
}




$nd_travel_shortcode_right_content .= '

<div id="nd_travel_packages_pg_l5_'.$nd_travel_id.'" class="nd_travel_masonry_item nd_travel_width_33_percentage nd_travel_width_100_percentage_responsive">

    <div class="nd_travel_section nd_travel_padding_15 nd_travel_box_sizing_border_box">

        <div class="nd_travel_section nd_travel_border_1_solid_grey nd_travel_bg_white">
            
            '.$nd_travel_image.'

            ';


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

            
            //get first typology
            $nd_travel_meta_box_typologies = get_post_meta( get_the_ID(), 'nd_travel_meta_box_typologies', true );

            if ( $nd_travel_meta_box_typologies == '' ) {
                $nd_travel_typology = '';
            }else{

                $nd_travel_meta_box_typologies_array = explode(',',$nd_travel_meta_box_typologies);

                $nd_travel_number_typologies = count($nd_travel_meta_box_typologies_array)-1;

                if ( $nd_travel_number_typologies > 2 ) {
                
                    $nd_travel_all_typologies = '';

                    for ($mul = 2; $mul <= $nd_travel_number_typologies-1; ++$mul) {

                        $nd_travel_page_by_path_2 = get_page_by_path($nd_travel_meta_box_typologies_array[$mul],OBJECT,'nd_travel_cpt_2');
                        $nd_travel_typology_id = $nd_travel_page_by_path_2->ID;
                        $nd_travel_typology_title = get_the_title($nd_travel_typology_id);
                        $nd_travel_typology_permalink = get_permalink( $nd_travel_typology_id );

                        $nd_travel_all_typologies .= '<a class="nd_travel_display_block nd_travel_padding_5_12" href="'.$nd_travel_typology_permalink.'"><p class="nd_travel_line_height_16 nd_travel_font_size_11 nd_options_color_white">'.$nd_travel_typology_title.'</p></a>';
                    }

                    $nd_travel_all_typologies_container = '
                    <div class="nd_travel_typologies_dropdown nd_travel_position_absolute nd_travel_display_none nd_travel_top_20 nd_travel_left_0  ">
                        
                        <div class="nd_travel_triangle_typologies_dark"></div>    

                        <div class="nd_travel_bg_greydark nd_travel_border_top_width_0_important">
                            '.$nd_travel_all_typologies.'
                        </div>
                        
                    </div>';

                    //plus number count other typologyes and dotted
                    $nd_travel_number_typologies_display = '
                    <span style="background-color:'.$nd_travel_meta_box_color.'" class="nd_options_color_white nd_travel_typologies_count nd_travel_position_relative nd_travel_font_size_10 nd_travel_margin_left_5 nd_travel_padding_2_8 nd_travel_line_height_14  nd_travel_border_radius_30">
                        + '.($nd_travel_number_typologies-2).'
                        '.$nd_travel_all_typologies_container.'
                    </span>';
                    $nd_travel_other_typologies_dotted = '...';

                }else{
                    $nd_travel_number_typologies_display = '';
                    $nd_travel_other_typologies_dotted = '';
                    $nd_travel_all_typologies_container = '';
                }

                //get info of the first typology
                $nd_travel_page_by_path_2 = get_page_by_path($nd_travel_meta_box_typologies_array[0],OBJECT,'nd_travel_cpt_2');
                $nd_travel_typology_id = $nd_travel_page_by_path_2->ID;
                $nd_travel_typology_title = get_the_title($nd_travel_typology_id);
                $nd_travel_typology_permalink = get_permalink( $nd_travel_typology_id );


                //second typology
                $nd_travel_typology_2_content = '';
                if ( $nd_travel_number_typologies > 1 ) {

                    //get info of the second typology
                    $nd_travel_page_by_path_2_2 = get_page_by_path($nd_travel_meta_box_typologies_array[1],OBJECT,'nd_travel_cpt_2');
                    $nd_travel_typology_id_2 = $nd_travel_page_by_path_2_2->ID;
                    $nd_travel_typology_title_2 = get_the_title($nd_travel_typology_id_2);
                    $nd_travel_typology_permalink_2 = get_permalink( $nd_travel_typology_id_2 );

                    //content
                    $nd_travel_typology_2_content .= '

                        <!--second-->
                        <div class="nd_travel_section">
                            <a class="nd_travel_display_inline_block" href="'.$nd_travel_typology_permalink_2.'">
                                <h6 class="nd_travel_display_inline_block nd_travel_font_weight_normal nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase">'.$nd_travel_typology_title_2.'</h6>
                            </a>

                            '.$nd_travel_number_typologies_display .'

                        </div>

                    ';
                
                }

                

                $nd_travel_typology = '
                <div class="nd_travel_position_relative nd_travel_packages_pg_l5_typology nd_travel_float_left nd_travel_width_100_percentage nd_travel_box_sizing_border_box">
                    <span class=" nd_travel_position_relative nd_travel_section">
                        
                        <!--first-->
                        <a class="nd_travel_section" href="'.$nd_travel_typology_permalink.'"><h6 class="nd_travel_font_weight_normal nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase">'.$nd_travel_typology_title.'</h6></a>
                        
                        '.$nd_travel_typology_2_content.'

                    </span>
                </div> 
                ';
            }

            $nd_travel_shortcode_right_content .= '
            <div class="nd_travel_section nd_travel_padding_30 nd_travel_box_sizing_border_box">

                <a href="'.$nd_travel_permalink.'"><h3 class="nd_travel_packages_pg_l5_title nd_travel_letter_spacing_0">'.$nd_travel_title.'</h3></a>
                <div class="nd_travel_section nd_travel_height_10"></div>
                '.$nd_travel_destination.'

                <div class="nd_travel_section nd_travel_height_20"></div>
                <div class="nd_travel_section">
                    <div class="nd_travel_section nd_travel_height_1 nd_travel_border_bottom_1_solid_grey"></div>
                    <div class="nd_travel_section nd_travel_height_15"></div>
                    <div class="nd_travel_float_left nd_travel_width_50_percentage nd_travel_width_100_percentage_responsive">
                        '.$nd_travel_typology.' 
                    </div>
                    <div class="nd_travel_float_left nd_travel_width_50_percentage nd_travel_width_100_percentage_responsive nd_travel_text_align_right nd_travel_text_align_left_responsive">
                        '.$nd_travel_price.'
                    </div>
                    
                    <div class="nd_travel_section nd_travel_height_10"></div>
                    <div class="nd_travel_section nd_travel_height_1 nd_travel_border_bottom_1_solid_grey"></div>
                </div>
                <div class="nd_travel_section nd_travel_height_20"></div>
                

                <p class="nd_travel_packages_pg_l5_text_preview">'.$nd_travel_meta_box_text_preview.'</p>
                <div class="nd_travel_section nd_travel_height_20"></div>
                <a style="background-color:'.$nd_travel_meta_box_color.';" href="'.$nd_travel_permalink.'" class="nd_options_color_white nd_travel_packages_pg_l5_button nd_travel_padding_5_20 nd_options_second_font_important nd_travel_border_radius_30  nd_travel_cursor_pointer nd_travel_display_inline_block">'.__('DETAILS','nd-travel').'</a>

            </div>
        </div>

    </div>

</div>';