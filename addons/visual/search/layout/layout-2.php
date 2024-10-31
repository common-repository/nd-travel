<?php



$nd_travel_str .= '

    <div id="nd_travel_search_component_id_'.$nd_travel_search_component_id.'" class="nd_travel_section '.$nd_travel_class.' ">

        <!--START FORM-->
        <form class="nd_travel_position_relative" action="'.$nd_travel_action.'" method="get">';

            
			//get all destinations
			$nd_travel_destinations_args = array( 
				'posts_per_page' => -1, 
				'post_type'=> 'nd_travel_cpt_3'
			);
			$nd_travel_destinations_query = new WP_Query( $nd_travel_destinations_args );

			$nd_travel_destinations_query_i = 0;

			$nd_travel_str .= '
			<div style="" id="nd_travel_search_components_destinations" class=" nd_travel_width_100_percentage nd_travel_float_left nd_travel_width_100_percentage_responsive nd_travel_box_sizing_border_box">
				
				<select class="nd_travel_section nd_travel_padding_10_25_important nd_travel_border_radius_30_important" name="nd_travel_archive_form_destinations">';

				while ( $nd_travel_destinations_query->have_posts() ) : $nd_travel_destinations_query->the_post();

					$nd_travel_destination_id = get_the_ID();

					if ( $nd_travel_destinations_query_i == 0 ) { $nd_travel_str .= '<option value="0">'.__('Choose your Destination ...','nd-travel').'</option>'; }

					//not insert if parent is setted
					$nd_travel_meta_box_parent_destination = get_post_meta( get_the_ID(), 'nd_travel_meta_box_parent_destination', true );
					if ( $nd_travel_meta_box_parent_destination != 0 ) {
						$nd_travel_str .= '';
					}else{


						$nd_travel_str .= '<option value="'.$nd_travel_destination_id.'">'.get_the_title().'</option>';

						//check if the destination selected has some children destinations
						if ( count(nd_travel_get_destinations_with_parent($nd_travel_destination_id)) != 0 ){

							$nd_travel_children_destinations_array = nd_travel_get_destinations_with_parent($nd_travel_destination_id);

							foreach ($nd_travel_children_destinations_array as $nd_travel_children_destination_id) {
							    
								//get parent id of children dest
								$nd_travel_parent_id_of_children_dest = get_post_meta( $nd_travel_children_destination_id, 'nd_travel_meta_box_parent_destination', true );

								if ( $nd_travel_parent_id_of_children_dest == $nd_travel_destination_id ) {
									$nd_travel_str .= '<option value="'.$nd_travel_children_destination_id.'">&nbsp;&nbsp;- '.get_the_title($nd_travel_children_destination_id).'</option>';	
								}

							}

						}


					}

					$nd_travel_destinations_query_i = $nd_travel_destinations_query_i + 1;

				endwhile; 

				wp_reset_postdata();
				
				$nd_travel_str .= ' 
				</select>

			</div>';
			/*END destinations*/



    		$nd_travel_str .= '
    		<div id="nd_travel_search_components_submit" class="nd_travel_position_absolute nd_travel_right_10 nd_travel_top_0">
            	<input class="" type="submit" value="">
            </div>

            <style>
            	#nd_travel_search_components_submit input[type="submit"] { 
            		background-image :url('.esc_url(plugins_url('icon-search-grey.png', __FILE__ )).');
            		background-size: 18px;
				    background-position: center;
				    background-repeat: no-repeat;
				    background-color: transparent;
				    width:47px;
				    height:47px;
            	}
            </style>

        </form>
        <!--END FORM-->

    </div>


';