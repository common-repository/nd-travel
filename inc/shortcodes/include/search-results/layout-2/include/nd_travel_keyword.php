<?php


if ($nd_travel_archive_form_keyword != '') {

	$nd_travel_shortcode_order_options .= '
	<!--START search form-->
	<div class=" nd_travel_archive_form_keyword_content nd_travel_width_100_percentage nd_travel_float_left nd_travel_box_sizing_border_box">

		<div class="nd_travel_section nd_travel_position_relative nd_travel_box_sizing_border_box nd_travel_text_align_center">
			
			<p class=" nd_options_color_white  nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase ">'.__('Keyword','nd-travel').' : '.esc_html($nd_travel_archive_form_keyword).' <img id="nd_travel_remove_keyword" width="8" class="nd_travel_cursor_pointer nd_travel_bg_greydark nd_travel_padding_2 nd_travel_border_radius_100_percentage" alt="" src="'.esc_url(plugins_url('icon-close-2-white.svg', __FILE__ )).'"></p> 
			<input class="nd_travel_width_100_percentage" id="nd_travel_archive_form_keyword" name="nd_travel_archive_form_keyword" value="'.esc_attr($nd_travel_archive_form_keyword).'" type="hidden">

		</div>
	  
	</div>


	<script type="text/javascript">
      //<![CDATA[
      jQuery(document).ready(function() {

        jQuery( function ( $ ) {

          $( "#nd_travel_remove_keyword" ).on( "click", function() {
            $("#nd_travel_archive_form_keyword").val("");
            nd_travel_sorting(1);
            $( ".nd_travel_archive_form_keyword_content" ).slideToggle( "slow", function() {}); 
          });


  
        });

      });
      //]]>
    </script>



	<!--END search form-->';

}