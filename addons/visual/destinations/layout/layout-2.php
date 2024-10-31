<?php


wp_enqueue_script('masonry');

$str .= '

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

';


$str .= '<div class="nd_travel_section nd_travel_masonry_content '.$nd_travel_class.' ">';

while ( $the_query->have_posts() ) : $the_query->the_post();

//default
$nd_travel_title = get_the_title();
$nd_travel_id = get_the_ID();
$nd_travel_permalink = get_permalink( $nd_travel_id );

//datas
$nd_travel_meta_box_color = get_post_meta( get_the_ID(), 'nd_travel_meta_box_color_cpt_3', true );
if ( $nd_travel_meta_box_color == '' ){ $nd_travel_meta_box_color = '#1bbc9b'; }
$nd_travel_meta_box_icon_cpt_3 = get_post_meta( get_the_ID(), 'nd_travel_meta_box_icon_cpt_3', true );


//image
if ( has_post_thumbnail() ) { 

    $nd_travel_image_id = get_post_thumbnail_id( $nd_travel_id );
    $nd_travel_image_attributes = wp_get_attachment_image_src( $nd_travel_image_id, $nd_travel_image_size );

    $str .= '

    <div id="nd_travel_destinations_pg_l2_'.$nd_travel_id.'" class="nd_travel_masonry_item nd_travel_destinations_pg_l2 '.$nd_travel_width.' nd_travel_width_100_percentage_responsive">

        <div style="padding: '.$nd_travel_padding.';" class="nd_travel_section nd_travel_destinations_pg_l2_padding nd_travel_box_sizing_border_box">

            <div class="nd_travel_section">
                
                <div class="nd_travel_section nd_travel_position_relative nd_travel_display_grid nd_options_fadein_fadeout">
                
                    <!--image-->
                    <img alt="" class="nd_travel_destinations_pg_l2_image nd_travel_section" src="'.$nd_travel_image_attributes[0].'">

                    
                    <!--filter and content-->
                    <div class="nd_options_fadeout nd_travel_section nd_travel_height_100_percentage nd_travel_bg_greydark_alpha_gradient nd_travel_position_absolute nd_travel_left_0 nd_travel_top_0">
                        
                        <div class="nd_travel_padding_30 nd_travel_bottom_0 nd_travel_left_0 nd_travel_position_absolute">
                            <h3 class="nd_options_color_white nd_travel_letter_spacing_0 nd_travel_margin_bottom_0_important">'.$nd_travel_title.'</h3>
                            <div class="nd_travel_section nd_travel_height_10"></div>';


                            //get number packages
                            $nd_travel_qnt_dest_packages = nd_travel_get_number_posts('nd_travel_cpt_1','nd_travel_meta_box_destinations',$nd_travel_id);
                            $nd_travel_qnt_dest_packages_children = 0;

                            //check if the destination selected has some children destinations
                            if ( count(nd_travel_get_destinations_with_parent($nd_travel_id)) != 0 ){

                                $nd_travel_children_destinations_array = nd_travel_get_destinations_with_parent($nd_travel_id);

                                foreach ($nd_travel_children_destinations_array as $nd_travel_children_destination_id) {
                                    
                                  //get parent id of children dest
                                  $nd_travel_parent_id_of_children_dest = get_post_meta( $nd_travel_children_destination_id, 'nd_travel_meta_box_parent_destination', true );

                                  if ( $nd_travel_parent_id_of_children_dest == $nd_travel_id ) {
                                    $nd_travel_qnt_dest_packages_children = $nd_travel_qnt_dest_packages_children + nd_travel_get_number_posts('nd_travel_cpt_1','nd_travel_meta_box_destinations',$nd_travel_children_destination_id);
                                  }

                                }

                            }

                            //sum all dest packages
                            $nd_travel_qnt_dest_packages = $nd_travel_qnt_dest_packages + $nd_travel_qnt_dest_packages_children;


                            //decide the correct word
                            if ( $nd_travel_qnt_dest_packages == 1 ) {
                                $nd_travel_qnt_dest_packages_word = __('PACKAGE','nd-travel');    
                            }else{
                                $nd_travel_qnt_dest_packages_word = __('PACKAGES','nd-travel');  
                            }

                            $str .= '
                            <h6 class="nd_options_color_white nd_travel_font_weight_normal nd_travel_letter_spacing_2">'.$nd_travel_qnt_dest_packages.' '.$nd_travel_qnt_dest_packages_word.'</h6>
                        </div>';

                        
                        /*ICON DESTINATION*/
                        if ( $nd_travel_meta_box_icon_cpt_3 != '' ) { 

                            $str .= '

                                <div class="nd_travel_padding_30 nd_travel_top_0 nd_travel_left_0 nd_travel_position_absolute">
                                    <img width="35" alt="" class="" src="'.$nd_travel_meta_box_icon_cpt_3.'">
                                </div>

                            ';

                        }


                        
                    $str .= '
                    </div>



                    <!--filter and content-->
                    <div style="background-color:'.$nd_travel_meta_box_color.'" class="nd_travel_display_table nd_options_fadein nd_travel_section nd_travel_height_100_percentage nd_travel_text_align_center nd_travel_position_absolute nd_travel_left_0 nd_travel_top_0">
                        
                        <div class="nd_travel_display_table_cell nd_travel_vertical_align_middle nd_travel_padding_30 nd_travel_box_sizing_border_box nd_travel_width_100_percentage">';

                            //insert the title ans all list only if there are packages
                            if ( $nd_travel_qnt_dest_packages != 0 ) {

                                $str .= '
                                <h3 class="nd_options_color_white nd_travel_letter_spacing_0 nd_travel_margin_bottom_0_important">'.__('Packages','nd-travel').'</h3>

                                <div class="nd_travel_section nd_travel_height_20"></div>';


                                /*PREPARE DESTINATIONS ARRAY FOR ARGS ( mandatoru since we have some dest with children )*/
                                $nd_travel_archive_form_destinations_array = array();
                                $nd_travel_archive_form_destinations_array[0] = $nd_travel_id;

                                //if is empty insert on array all destinations
                                if ( $nd_travel_archive_form_destinations_array[0] == 0 ) {

                                  $nd_travel_destinations_args = array( 'posts_per_page' => -1, 'post_type'=> 'nd_travel_cpt_3' );
                                  $nd_travel_destinations = get_posts($nd_travel_destinations_args); 
                                  $nd_travel_destinations_i = 0;

                                  foreach ($nd_travel_destinations as $nd_travel_meta_box_destination) :
                                                
                                      $nd_travel_archive_form_destinations_array[$nd_travel_destinations_i] = $nd_travel_meta_box_destination->ID;
                                      $nd_travel_destinations_i = $nd_travel_destinations_i + 1;

                                  endforeach;

                                }else{

                                  //start adding children ids if the parent has children
                                  if ( count(nd_travel_get_destinations_with_parent($nd_travel_id)) != 0 ){

                                      $nd_travel_destinations_query_i = 1;
                                      $nd_travel_children_destinations_array = nd_travel_get_destinations_with_parent($nd_travel_id);

                                      foreach ($nd_travel_children_destinations_array as $nd_travel_children_destination_id) {
                                          
                                          $nd_travel_archive_form_destinations_array[$nd_travel_destinations_query_i] = $nd_travel_children_destination_id;
                                          $nd_travel_destinations_query_i = $nd_travel_destinations_query_i + 1;

                                      }

                                  }
                                  //END

                                }
                                //end array with all destinations


                                /*PACKAGES LIST*/
                                $nd_travel_packages_destination_args = array(
            
                                    'post_type' => 'nd_travel_cpt_1',
                                    'posts_per_page' => $nd_travel_qnt_packages,

                                    //destinations
                                    'meta_query' => array(
                                        array(
                                            'key'     => 'nd_travel_meta_box_destinations',
                                            'type' => 'numeric',
                                            'value'   => $nd_travel_archive_form_destinations_array,
                                        )
                                    )

                                );

                                $nd_travel_packages_destination_the_query = new WP_Query( $nd_travel_packages_destination_args );

                                while ( $nd_travel_packages_destination_the_query->have_posts() ) : $nd_travel_packages_destination_the_query->the_post();

                                    //get datas
                                    $nd_travel_pack_title = get_the_title();
                                    $nd_travel_pack_id = get_the_ID();
                                    $nd_travel_pack_permalink = get_permalink( $nd_travel_pack_id );

                                    $str .= '<a href="'.$nd_travel_pack_permalink.'"><p class="nd_options_color_white">'.$nd_travel_pack_title.'</p></a>';    

                                endwhile;

                                wp_reset_postdata();

                                //get number qnt more packages
                                if ( $nd_travel_qnt_packages != -1 ) {
                                    
                                    $nd_travel_qnt_more_packages = $nd_travel_qnt_dest_packages - $nd_travel_qnt_packages;

                                    if ( $nd_travel_qnt_more_packages > 0 ) {
                                        $str .= '<a href="'.$nd_travel_permalink.'"><p class="nd_options_color_white"><span class="nd_travel_padding_2_10 nd_travel_font_size_10 nd_travel_border_radius_30 nd_travel_bg_black_alpha_1">+ '.$nd_travel_qnt_more_packages.'</span></p></a>';
                                    }

                                }
                                
                                $str .= '
                                <div class="nd_travel_section nd_travel_height_20"></div>';

                            }
                            //end


                            $str .= '
                            <a style="color:'.$nd_travel_meta_box_color.'" class="nd_travel_bg_white nd_travel_padding_5_20 nd_travel_border_radius_30" href="'.$nd_travel_permalink.'">'.__('VIEW DESTINATION','nd-travel').'</a>

                        </div>

                    </div>



                </div>

            </div>

        </div>

    </div>';

}





endwhile;

$str .= '</div>';