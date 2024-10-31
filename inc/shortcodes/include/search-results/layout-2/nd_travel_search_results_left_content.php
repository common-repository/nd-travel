<?php


//START LEFT CONTENT
$nd_travel_shortcode_left_content = '';

$nd_travel_shortcode_left_content .= '

<style>
#nd_travel_search_cpt_1_form_sidebar select,
#nd_travel_search_cpt_1_form_sidebar input[type="text"]
 {
  border-radius:30px;
}
</style>


<!--START FORM-->
<form id="nd_travel_search_cpt_1_form_sidebar" class="nd_travel_padding_35 nd_travel_padding_0_responsive nd_travel_bg_white nd_travel_section nd_travel_box_sizing_border_box">';
  
  include 'include/nd_travel_destinations.php';
  include 'include/nd_travel_date.php';
  if ( $nd_travel_shortcode_search_results['price'] == 'enable' ) {
    include 'include/nd_travel_price.php';  
  }

$nd_travel_shortcode_left_content .= '
</form>
<!--END FORM-->';
//END LEFT CONTENT



$nd_travel_shortcode_left_content .= '
  <!--START MORE FILTERS-->
  <div id="nd_travel_search_l2_filter_container" class="nd_travel_section nd_travel_margin_top_15_negative nd_travel_margin_top_20_responsive nd_travel_margin_bottom_20_responsive nd_travel_text_align_center">
    <div id="nd_travel_search_l2_filter" class="nd_travel_position_relative nd_travel_margin_auto nd_travel_width_60_percentage nd_travel_width_100_percentage_responsive">
      
      <span class="nd_travel_letter_spacing_2 nd_travel_position_relative nd_options_color_white nd_travel_font_size_14 nd_travel_line_height_14 nd_travel_border_radius_30 nd_travel_padding_7_20" style="background-color:'.$nd_travel_shortcode_search_results['filter_bg_color'].';">
        <img class="nd_travel_margin_right_5" width="10" src="'.esc_url(plugins_url('icon-filter-white.png', __FILE__ )).'">
        '.__('MORE FILTERS','nd-travel');

        if ( $nd_travel_typology_idd_value != '' OR $nd_travel_cpt_1_tax_1_id_value != '' OR $nd_travel_cpt_1_tax_2_id_value != '' OR $nd_travel_cpt_1_tax_3_id_value != '' ) {
          $nd_travel_shortcode_left_content .= '<img width="10" class="nd_travel_position_absolute nd_travel_top_10_negative nd_travel_border_radius_100_percentage nd_travel_padding_6 nd_travel_bg_greydark nd_travel_right_10_negative" src="'.esc_url(plugins_url('icon-warning-white.png', __FILE__ )).'">';  
        }

      $nd_travel_shortcode_left_content .= '  
      </span>

      <div id="nd_travel_search_l2_filter_content" class="nd_travel_padding_top_18 nd_travel_left_0 nd_travel_width_100_percentage nd_travel_z_index_9 nd_travel_text_align_left nd_travel_display_none  nd_travel_position_absolute nd_travel_top_40">
        <div class="nd_travel_triangle_filter"></div>
        <div class="nd_travel_border_top_width_0_important nd_travel_border_1_solid_grey nd_travel_bg_white nd_travel_section nd_travel_padding_25 nd_travel_box_sizing_border_box">';
        
          include 'include/nd_travel_typologies.php';
          include 'include/nd_travel_durations.php';
          include 'include/nd_travel_difficulties.php';
          include 'include/nd_travel_minage.php';

      $nd_travel_shortcode_left_content .= '
        </div>
      </div>

    </div>
  </div>

  <style>
    #nd_travel_search_l2_filter:hover #nd_travel_search_l2_filter_content{ display:block; }
    .nd_travel_triangle_filter { width: 100%; overflow: hidden; box-sizing: border-box; text-align: center; padding-left: 0px; line-height: 10px;}
    .nd_travel_triangle_filter:after {content: "";display: inline-block;width: 0px;height: 0px;border-left: 10px solid transparent;border-right: 10px solid transparent;line-height: 10px;}
    .nd_travel_triangle_filter:after { border-bottom: 10px solid #fff;}
  </style>
  <!--END MORE FILTERS-->';