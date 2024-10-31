<?php


include 'nd_travel_search_results_right_content.php';
include 'nd_travel_search_results_left_content.php';


//START final result
$nd_travel_shortcode_result = '';

if ( $nd_travel_shortcode_search_results['sidebar'] != 'enable' ) { 
    $nd_travel_sidebar_class = "nd_travel_display_none";
    $nd_travel_content_class = "nd_travel_width_100_percentage"; 
}else{
    $nd_travel_sidebar_class = "";  
    $nd_travel_content_class = "nd_travel_width_66_percentage";   
}

$nd_travel_shortcode_result .='

'.$nd_travel_hidden_values.'

<div class="nd_travel_section">

    <div id="nd_travel_search_cpt_1_sidebar" class="nd_travel_float_left '.$nd_travel_sidebar_class.' nd_travel_width_33_percentage nd_travel_box_sizing_border_box nd_travel_width_100_percentage_responsive">
        
        '.$nd_travel_shortcode_left_content.'

    </div>

    <div id="nd_travel_search_cpt_1_content" class="nd_travel_float_left '.$nd_travel_content_class.' nd_travel_box_sizing_border_box nd_travel_width_100_percentage_responsive">
        
        '.$nd_travel_shortcode_right_content.'

    </div>

</div>';
//END final result