<?php

$nd_travel_shortcode_order_options = '';

$nd_travel_shortcode_order_options .= '

  <script type="text/javascript">
      //<![CDATA[
      
      jQuery(document).ready(function() {

        
        jQuery(function ($) {
          
          $( "#nd_travel_search_filter_options a" ).on("click",function() {

            $( "#nd_travel_search_filter_options a" ).removeClass( "nd_travel_search_filter_options_active" );
            $(this).addClass( "nd_travel_search_filter_options_active");

            nd_travel_sorting(1);
          
          });

          $( "#nd_travel_search_filter_layout a" ).on("click",function() {

            $( "#nd_travel_search_filter_layout a" ).removeClass( "nd_travel_search_filter_layout_active" );
            $(this).addClass( "nd_travel_search_filter_layout_active");

            nd_travel_sorting();

          });

          
          $("#nd_travel_search_filter_options li").on("click",function() {
            $("#nd_travel_search_filter_options li").removeClass( "nd_travel_search_filter_options_active_parent" );
            $(this).addClass( "nd_travel_search_filter_options_active_parent");
          });

        });
        

      });

      //]]>
    </script>

    <style>
    .nd_travel_search_filter_options_active { color:#fff !important; }

    #nd_travel_search_filter_options li p { border-bottom: 0px solid #434a54; }
    #nd_travel_search_filter_options li.nd_travel_search_filter_options_active_parent p { color:#fff !important; border-bottom: 2px solid #fff;}

    #nd_travel_search_filter_options li:hover .nd_travel_search_filter_options_child { display: block; }

    .nd_travel_search_filter_layout_grid { background-image:url('.esc_url(plugins_url('icon-menu-white-opacity.png', __FILE__ )).'); }
    .nd_travel_search_filter_layout_grid.nd_travel_search_filter_layout_active { background-image:url('.esc_url(plugins_url('icon-menu-white.png', __FILE__ )).'); }

    .nd_travel_search_filter_layout_list.nd_travel_search_filter_layout_active { background-image:url('.esc_url(plugins_url('icon-list-white.png', __FILE__ )).'); }
    .nd_travel_search_filter_layout_list { background-image:url('.esc_url(plugins_url('icon-list-white-opacity.png', __FILE__ )).'); }

    </style>



  	<div id="nd_travel_search_l2_order_options" class="nd_travel_section nd_travel_padding_15 nd_travel_box_sizing_border_box nd_travel_display_none_responsive">

  		<div class="nd_travel_section nd_travel_box_sizing_border_box">

        	<div class="nd_travel_section nd_travel_position_relative nd_travel_line_height_0">



                <div id="nd_travel_search_l2_order_options_1" class="nd_travel_width_33_percentage nd_travel_float_left">


                  <ul id="nd_travel_search_filter_options" class="nd_travel_list_style_none nd_travel_display_inline_block nd_travel_padding_0 nd_travel_margin_0">
                    <li id="nd_travel_vc_order_price" class="nd_travel_display_inline_block nd_travel_position_relative nd_travel_padding_0 nd_travel_margin_right_30  nd_travel_margin_0 nd_travel_float_left">
                        
                        <p class=" nd_options_color_white  nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase nd_travel_float_left">'.__('Price','nd-travel').'</p>
                        <img alt="" class="nd_travel_margin_left_10 nd_travel_margin_top_8 nd_travel_float_left" width="10" src="'.esc_url(plugins_url('icon-down-arrow-white.svg', __FILE__ )).'">

                        <ul class="nd_travel_padding_top_12 nd_travel_z_index_99 nd_travel_width_160 nd_travel_list_style_none nd_travel_search_filter_options_child nd_travel_position_absolute nd_travel_left_0 nd_travel_top_25 nd_travel_display_none nd_travel_padding_0 nd_travel_margin_0 nd_travel_width_100_percentage">
                            <li class="nd_travel_text_align_left nd_travel_bg_greydark_2 nd_travel_font_size_11 nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase nd_travel_padding_15_20"><a data-meta-key="nd_travel_meta_box_new_price" data-order="ASC" class="nd_travel_cursor_pointer">'.__('Lowest Price','nd-travel').'</a></li>
                            <li class="nd_travel_text_align_left nd_travel_bg_greydark nd_travel_font_size_11 nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase nd_travel_padding_15_20"><a data-meta-key="nd_travel_meta_box_new_price" data-order="DESC" class="nd_travel_cursor_pointer ">'.__('Highest Price','nd-travel').'</a></li>
                        </ul>

                    </li>   
                    <li id="nd_travel_vc_order_size" class="nd_travel_display_inline_block nd_travel_position_relative nd_travel_padding_0  nd_travel_margin_0 nd_travel_float_left">

                        <p class="nd_options_color_white  nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase nd_travel_float_left">'.__('Name','nd-travel').'</p> 
                        <img alt="" class="nd_travel_margin_left_10 nd_travel_margin_top_8 nd_travel_float_left" width="10" src="'.esc_url(plugins_url('icon-down-arrow-white.svg', __FILE__ )).'">

                        <ul class="nd_travel_padding_top_12 nd_travel_z_index_99 nd_travel_width_160 nd_travel_list_style_none nd_travel_search_filter_options_child nd_travel_position_absolute nd_travel_left_0 nd_travel_top_25 nd_travel_display_none nd_travel_padding_0 nd_travel_margin_0 nd_travel_width_100_percentage">
                            <li class="nd_travel_text_align_left nd_travel_bg_greydark_2 nd_travel_font_size_11 nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase nd_travel_padding_15_20"><a data-meta-key="nd_travel_name" data-order="DESC" class="nd_travel_cursor_pointer">'.__('Desc','nd-travel').'</a></li>
                            <li class="nd_travel_text_align_left nd_travel_bg_greydark nd_travel_font_size_11 nd_travel_letter_spacing_2 nd_travel_text_transform_uppercase nd_travel_padding_15_20"><a data-meta-key="nd_travel_name" data-order="ASC" class="nd_travel_cursor_pointer">'.__('Asc','nd-travel').'</a></li>
                        </ul>

                    </li>
                  </ul> 


                </div>
                
                <div  id="nd_travel_search_l2_order_options_2" class="nd_travel_width_33_percentage nd_travel_float_left">
                  <div class="nd_travel_section nd_travel_height_1"></div>
                ';

                  include 'include/nd_travel_keyword.php';

                $nd_travel_shortcode_order_options .= '  
                </div>

                <div id="nd_travel_search_l2_order_options_3" class="nd_travel_width_33_percentage nd_travel_float_left">

                    <div class="nd_travel_section nd_travel_height_1"></div>

                  <div id="nd_travel_search_filter_layout" class="nd_travel_display_none_all_iphone">
                    <a data-layout="1" class="nd_travel_search_filter_layout_grid nd_travel_cursor_pointer nd_travel_background_size_25 nd_travel_search_filter_layout_active nd_travel_width_25 nd_travel_height_25 nd_travel_position_absolute nd_travel_right_0 nd_travel_top_0"></a>
                    <a data-layout="2" class="nd_travel_search_filter_layout_list nd_travel_cursor_pointer nd_travel_background_size_25 nd_travel_width_25 nd_travel_height_25 nd_travel_position_absolute nd_travel_right_53 nd_travel_top_0"></a>
                  </div>

                </div>


    		</div>
		</div>
	</div>
	';


