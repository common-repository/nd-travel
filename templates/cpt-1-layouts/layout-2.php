<?php


//get datas
$nd_travel_meta_box_color = get_post_meta( get_the_ID(), 'nd_travel_meta_box_color', true );
if ( $nd_travel_meta_box_color == '' ){ $nd_travel_meta_box_color = '#1bbc9b'; }
$nd_travel_meta_box_featured_image_replace = get_post_meta( get_the_ID(), 'nd_travel_meta_box_featured_image_replace', true );


//decide sidebar or not
$nd_travel_meta_box_page_sidebar = get_post_meta( get_the_ID(), 'nd_travel_meta_box_page_sidebar', true );

if ( $nd_travel_meta_box_page_sidebar == 'nd_travel_meta_box_page_layout_full_width' ) {
	$nd_travel_single_cpt_1_content_width = 'nd_travel_width_100_percentage nd_travel_width_100_percentage_responsive';
}else{
	$nd_travel_single_cpt_1_content_width = 'nd_travel_width_66_percentage nd_travel_width_100_percentage_responsive';
}


//get price
$nd_travel_meta_box_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_price', true );
$nd_travel_meta_box_promotion_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_promotion_price', true );
if ( $nd_travel_meta_box_promotion_price != '' ) { $nd_travel_meta_box_price_classes = 'nd_travel_text_decoration_line_through nd_travel_opacity_06 nd_travel_font_size_20'; }else{ $nd_travel_meta_box_price_classes = ''; }

if ( $nd_travel_meta_box_price == '' ) { 
    $nd_travel_price = ''; 
    $nd_travel_price_ribbon_sale = '';
} else { 

    //currency position
    $nd_travel_currency_position = get_option('nd_travel_currency_position');
    if ( $nd_travel_currency_position == 0 ) {
        $nd_travel_currency_right_value = '<span class="nd_travel_font_size_20">'.nd_travel_get_currency().'</span>';
        $nd_travel_currency_left_value = '';
    }else{
        $nd_travel_currency_left_value = '<span class="nd_travel_font_size_20">'.nd_travel_get_currency().'</span>';
        $nd_travel_currency_right_value = '';
    }

    $nd_travel_price = $nd_travel_currency_left_value.' <span class="'.$nd_travel_meta_box_price_classes.'">'.$nd_travel_meta_box_price.'</span> '.$nd_travel_meta_box_promotion_price.' '.$nd_travel_currency_right_value; 

    if ( $nd_travel_meta_box_promotion_price != '' ) { 
        $nd_travel_price_ribbon_sale = '
        	<a class=" nd_travel_border_radius_30 nd_travel_top_12_negative nd_travel_padding_top_7 nd_travel_padding_5_20 nd_travel_letter_spacing_2 nd_travel_font_size_14 nd_travel_line_height_14 nd_travel_text_align_center nd_travel_position_absolute  nd_travel_right_20 nd_travel_bg_greydark nd_options_color_white" href="'.get_permalink(get_the_ID()).'">
        		'.__('SALE','nd-travel').'
        	</a>';
    }else{ 
        $nd_travel_price_ribbon_sale = '';
    }
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
        <img width="14" class="nd_travel_float_left nd_travel_margin_right_10" src="'.esc_url(plugins_url('icon-pin-white.png', __FILE__ )).'">
        <h5 class="nd_options_color_white nd_travel_float_left nd_travel_font_weight_normal nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase">'.$nd_travel_destination_title.'</h5>
    </a>';
}




//START image or custom content
if ( $nd_travel_meta_box_featured_image_replace == '' ) {
    
    if ( has_post_thumbnail() ) { 

        $nd_travel_image_id = get_post_thumbnail_id( get_the_ID() );
        $nd_travel_image_attributes = wp_get_attachment_image_src( $nd_travel_image_id, 'large' );

        $nd_travel_image = '

            <div class="nd_travel_single_cpt_1_t_image_l2 nd_travel_section">            
                <img alt="" class="nd_travel_section" src="'.$nd_travel_image_attributes[0].'">
            </div>

        ';
    }else{ 
        $nd_travel_image = '';
    }

}else{

    $nd_travel_image = do_shortcode($nd_travel_meta_box_featured_image_replace); 

}
//END


//get durations
$nd_travel_durations_list = '';
$nd_travel_durations_lista = '';
$nd_travel_durations = get_the_terms(get_the_ID(),'nd_travel_cpt_1_tax_1');
if ( $nd_travel_durations != null ) {

	$nd_travel_durations_list .= '<img width="14" class="nd_travel_float_left nd_travel_margin_right_10" src="'.esc_url(plugins_url('icon-time-white.png', __FILE__ )).'">';

	foreach( $nd_travel_durations as $nd_travel_duration ){
		$nd_travel_durations_list .= $nd_travel_duration->name.', ';
	}

	$nd_travel_duration_lista = substr($nd_travel_durations_list, 0, -2);

}

//get diff
$nd_travel_difficulty_list = '';
$nd_travel_difficulty_lista = '';
$nd_travel_difficulties = get_the_terms(get_the_ID(),'nd_travel_cpt_1_tax_2');
if ( $nd_travel_difficulties != null ) {

	foreach( $nd_travel_difficulties as $nd_travel_difficulty ){
		$nd_travel_difficulty_list .= $nd_travel_difficulty->name.', ';
	}

	$nd_travel_difficulty_lista = substr($nd_travel_difficulty_list, 0, -2);

}

//get min ages
$nd_travel_minages_list = '';
$nd_travel_minages_lista = '';
$nd_travel_minages = get_the_terms(get_the_ID(),'nd_travel_cpt_1_tax_3');
if ( $nd_travel_minages != null ) {

	foreach( $nd_travel_minages as $nd_travel_minage ){
		$nd_travel_minages_list .= $nd_travel_minage->name.', ';
	}

	$nd_travel_minages_lista = substr($nd_travel_minages_list, 0, -2);

}



//get typologies
$nd_travel_meta_box_typologies = get_post_meta( get_the_ID(), 'nd_travel_meta_box_typologies', true );

if ( $nd_travel_meta_box_typologies == '' ) {
    $nd_travel_typology = '';
}else{

    $nd_travel_meta_box_typologies_array = explode(',',$nd_travel_meta_box_typologies);

    $nd_travel_number_typologies = count($nd_travel_meta_box_typologies_array)-1;

    if ( $nd_travel_number_typologies > 1 ) {
    
        $nd_travel_all_typologies = '';

        for ($mul = 1; $mul <= $nd_travel_number_typologies-1; ++$mul) {

            $nd_travel_page_by_path_2 = get_page_by_path($nd_travel_meta_box_typologies_array[$mul],OBJECT,'nd_travel_cpt_2');
            $nd_travel_typology_id = $nd_travel_page_by_path_2->ID;
            $nd_travel_typology_title = get_the_title($nd_travel_typology_id);
            $nd_travel_typology_permalink = get_permalink( $nd_travel_typology_id );

            $nd_travel_all_typologies .= '<a class="nd_travel_display_block nd_travel_padding_5_12" href="'.$nd_travel_typology_permalink.'"><p class="nd_travel_line_height_16 nd_travel_font_size_11 nd_options_color_white">'.$nd_travel_typology_title.'</p></a>';
        }

        $nd_travel_all_typologies_container = '
        <div class="nd_travel_typologies_dropdown nd_travel_position_absolute nd_travel_z_index_9 nd_travel_display_none nd_travel_top_20 nd_travel_left_0  ">
            
            <div class="nd_travel_triangle_typologies_dark"></div>    

            <div class="nd_travel_bg_greydark nd_travel_border_top_width_0_important">
                '.$nd_travel_all_typologies.'
            </div>
            
        </div>';

        //plus number count other typologyes and dotted
        $nd_travel_number_typologies_display = '
        <span style="background-color:'.$nd_travel_meta_box_color.'" class="nd_options_color_white nd_travel_float_left nd_travel_typologies_count nd_travel_position_relative nd_travel_font_size_10 nd_travel_margin_left_10 nd_travel_margin_top_4 nd_travel_padding_2_8 nd_travel_line_height_14  nd_travel_border_radius_30">
            + '.($nd_travel_number_typologies-1).'
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

        //content
        $nd_travel_typology_2_content .= $nd_travel_number_typologies_display;
       
    }

    $nd_travel_typology = '
    <div class="nd_travel_position_relative nd_travel_packages_pg_l5_typology nd_travel_float_left nd_travel_width_100_percentage nd_travel_box_sizing_border_box">
        <span class=" nd_travel_position_relative nd_travel_section">
            
            <p class="nd_travel_float_left">'.$nd_travel_typology_title.'</p>
            
            '.$nd_travel_typology_2_content.'

        </span>
    </div> 
    ';
}
//END get typologies



















//START HEADER IMAGE
$nd_travel_meta_box_image = get_post_meta( get_the_ID(), 'nd_travel_meta_box_image', true );

if ( $nd_travel_meta_box_image != '' ) {

	$nd_travel_meta_box_image_position = get_post_meta( get_the_ID(), 'nd_travel_meta_box_image_position', true );	

	$nd_travel_result .= '
	<div id="nd_travel_single_cpt_1_header_image_l2" class="nd_travel_section nd_travel_background_size_cover '.$nd_travel_meta_box_image_position.' " style="background-image:url('.$nd_travel_meta_box_image.');">

        <div class="nd_travel_section nd_travel_bg_greydark_alpha_3">';

            if ( nd_travel_get_container() != 1) {  $nd_travel_result .= '<div class="nd_travel_container nd_travel_box_sizing_border_box nd_travel_clearfix">'; }

            	$nd_travel_result .= '
            	<div class="nd_travel_section nd_travel_box_sizing_border_box nd_travel_padding_0_15">
            		
            		<div id="nd_travel_single_cpt_1_header_image_space_top" class="nd_travel_section nd_travel_height_200"></div>
	            	
	            	<h1 class="nd_options_color_white nd_travel_font_size_35 nd_travel_letter_spacing_0">'.get_the_title(get_the_ID()).'</h1>
	            	<div class="nd_travel_section nd_travel_height_20"></div>
	            	
	            	<div id="nd_travel_single_cpt_1_header_image_l2_info" class="nd_travel_section">
	            		<div class="nd_travel_float_left">'.$nd_travel_destination.'</div>
	            		<div class="nd_travel_float_left nd_travel_margin_left_30">
	            			<h5 class="nd_options_color_white nd_travel_float_left nd_travel_margin_right_10 nd_travel_font_weight_normal nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase">'.$nd_travel_duration_lista.'</h5>
	            		</div>
	            	</div>
	            	
	            	<div id="nd_travel_single_cpt_1_header_image_space_bottom" class="nd_travel_section nd_travel_height_50"></div>
            	
            	</div>
            	';

            if ( nd_travel_get_container() != 1 ) { $nd_travel_result .= '</div>'; }

        $nd_travel_result .= '
        </div>

    </div>';

}
//END HEADER IMAGE




//START INFO PACKAGE
$nd_travel_result .= '
<div class="nd_travel_single_cpt_1_info_l2 nd_travel_section">';

	if ( nd_travel_get_container() != 1) {  $nd_travel_result .= '<div class="nd_travel_container nd_travel_box_sizing_border_box nd_travel_clearfix">'; }

	$nd_travel_result .= '

	<div class="nd_travel_section nd_travel_height_30"></div>

	<div class="nd_travel_section nd_travel_box_sizing_border_box">
			
		<div class="nd_travel_section nd_travel_display_table">	
			<div class="nd_travel_width_66_percentage nd_travel_float_left_responsive nd_travel_width_100_percentage_responsive nd_travel_display_table_cell nd_travel_vertical_align_middle nd_travel_padding_0_15 nd_travel_box_sizing_border_box">
				
				
				<div id="nd_travel_single_cpt_1_info_l2_1" class="nd_travel_width_33_percentage nd_travel_margin_bottom_20_responsive nd_travel_width_100_percentage_responsive nd_travel_float_left">


					<div class="nd_travel_section nd_travel_position_relative ">

				        <img alt="" class="nd_travel_top_0 nd_travel_position_absolute nd_travel_left_0" width="40" src="'.esc_url(plugins_url('icon-typologies-greydark.png', __FILE__ )).'">

				        <div style="padding-left:55px;" class="nd_travel_section nd_travel_box_sizing_border_box">
				        	<h5 class="nd_travel_font_size_14 nd_travel_line_height_14">'.__('TYPOLOGIES','nd-travel').'</h5>
				        	<div class="nd_travel_section nd_travel_height_5"></div>
				        	'.$nd_travel_typology.'
				        </div>

				    </div>


				</div>


				<div id="nd_travel_single_cpt_1_info_l2_2" class="nd_travel_width_33_percentage nd_travel_margin_bottom_20_responsive nd_travel_width_100_percentage_responsive nd_travel_float_left">


					<div class="nd_travel_section nd_travel_position_relative ">

				        <img alt="" class="nd_travel_top_0 nd_travel_position_absolute nd_travel_left_0" width="40" src="'.esc_url(plugins_url('icon-battery-greydark.png', __FILE__ )).'">

				        <div style="padding-left:55px;" class="nd_travel_section nd_travel_box_sizing_border_box">
				        	<h5 class="nd_travel_font_size_14 nd_travel_line_height_14">'.__('DIFFICULTY','nd-travel').'</h5>
				        	<div class="nd_travel_section nd_travel_height_5"></div>
				        	<p>'.$nd_travel_difficulty_lista.'</p>
				        </div>

				    </div>


				</div>


				<div id="nd_travel_single_cpt_1_info_l2_3" class="nd_travel_width_33_percentage nd_travel_margin_bottom_20_responsive nd_travel_width_100_percentage_responsive nd_travel_float_left">


					<div class="nd_travel_section nd_travel_position_relative ">

				        <img alt="" class="nd_travel_top_0 nd_travel_position_absolute nd_travel_left_0" width="40" src="'.esc_url(plugins_url('icon-minage-greydark.png', __FILE__ )).'">

				        <div style="padding-left:55px;" class="nd_travel_section nd_travel_box_sizing_border_box">
				        	<h5 class="nd_travel_font_size_14 nd_travel_line_height_14">'.__('MIN. AGE','nd-travel').'</h5>
				        	<div class="nd_travel_section nd_travel_height_5"></div>
				        	<p>'.$nd_travel_minages_lista.'</p>
				        </div>

				    </div>


				</div>


			</div>
			<div class="nd_travel_width_33_percentage nd_travel_float_left_responsive nd_travel_width_100_percentage_responsive nd_travel_display_table_cell nd_travel_vertical_align_middle  nd_travel_padding_0_15 nd_travel_box_sizing_border_box">
				
				<div style="background-color:'.$nd_travel_meta_box_color.'" class="nd_travel_text_align_center nd_travel_padding_40 nd_travel_box_sizing_border_box nd_travel_position_relative">
					
					'.$nd_travel_price_ribbon_sale.'
					<h1 class="nd_travel_font_size_32 nd_travel_font_weight_normal nd_options_color_white">'.$nd_travel_price.'</h1>

				</div>

			</div>
		</div>

	</div>
	';


	if ( nd_travel_get_container() != 1 ) { $nd_travel_result .= '</div>'; }

$nd_travel_result .= '
</div>';
//END INFO PACKAGE



//START TAB
$nd_travel_tabs = '';
$nd_travel_tab_map = '';
$nd_travel_tab_gallery = '';
$nd_travel_tab_program = '';

$nd_travel_meta_box_tab_map_tab_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_map_tab_title', true );
if ( $nd_travel_meta_box_tab_map_tab_title != '' ) {
	$nd_travel_tab_map = '<li class="nd_travel_display_inline_block nd_travel_width_100_percentage_responsive nd_travel_margin_bottom_20_responsive nd_travel_margin_right_20"><a class="nd_travel_border_radius_30 nd_travel_padding_5_20" href="#nd_travel_package_l2_content_map">'.$nd_travel_meta_box_tab_map_tab_title.'</a></li>';
}

$nd_travel_meta_box_tab_gallery_tab_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_gallery_tab_title', true );
if ( $nd_travel_meta_box_tab_gallery_tab_title != '' ) {
	$nd_travel_tab_gallery = '<li class="nd_travel_display_inline_block nd_travel_width_100_percentage_responsive nd_travel_margin_bottom_20_responsive nd_travel_margin_right_20"><a class="nd_travel_border_radius_30 nd_travel_padding_5_20" href="#nd_travel_package_l2_content_gallery">'.$nd_travel_meta_box_tab_gallery_tab_title.'</a></li>';
}

$nd_travel_meta_box_tab_program_tab_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_program_tab_title', true );
if ( $nd_travel_meta_box_tab_program_tab_title != '' ) {
	$nd_travel_tab_program = '<li class="nd_travel_display_inline_block nd_travel_width_100_percentage_responsive nd_travel_margin_bottom_20_responsive nd_travel_margin_right_20"><a class="nd_travel_border_radius_30 nd_travel_padding_5_20" href="#nd_travel_package_l2_content_program">'.$nd_travel_meta_box_tab_program_tab_title.'</a></li>';
}

$nd_travel_tabs .= '
	
<style>
#nd_travel_package_l2_tabs li a:hover {
    background-color:'.$nd_travel_meta_box_color.';
    color:#fff;   
    
    -webkit-transition: all 0.5s ease; 
    -moz-transition: all 0.5s ease; 
    -o-transition: all 0.5s ease; 
    -ms-transition: all 0.5s ease; 
    transition: all 0.5s ease;
}
</style>


<div class="nd_travel_section nd_travel_height_40"></div>	
<div id="nd_travel_package_l2_tabs" class="nd_travel_section">

	<ul class="nd_travel_margin_0 nd_travel_padding_0 nd_travel_list_style_none">
		<li class="nd_travel_display_inline_block nd_travel_margin_right_20 nd_travel_margin_bottom_20_responsive nd_travel_width_100_percentage_responsive">
            <a style="background-color:'.$nd_travel_meta_box_color.';" class="nd_travel_border_radius_30 nd_options_color_white nd_travel_padding_5_20" href="#nd_travel_package_l2_content">'.__('DESCRIPTION','nd-travel').'</a>
        </li>
		'.$nd_travel_tab_map.'
		'.$nd_travel_tab_gallery.'
		'.$nd_travel_tab_program.'
	</ul>

</div>
<div class="nd_travel_section nd_travel_height_40"></div>
';

//END TAB




//START BOOKING FORMS
$nd_travel_booking_section = '';
$nd_travel_meta_box_more_info_request_form = get_post_meta( get_the_ID(), 'nd_travel_meta_box_more_info_request_form', true );
$nd_travel_meta_box_more_info_request_form_cf7 = get_post_meta( get_the_ID(), 'nd_travel_meta_box_more_info_request_form_cf7', true );

if ( $nd_travel_meta_box_more_info_request_form == 'nd_travel_meta_box_more_info_request_form_yes'  ) {
	$nd_travel_booking_section .= '

		<style>
		#nd_travel_package_l2_booking_content input[type="text"],
		#nd_travel_package_l2_booking_content input[type="email"],
		#nd_travel_package_l2_booking_content input[type="submit"],
		#nd_travel_package_l2_booking_content textarea{
			width:100%;
		}
		#nd_travel_package_l2_booking_content input[type="submit"]{
			background-color:'.$nd_travel_meta_box_color.';
		}
		</style>

		<div id="nd_travel_package_l2_booking_content" class="nd_travel_section nd_travel_padding_30 nd_travel_border_1_solid_grey nd_travel_box_sizing_border_box">
			'.do_shortcode('[contact-form-7 id="'.$nd_travel_meta_box_more_info_request_form_cf7.'"]').'
		</div>
	
	';	
}

//END BOOKING FORMS



//START CONTENT
if(have_posts()) :
	while(have_posts()) : the_post();

		$nd_travel_content = do_shortcode(get_the_content());
	
		if ( nd_travel_get_container() != 1) {  $nd_travel_result .= '<div class="nd_travel_container nd_travel_box_sizing_border_box nd_travel_clearfix">'; }


			if ( $nd_travel_meta_box_page_sidebar == 'nd_travel_meta_box_page_layout_left_sidebar' ) {
				
				$nd_travel_result .= '
	    		<div class="nd_travel_float_left nd_travel_width_33_percentage nd_travel_width_100_percentage_responsive nd_travel_padding_0_15 nd_travel_box_sizing_border_box nd_travel_sidebar">

	    			'.$nd_travel_booking_section.'
	    			<div class="nd_travel_section nd_travel_height_40"></div>';

	    			echo $nd_travel_result;
		    		dynamic_sidebar("nd_travel_sidebar_cpt_1");
		    	
		    	$nd_travel_result = '
		    	</div>';

			}


			$nd_travel_result .= '
			<div class="nd_travel_float_left '.$nd_travel_single_cpt_1_content_width.' nd_travel_box_sizing_border_box nd_travel_padding_0_15 ">

				'.$nd_travel_image.'

				'.$nd_travel_tabs.'

				<div id="nd_travel_package_l2_content" class="nd_travel_section">
					'.$nd_travel_content.'
				</div>';

				if ( $nd_travel_meta_box_tab_map_tab_title != '' ) {
					$nd_travel_result .= '
					<div id="nd_travel_package_l2_content_map" class="nd_travel_section nd_travel_padding_40_0 nd_travel_border_top_1_solid_grey">
						<h2>'.get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_map_section_title', true ).'</h2>
						<div class="nd_travel_section nd_travel_height_30"></div>
						<div class="nd_travel_section">
							'.do_shortcode(get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_map_content', true )).'
						</div>
					</div>';	
				}
				

				if ( $nd_travel_meta_box_tab_gallery_tab_title != '' ) {
					$nd_travel_result .= '
					<div id="nd_travel_package_l2_content_gallery" class="nd_travel_section nd_travel_padding_40_0 nd_travel_border_top_1_solid_grey">
						<h2>'.get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_gallery_section_title', true ).'</h2>
						<div class="nd_travel_section nd_travel_height_30"></div>
						<div class="nd_travel_section">
							'.do_shortcode(get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_gallery_content', true )).'
						</div>
					</div>';
				}


				if ( $nd_travel_meta_box_tab_program_tab_title != '' ) {
					$nd_travel_result .= '

					<style>
					#nd_travel_package_l2_content_program p.nd_options_toogle_title {margin: 10px 0;}
					</style>

					<div id="nd_travel_package_l2_content_program" class="nd_travel_section nd_travel_padding_40_0 nd_travel_border_top_1_solid_grey">
						<h2>'.get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_program_section_title', true ).'</h2>
						<div class="nd_travel_section nd_travel_height_30"></div>
						<div class="nd_travel_section">
							'.do_shortcode(get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_program_content', true )).'
						</div>
					</div>';
				}


			$nd_travel_result .= '
			</div>';



			if ( $nd_travel_meta_box_page_sidebar == 'nd_travel_meta_box_page_layout_right_sidebar' ) {
				
				$nd_travel_result .= '
	    		<div class="nd_travel_float_left nd_travel_width_33_percentage nd_travel_width_100_percentage_responsive nd_travel_padding_0_15 nd_travel_box_sizing_border_box nd_travel_sidebar">

	    			'.$nd_travel_booking_section.'
	    			<div class="nd_travel_section nd_travel_height_40"></div>';

	    			echo $nd_travel_result;
		    		dynamic_sidebar("nd_travel_sidebar_cpt_1");
		    	
		    	$nd_travel_result = '
		    	</div>';

			}


	    	$nd_travel_result .= '
			<div class="nd_travel_section nd_travel_height_60"></div>
			';

		if ( nd_travel_get_container() != 1 ) { $nd_travel_result .= '</div>'; }

	endwhile;
endif;
//END CONTENT






//START related_packages
$nd_travel_meta_box_related_packages = get_post_meta( get_the_ID(), 'nd_travel_meta_box_related_packages', true );

if ( $nd_travel_meta_box_related_packages != '' ) {

    $nd_travel_meta_box_related_packages_array = explode(',', get_post_meta( get_the_ID(), 'nd_travel_meta_box_related_packages', true ) );

    if ( $nd_travel_meta_box_related_packages_array != '' ) {

        wp_enqueue_script('masonry');
      
      $nd_travel_result .= '


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


        <div id="nd_travel_single_cpt_1_related_packages" class=" nd_travel_section nd_travel_border_top_1_solid_grey">
            <div class="nd_travel_section nd_travel_height_50"></div>';

            if ( nd_travel_get_container() != 1) {  $nd_travel_result .= '<div class="nd_travel_container nd_travel_box_sizing_border_box nd_travel_clearfix">'; }

            $nd_travel_result .= '
            <div class="nd_travel_section nd_travel_padding_15 nd_travel_box_sizing_border_box nd_travel_text_align_center">

                <h3 class="nd_options_color_grey nd_travel_font_size_14 nd_travel_letter_spacing_2 nd_travel_font_weight_normal">'.__('RELATED','nd-travel').'</h3>
                <div class="nd_travel_section nd_travel_height_20"></div>
                <h1 class="nd_travel_font_size_35 nd_travel_letter_spacing_0"><u>'.__('PACKAGES','nd-travel').'</u></h1>

                <style>
                #nd_travel_single_cpt_1_related_packages h1.nd_travel_font_size_35 u:after { background-color:'.$nd_travel_meta_box_color.'; position: absolute; content: ""; width: 100%; height: 5px; left: 0; bottom: 11px; z-index: -9; }
                #nd_travel_single_cpt_1_related_packages h1.nd_travel_font_size_35 u{ position: relative; z-index: 99; text-decoration: none; }
                </style>

            </div>


            
            <div class="nd_travel_section nd_travel_masonry_content">
          ';

    }

    //START CICLE
    for ($nd_travel_meta_box_related_packages_array_i = 0; $nd_travel_meta_box_related_packages_array_i < count($nd_travel_meta_box_related_packages_array)-1; $nd_travel_meta_box_related_packages_array_i++) {
        
        $nd_travel_page_by_path = get_page_by_path($nd_travel_meta_box_related_packages_array[$nd_travel_meta_box_related_packages_array_i],OBJECT,'nd_travel_cpt_1');
        
        //default
        $nd_travel_id = $nd_travel_page_by_path->ID;
        $nd_travel_title = get_the_title($nd_travel_id);
        $nd_travel_permalink = get_permalink( $nd_travel_id );


        //datas
        $nd_travel_meta_box_color = get_post_meta( $nd_travel_id, 'nd_travel_meta_box_color', true );
        $nd_travel_meta_box_color_2 = get_post_meta( $nd_travel_id, 'nd_travel_meta_box_color_2', true );
        if ( $nd_travel_meta_box_color == '' ){ $nd_travel_meta_box_color = '#1bbc9b'; }
        if ( $nd_travel_meta_box_color_2 == '' ){ $nd_travel_meta_box_color_2 = $nd_travel_meta_box_color; }
        $nd_travel_meta_box_text_preview = get_post_meta( $nd_travel_id, 'nd_travel_meta_box_text_preview', true );


        //icon destination
        $nd_travel_meta_box_destinations = get_post_meta( $nd_travel_id, 'nd_travel_meta_box_destinations', true );
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
        $nd_travel_meta_box_price = get_post_meta( $nd_travel_id, 'nd_travel_meta_box_price', true );
        $nd_travel_meta_box_promotion_price = get_post_meta( $nd_travel_id, 'nd_travel_meta_box_promotion_price', true );
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
            $nd_travel_image_attributes = wp_get_attachment_image_src( $nd_travel_image_id, 'large' );

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


    

        $nd_travel_result .= '

        <div id="nd_travel_single_cpt_1_related_package_'.$nd_travel_id.'" class="nd_travel_masonry_item nd_travel_width_33_percentage nd_travel_width_100_percentage_responsive">

            <div class="nd_travel_section nd_travel_padding_15 nd_travel_box_sizing_border_box">

                <div class="nd_travel_section nd_travel_border_1_solid_grey nd_travel_bg_white">
                    
                    '.$nd_travel_image.'

                    ';


                    //get destination
                    $nd_travel_meta_box_destinations = get_post_meta( $nd_travel_id, 'nd_travel_meta_box_destinations', true );

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
                    $nd_travel_meta_box_typologies = get_post_meta( $nd_travel_id, 'nd_travel_meta_box_typologies', true );

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

                    $nd_travel_result .= '
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

    }
    //END CICLE
     

    if ( $nd_travel_meta_box_related_packages_array != '' ) {

        $nd_travel_result .= '</div>';

        if ( nd_travel_get_container() != 1 ) { $nd_travel_result .= '</div>'; }
      
        $nd_travel_result .= '
            <div class="nd_travel_section nd_travel_height_50"></div>
        </div>
        ';

    }

}
//END related_packages





