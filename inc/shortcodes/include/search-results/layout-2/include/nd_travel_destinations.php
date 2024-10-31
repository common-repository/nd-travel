<?php


$nd_travel_shortcode_left_content .= '

<!--START destinations-->
<div id="nd_travel_search_l2_destinations" class=" '.$nd_travel_destinations_class.' nd_travel_width_33_percentage nd_travel_width_100_percentage_responsive nd_travel_padding_15 nd_travel_float_left nd_travel_box_sizing_border_box">

  <div class="nd_travel_section nd_travel_box_sizing_border_box">


    <h5 class="nd_travel_float_left">'.__('Select Your Destination','nd-travel').' :</h5> 
    <div class="nd_travel_section nd_travel_height_20"></div>


    
    
    <div class="nd_travel_section nd_travel_position_relative">
      <img width="18" class="nd_travel_position_absolute nd_travel_right_30 nd_travel_top_15 " src="'.esc_url(plugins_url('icon-pin-grey.png', __FILE__ )).'">
      <select class="nd_travel_width_100_percentage nd_travel_padding_10_30_important" name="nd_travel_archive_form_destinations" id="nd_travel_archive_form_destinations">';

    

      //get all destinations
      $nd_travel_destinations_args = array( 
      'posts_per_page' => -1, 
      'post_type'=> 'nd_travel_cpt_3'
      );

      $nd_travel_destinations_query = new WP_Query( $nd_travel_destinations_args );
      $nd_travel_destinations_query_i = 0;

      while ( $nd_travel_destinations_query->have_posts() ) : $nd_travel_destinations_query->the_post();

        $nd_travel_destination_id = get_the_ID();

        if ( $nd_travel_destinations_query_i == 0 ) { $nd_travel_shortcode_left_content .= '<option value="0">'.__('All Destinations','nd-travel').'</option>'; }

        //not insert if parent is setted
        $nd_travel_meta_box_parent_destination = get_post_meta( get_the_ID(), 'nd_travel_meta_box_parent_destination', true );
        if ( $nd_travel_meta_box_parent_destination != 0 ) {
          $nd_travel_shortcode_left_content .= '';
        }else{


          $nd_travel_shortcode_left_content .= '<option '; if( $nd_travel_archive_form_destinations == $nd_travel_destination_id ){ $nd_travel_shortcode_left_content .= ' selected '; } $nd_travel_shortcode_left_content .= ' value="'.$nd_travel_destination_id.'">'.get_the_title().'</option>';

          //check if the destination selected has some children destinations
          if ( count(nd_travel_get_destinations_with_parent($nd_travel_destination_id)) != 0 ){

            $nd_travel_children_destinations_array = nd_travel_get_destinations_with_parent($nd_travel_destination_id);

            foreach ($nd_travel_children_destinations_array as $nd_travel_children_destination_id) {
                
              //get parent id of children dest
              $nd_travel_parent_id_of_children_dest = get_post_meta( $nd_travel_children_destination_id, 'nd_travel_meta_box_parent_destination', true );

              if ( $nd_travel_parent_id_of_children_dest == $nd_travel_destination_id ) {
                $nd_travel_shortcode_left_content .= '<option '; if( $nd_travel_archive_form_destinations == $nd_travel_children_destination_id ){ $nd_travel_shortcode_left_content .= ' selected '; } $nd_travel_shortcode_left_content .= ' value="'.$nd_travel_children_destination_id.'">&nbsp;&nbsp;- '.get_the_title($nd_travel_children_destination_id).'</option>';  
              }

            }

          }


        }

        $nd_travel_destinations_query_i = $nd_travel_destinations_query_i + 1;

      endwhile; 

      wp_reset_postdata();


    $nd_travel_shortcode_left_content .= ' 
    </select></div>';
    
      
      
        $nd_travel_shortcode_left_content .= '

          <script type="text/javascript">
            //<![CDATA[
            jQuery(document).ready(function() {

              jQuery( function ( $ ) {

                  $( "#nd_travel_archive_form_destinations" ).change(function() {

                      nd_travel_sorting(1);

                  });

              });

            });
            //]]>
          </script>

      </div>
    </div>
  <!--END destination-->';