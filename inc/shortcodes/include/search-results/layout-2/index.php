<?php

include 'nd_travel_search_results_order_options.php';
include 'nd_travel_search_results_right_content.php';
include 'nd_travel_search_results_left_content.php';



//START final result
$nd_travel_shortcode_result = '';

if ( $nd_travel_shortcode_search_results['sidebar'] != 'enable' ) { 
    $nd_travel_sidebar_class = "nd_travel_display_none";
    $nd_travel_content_class = "nd_travel_width_100_percentage"; 
}else{
    $nd_travel_sidebar_class = "";  
    $nd_travel_content_class = "nd_travel_width_100_percentage";   
}

$nd_travel_shortcode_result .='

'.$nd_travel_hidden_values.'


<style>
#nd_travel_search_cpt_1_no_results .nd_travel_padding_15_20 { padding:15px 30px; }
#nd_travel_search_cpt_1_no_results h3 { font-weight:normal; margin-top:3px; margin-left:15px; font-size:17px; line-height:17px; }
</style>

<div class="nd_travel_section">

    <div id="nd_travel_search_cpt_1_sidebar" class="nd_travel_float_left '.$nd_travel_sidebar_class.' nd_travel_width_100_percentage nd_travel_padding_15 nd_travel_margin_top_20_responsive nd_travel_box_sizing_border_box nd_travel_width_100_percentage_responsive">
        
        '.$nd_travel_shortcode_left_content.'

    </div>

    <div class="nd_travel_section nd_travel_height_10"></div>

    '.$nd_travel_shortcode_order_options.'

    <div style="height:'.$nd_travel_shortcode_search_results['results_margin'].'px;" class="nd_travel_section nd_travel_display_none_responsive"></div>

    <div id="nd_travel_search_cpt_1_content" class="nd_travel_float_left '.$nd_travel_content_class.' nd_travel_box_sizing_border_box nd_travel_width_100_percentage_responsive">
        
        '.$nd_travel_shortcode_right_content.'

    </div>

</div>';
//END final result