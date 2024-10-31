<?php


$nd_travel_shortcode_left_content .= '

      <!--START minages-->
        <div id="nd_travel_search_l2_minages" class=" '.$nd_travel_minages_class.' nd_travel_width_25_percentage nd_travel_width_100_percentage_responsive nd_travel_padding_10 nd_travel_float_left nd_travel_box_sizing_border_box">

            <div class="nd_travel_section nd_travel_position_relative nd_travel_box_sizing_border_box">
                <h5 class=" ">'.__('Min Age','nd-travel').' :</h5>
                <div class="nd_travel_section nd_travel_height_20"></div>
            </div>


        ';


          //get all terms
          $nd_travel_terms = get_terms('nd_travel_cpt_1_tax_3');

          //get tax
          $nd_travel_the_tax = get_taxonomy('nd_travel_cpt_1_tax_3');

          //get name
          $nd_travel_tax_name = $nd_travel_the_tax->labels->name;


          $nd_travel_shortcode_left_content .= '
          <div class="nd_travel_toogle_minage_content nd_travel_section nd_travel_box_sizing_border_box">';

            foreach ($nd_travel_terms as $nd_travel_term) {

                  $nd_travel_shortcode_left_content .= '
                  <p class="nd_travel_width_100_percentage nd_travel_width_100_percentage_all_iphone nd_travel_float_left nd_travel_margin_0">
                    <input class="nd_travel_checkbox_minage nd_travel_width_25 nd_travel_margin_0 nd_travel_padding_0 nd_travel_margin_top_8" name="nd_travel_minage_id_'.$nd_travel_term->term_id.'" '; if( $nd_travel_cpt_1_tax_3_id == $nd_travel_term->term_id ){ $nd_travel_shortcode_left_content .='checked'; } $nd_travel_shortcode_left_content .='  type="checkbox" value="'.$nd_travel_term->term_id.',">
                      '.$nd_travel_term->name.'
                  </p>'; 

                }

            $nd_travel_shortcode_left_content .= '
            
            </div>';


            $nd_travel_shortcode_left_content .= '
            <input type="hidden" id="nd_travel_archive_form_minages" name="nd_travel_archive_form_minages" value="'.esc_attr($nd_travel_cpt_1_tax_3_id_value).'">


            <script type="text/javascript">
              //<![CDATA[
              jQuery(document).ready(function() {

                jQuery( function ( $ ) {

                    $( ".nd_travel_checkbox_minage" ).change(function() {

                        if ( $( this ).is( ":checked" ) ) {

                            var nd_travel_minage_value = $( this ).val();
                            var nd_travel_minage_previous_value = $("#nd_travel_archive_form_minages").val();
                            $( "#nd_travel_archive_form_minages" ).val( nd_travel_minage_value+nd_travel_minage_previous_value );

                            nd_travel_sorting(1);

                        }else{

                            var nd_travel_minage_value = $( this ).val();
                            var nd_travel_minage_previous_value = $("#nd_travel_archive_form_minages").val();
                            var nd_travel_archive_form_minages = nd_travel_minage_previous_value.replace(nd_travel_minage_value, "");

                            $( "#nd_travel_archive_form_minages" ).val( nd_travel_archive_form_minages );

                            nd_travel_sorting(1);
                        }

                        
                    });

                });

              });
              //]]>
            </script>


          

            </div>
        <!--END minages-->';


