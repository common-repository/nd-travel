<?php


$nd_travel_shortcode_left_content .= '

<!--START date-->
<div id="nd_travel_search_l2_date" class=" '.$nd_travel_date_class.' nd_travel_width_33_percentage nd_travel_width_100_percentage_responsive nd_travel_padding_15 nd_travel_float_left nd_travel_box_sizing_border_box">

  <div class="nd_travel_section nd_travel_box_sizing_border_box">

    <h5 class="nd_travel_float_left">'.__('Select Your Date','nd-travel').' :</h5> 
    <div class="nd_travel_section nd_travel_height_20"></div>
      
    <div class="nd_travel_section nd_travel_position_relative">
      <img width="18" class="nd_travel_position_absolute nd_travel_right_30 nd_travel_top_15 " src="'.esc_url(plugins_url('icon-calendar-grey.png', __FILE__ )).'">
      <input class="nd_travel_width_100_percentage nd_travel_position_absolute nd_travel_top_0 nd_travel_left_0 nd_travel_padding_0_important nd_travel_height_0 nd_travel_border_width_0_important" id="nd_travel_archive_form_date" type="text">
      <input class="nd_travel_width_100_percentage nd_travel_padding_10_30_important" placeholder="'.__('mm-dd-yyyy','nd-travel').'" id="nd_travel_archive_form_date_visual" type="text">
    </div>
      
  </div>

  

  <script type="text/javascript">
      //<![CDATA[
      jQuery(document).ready(function() {

        jQuery( function ( $ ) {

          $( "#nd_travel_archive_form_date_visual" ).on( "click", function() {
            $( "#nd_travel_archive_form_date" ).datepicker( "show" );
          });


            $( "#nd_travel_archive_form_date" ).datepicker({
              minDate: 0,
              dateFormat: "yymmdd",
              monthNames: ["'.__('January','nd-travel').'","'.__('February','nd-travel').'","'.__('March','nd-travel').'","'.__('April','nd-travel').'","'.__('May','nd-travel').'","'.__('June','nd-travel').'", "'.__('July','nd-travel').'","'.__('August','nd-travel').'","'.__('September','nd-travel').'","'.__('October','nd-travel').'","'.__('November','nd-travel').'","'.__('December','nd-travel').'"],
              monthNamesShort: [ "'.__('Jan','nd-travel').'", "'.__('Feb','nd-travel').'", "'.__('Mar','nd-travel').'", "'.__('Apr','nd-travel').'", "'.__('Maj','nd-travel').'", "'.__('Jun','nd-travel').'", "'.__('Jul','nd-travel').'", "'.__('Aug','nd-travel').'", "'.__('Sep','nd-travel').'", "'.__('Oct','nd-travel').'", "'.__('Nov','nd-travel').'", "'.__('Dec','nd-travel').'" ],
              dayNamesMin: ["'.__('SU','nd-travel').'","'.__('MO','nd-travel').'","'.__('TU','nd-travel').'","'.__('WE','nd-travel').'","'.__('TH','nd-travel').'","'.__('FR','nd-travel').'", "'.__('SA','nd-travel').'"],
              nextText: "'.__('NEXT','nd-travel').'",
              prevText: "'.__('PREV','nd-travel').'",
              onClose: function() { nd_travel_sorting(1); }

            });
            
        });

      });
      //]]>
    </script>


</div>
<!--END date-->';