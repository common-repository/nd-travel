<?php

///////////////////////////////////////////////////METABOX ///////////////////////////////////////////////////////////////

//add image size
if ( function_exists( 'add_image_size' ) ) {  
    add_image_size( 'nd_travel_image_size_1110_570', 1110, 570, true ); 
    add_image_size( 'nd_travel_image_size_720_720', 720, 720, true ); 
}


add_action( 'add_meta_boxes', 'nd_travel_box_add' );
function nd_travel_box_add() {
    add_meta_box( 'nd_travel_metabox_cpt_1', __('Metabox','nd-travel'), 'nd_travel_meta_box', 'nd_travel_cpt_1', 'normal', 'high' );
}

function nd_travel_meta_box()
{

    //iris color picker
    wp_enqueue_script('iris');

    //jquery-ui-tabs
    wp_enqueue_script('jquery-ui-tabs');

    //jquery-ui-autocomplete
    wp_enqueue_script('jquery-ui-autocomplete');

    //jquery-ui-datepicker
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui-datepicker-css', esc_url(plugins_url('jquery-ui-datepicker.css', __FILE__ )) );




    // $post is already set, and contains an object: the WordPress post
    global $post;
    $nd_travel_values = get_post_custom( $post->ID );
     

    //main settings
    $nd_travel_meta_box_destinations = get_post_meta( get_the_ID(), 'nd_travel_meta_box_destinations', true );
    $nd_travel_meta_box_typologies = get_post_meta( get_the_ID(), 'nd_travel_meta_box_typologies', true );
    $nd_travel_meta_box_availability_from = get_post_meta( get_the_ID(), 'nd_travel_meta_box_availability_from', true );
    $nd_travel_meta_box_availability_to = get_post_meta( get_the_ID(), 'nd_travel_meta_box_availability_to', true );

    //price settings
    $nd_travel_meta_box_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_price', true );
    $nd_travel_meta_box_promotion_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_promotion_price', true );
    $nd_travel_meta_box_new_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_new_price', true );
    $nd_travel_meta_box_promo_price = get_post_meta( get_the_ID(), 'nd_travel_meta_box_promo_price', true );

    if ( $nd_travel_meta_box_promotion_price != '' ) {
      $nd_travel_meta_box_price_calc = $nd_travel_meta_box_promotion_price;
      $nd_travel_meta_box_promo_price_calc = 1;
    }else{
      $nd_travel_meta_box_price_calc = $nd_travel_meta_box_price;
      $nd_travel_meta_box_promo_price_calc = 0;
    }

    //page settings
    $nd_travel_meta_box_image = get_post_meta( get_the_ID(), 'nd_travel_meta_box_image', true );
    $nd_travel_meta_box_image_position = get_post_meta( get_the_ID(), 'nd_travel_meta_box_image_position', true );
    $nd_travel_meta_box_page_layout = get_post_meta( get_the_ID(), 'nd_travel_meta_box_page_layout', true );
    $nd_travel_meta_box_page_sidebar = get_post_meta( get_the_ID(), 'nd_travel_meta_box_page_sidebar', true );
    $nd_travel_meta_box_related_packages = get_post_meta( get_the_ID(), 'nd_travel_meta_box_related_packages', true );

    //preview settings
    $nd_travel_meta_box_color = get_post_meta( get_the_ID(), 'nd_travel_meta_box_color', true );
    $nd_travel_meta_box_color_2 = get_post_meta( get_the_ID(), 'nd_travel_meta_box_color_2', true );
    $nd_travel_meta_box_text_preview = get_post_meta( get_the_ID(), 'nd_travel_meta_box_text_preview', true );
    $nd_travel_meta_box_featured_image_size = get_post_meta( get_the_ID(), 'nd_travel_meta_box_featured_image_size', true );
    $nd_travel_meta_box_featured_image_replace = get_post_meta( get_the_ID(), 'nd_travel_meta_box_featured_image_replace', true );

    //booking settings
    $nd_travel_meta_box_more_info_request_form = get_post_meta( get_the_ID(), 'nd_travel_meta_box_more_info_request_form', true );
    $nd_travel_meta_box_more_info_request_form_cf7 = get_post_meta( get_the_ID(), 'nd_travel_meta_box_more_info_request_form_cf7', true );

    //map
    $nd_travel_meta_box_tab_map_tab_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_map_tab_title', true );
    $nd_travel_meta_box_tab_map_section_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_map_section_title', true );
    $nd_travel_meta_box_tab_map_content = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_map_content', true );

    //gallery
    $nd_travel_meta_box_tab_gallery_tab_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_gallery_tab_title', true );
    $nd_travel_meta_box_tab_gallery_section_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_gallery_section_title', true );
    $nd_travel_meta_box_tab_gallery_content = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_gallery_content', true );

    //program
    $nd_travel_meta_box_tab_program_tab_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_program_tab_title', true );
    $nd_travel_meta_box_tab_program_section_title = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_program_section_title', true );
    $nd_travel_meta_box_tab_program_content = get_post_meta( get_the_ID(), 'nd_travel_meta_box_tab_program_content', true );

    
    ?>



    <div id="nd_travel_id_metabox_cpt">
        <ul>
            <li><a href="#nd_travel_tab_main"><span class="dashicons-before dashicons-pressthis nd_travel_line_height_20 nd_travel_margin_right_10 nd_travel_color_444444"></span><?php _e('Main Settings','nd-travel'); ?></a></li>
            <li><a href="#nd_travel_tab_price"><span class="dashicons-before dashicons-tickets-alt nd_travel_line_height_20 nd_travel_margin_right_10 nd_travel_color_444444"></span><?php _e('Price Settings','nd-travel'); ?></a></li>
            <li><a href="#nd_travel_tab_page"><span class="dashicons-before dashicons-format-aside nd_travel_line_height_20 nd_travel_margin_right_10 nd_travel_color_444444"></span><?php _e('Page Settings','nd-travel'); ?></a></li>
            <li><a href="#nd_travel_tab_preview"><span class="dashicons-before dashicons-format-image nd_travel_line_height_20 nd_travel_margin_right_10 nd_travel_color_444444"></span><?php _e('Preview Settings','nd-travel'); ?></a></li>

            <li><a href="#nd_travel_tab_booking"><span class="dashicons-before dashicons-info nd_travel_line_height_20 nd_travel_margin_right_10 nd_travel_color_444444"></span><?php _e('Booking Settings','nd-travel'); ?></a></li>
            <li><a href="#nd_travel_tab_map"><span class="dashicons-before dashicons-location nd_travel_line_height_20 nd_travel_margin_right_10 nd_travel_color_444444"></span><?php _e('Google Map','nd-travel'); ?></a></li>
            <li><a href="#nd_travel_tab_gallery"><span class="dashicons-before dashicons-camera nd_travel_line_height_20 nd_travel_margin_right_10 nd_travel_color_444444"></span><?php _e('Gallery','nd-travel'); ?></a></li>
            <li><a href="#nd_travel_tab_program"><span class="dashicons-before dashicons-clipboard nd_travel_line_height_20 nd_travel_margin_right_10 nd_travel_color_444444"></span><?php _e('Program','nd-travel'); ?></a></li>
            
            <?php do_action("nd_travel_single_cpt_1_tab_list"); ?>

        </ul>
        
        <div class="nd_travel_id_metabox_cpt_content">
            

            <div id="nd_travel_tab_main">
                
              <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee nd_travel_padding_10 nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Destination','nd-travel'); ?></strong></p>
                  <p>
                    <select class="nd_travel_width_100_percentage" name="nd_travel_meta_box_destinations" id="nd_travel_meta_box_destinations">
                      <?php 

                        $nd_travel_meta_box_destinations = get_post_meta( get_the_ID(), 'nd_travel_meta_box_destinations', true );
                        $nd_travel_destinations_args = array( 'posts_per_page' => -1, 'post_type'=> 'nd_travel_cpt_3' );
                        $nd_travel_destinations = get_posts($nd_travel_destinations_args); 

                        ?>
                      <?php foreach ($nd_travel_destinations as $nd_travel_meta_box_destination) : ?>
                          <option 

                          <?php 
                            if( $nd_travel_meta_box_destinations == $nd_travel_meta_box_destination->ID ) { 
                              echo 'selected="selected"';
                            } 
                          ?>

                          value="<?php echo $nd_travel_meta_box_destination->ID; ?>">
                              <?php echo $nd_travel_meta_box_destination->post_title; ?>
                          </option>
                      <?php endforeach; ?>
                    </select>
                  </p>
                  <p><?php _e('Select the destination of your package','nd-travel'); ?></p>
              </div>



              <script type="text/javascript">
              //<![CDATA[

              jQuery(document).ready(function($){
                var nd_travel_available_destinations = [ 

                  //start all documents list
                  <?php 

                    $nd_travel_destinations_args = array( 'posts_per_page' => -1, 'post_type'=> 'nd_travel_cpt_3' );
                    $nd_travel_destinations = get_posts($nd_travel_destinations_args); 

                    foreach ($nd_travel_destinations as $nd_travel_destination) :
                      echo '"'.$nd_travel_destination->post_name.'",'; 
                    endforeach;
                    
                  ?>
                  //end all documents list

                ];
                function split( val ) {
                  return val.split( /,\s*/ );
                }
                function extractLast( term ) {
                  return split( term ).pop();
                }

                $( "#nd_travel_meta_box_destinations" )
                  // don't navigate away from the field on tab when selecting an item
                  .on( "keydown", function( event ) {
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).autocomplete( "instance" ).menu.active ) {
                      event.preventDefault();
                    }
                  })
                  .autocomplete({
                    minLength: 0,
                    source: function( request, response ) {
                      // delegate back to autocomplete, but extract the last term
                      response( $.ui.autocomplete.filter(
                        nd_travel_available_destinations, extractLast( request.term ) ) );
                    },
                    focus: function() {
                      // prevent value inserted on focus
                      return false;
                    },
                    select: function( event, ui ) {
                      var terms = split( this.value );
                      // remove the current input
                      terms.pop();
                      // add the selected item
                      terms.push( ui.item.value );
                      // add placeholder to get the comma-and-space at the end
                      terms.push( "" );
                      this.value = terms.join( "," );
                      return false;
                    }
                  });
              } );

              //]]>
              </script>



              <div class="nd_travel_section nd_travel_padding_10 nd_travel_border_bottom_1_solid_eee nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Typologies','nd-travel'); ?></strong></p>
                  <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_typologies" id="nd_travel_meta_box_typologies" value="<?php echo $nd_travel_meta_box_typologies ?>" /></p>
                  <p><?php _e('This is an intuitive field, enter your typologies previously created in the typologies section ( separated by comma )','nd-travel'); ?></p>
              </div>


              <script type="text/javascript">
              //<![CDATA[

              jQuery(document).ready(function($){
                var nd_travel_available_typologies = [ 

                  //start all documents list
                  <?php 

                    $nd_travel_typologies_args = array( 'posts_per_page' => -1, 'post_type'=> 'nd_travel_cpt_2' );
                    $nd_travel_typologies = get_posts($nd_travel_typologies_args); 

                    foreach ($nd_travel_typologies as $nd_travel_typology) :
                      echo '"'.$nd_travel_typology->post_name.'",'; 
                    endforeach;
                    
                  ?>
                  //end all documents list

                ];
                function split( val ) {
                  return val.split( /,\s*/ );
                }
                function extractLast( term ) {
                  return split( term ).pop();
                }

                $( "#nd_travel_meta_box_typologies" )
                  // don't navigate away from the field on tab when selecting an item
                  .on( "keydown", function( event ) {
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).autocomplete( "instance" ).menu.active ) {
                      event.preventDefault();
                    }
                  })
                  .autocomplete({
                    minLength: 0,
                    source: function( request, response ) {
                      // delegate back to autocomplete, but extract the last term
                      response( $.ui.autocomplete.filter(
                        nd_travel_available_typologies, extractLast( request.term ) ) );
                    },
                    focus: function() {
                      // prevent value inserted on focus
                      return false;
                    },
                    select: function( event, ui ) {
                      var terms = split( this.value );
                      // remove the current input
                      terms.pop();
                      // add the selected item
                      terms.push( ui.item.value );
                      // add placeholder to get the comma-and-space at the end
                      terms.push( "" );
                      this.value = terms.join( "," );
                      return false;
                    }
                  });
              } );

              //]]>
              </script>




              <div class="nd_travel_section   nd_travel_padding_10 nd_travel_padding_left_0 nd_travel_padding_right_0 nd_travel_box_sizing_border_box">

                <div class="nd_travel_section  nd_travel_padding_10 nd_travel_padding_top_0 nd_travel_padding_bottom_0 nd_travel_box_sizing_border_box">
                    <p class="nd_travel_margin_bottom_0"><strong><?php _e('Availability','nd-travel'); ?></strong></p>
                </div>

                <div class="nd_travel_float_left nd_travel_width_50_percentage  nd_travel_padding_10 nd_travel_padding_top_0 nd_travel_box_sizing_border_box">
                    <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_availability_from" id="nd_travel_meta_box_availability_from" value="<?php echo $nd_travel_meta_box_availability_from ?>" /></p>
                    <p><?php _e('From','nd-travel'); ?></p>
                </div>
                <div class="nd_travel_float_left nd_travel_width_50_percentage  nd_travel_padding_10 nd_travel_padding_top_0 nd_travel_box_sizing_border_box">
                    <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_availability_to" id="nd_travel_meta_box_availability_to" value="<?php echo $nd_travel_meta_box_availability_to ?>" /></p>
                    <p><?php _e('To','nd-travel'); ?></p>
                </div>

              </div>

              <script type="text/javascript">
                //<![CDATA[
                jQuery(document).ready(function() {

                  jQuery( function ( $ ) {

                    var dateFormat = "yymmdd",
                      


                      from = $( "#nd_travel_meta_box_availability_from" )
                        .datepicker({
                          changeMonth: false,
                          numberOfMonths: 2,
                          dateFormat: "yymmdd"
                        })
                        .on( "change", function() {
                          to.datepicker( "option", "minDate", getDate( this ) );
                        }),
                      

                      to = $( "#nd_travel_meta_box_availability_to" ).datepicker({
                        changeMonth: false,
                        numberOfMonths: 2,
                        dateFormat: "yymmdd"
                      })
                      .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                      });
                 


                    function getDate( element ) {
                      var date;
                      try {
                        date = $.datepicker.parseDate( dateFormat, element.value );
                      } catch( error ) {
                        date = null;
                      }
                 
                      return date;
                    }

                  });

                });
                //]]>
              </script>

            </div>
            




            <div id="nd_travel_tab_price">
                
                <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Price','nd-travel'); ?></strong></p>
                    <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_price" id="nd_travel_meta_box_price" value="<?php echo $nd_travel_meta_box_price ?>" /></p>
                    <p><?php _e('Insert the price number ( only number ) currency can be sets on plugin options','nd-travel'); ?></p>
                </div>

                <div class="nd_travel_section nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Promotion Price','nd-travel'); ?></strong></p>
                    <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_promotion_price" id="nd_travel_meta_box_promotion_price" value="<?php echo $nd_travel_meta_box_promotion_price ?>" /></p>
                    <p><?php _e('Insert the promotion price number ( only number ) currency can be sets on plugin options','nd-travel'); ?></p>
                </div>

                <div class="nd_travel_section nd_travel_padding_10 nd_travel_box_sizing_border_box nd_travel_display_none">
                    <p><input readonly class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_new_price" id="nd_travel_meta_box_new_price" value="<?php echo $nd_travel_meta_box_price_calc ?>" /></p>
                </div>
                <div class="nd_travel_section nd_travel_padding_10 nd_travel_box_sizing_border_box nd_travel_display_none">
                    <p><input readonly class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_promo_price" id="nd_travel_meta_box_promo_price" value="<?php echo $nd_travel_meta_box_promo_price_calc ?>" /></p>
                </div>
                
            </div>
            



            <div id="nd_travel_tab_preview">

                <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Color','nd-travel'); ?></strong></p>
                    <p><input class="nd_travel_width_100_percentage" id="nd_travel_colorpicker" type="text" name="nd_travel_meta_box_color" value="<?php echo $nd_travel_meta_box_color; ?>" /></p>
                    <p><?php _e('Set package color','nd-travel'); ?></p>
                </div>
                
                <script type="text/javascript">
                  //<![CDATA[
                  
                  jQuery(document).ready(function($){
                      $('#nd_travel_colorpicker').iris();
                  });

                  //]]>
                </script>

                <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Color 2','nd-travel'); ?></strong></p>
                    <p><input class="nd_travel_width_100_percentage" id="nd_travel_colorpicker_2" type="text" name="nd_travel_meta_box_color_2" value="<?php echo $nd_travel_meta_box_color_2; ?>" /></p>
                    <p><?php _e('Set package color 2, set only to show the gradient bg on some elements','nd-travel'); ?></p>
                </div>
                
                <script type="text/javascript">
                  //<![CDATA[
                  
                  jQuery(document).ready(function($){
                      $('#nd_travel_colorpicker_2').iris();
                  });

                  //]]>
                </script>

                <div class="nd_travel_section nd_travel_padding_10 nd_travel_border_bottom_1_solid_eee nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Text Preview','nd-travel'); ?></strong></p>
                    <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_text_preview" id="nd_travel_meta_box_text_preview" value="<?php echo $nd_travel_meta_box_text_preview ?>" /></p>
                    <p><?php _e('Insert the text preview which will be visible on the post grid preview','nd-travel'); ?></p>
                </div>

                <div class="nd_travel_section nd_travel_display_none nd_travel_border_bottom_1_solid_eee nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Featured Image size','nd-travel'); ?></strong></p>
                    <p>
                        
                        <select class="nd_travel_width_100_percentage" name="nd_travel_meta_box_featured_image_size" id="nd_travel_meta_box_featured_image_size">
                            <option <?php if( $nd_travel_meta_box_featured_image_size == 'large' ) { echo 'selected="selected"'; } ?> value="large"><?php _e('Large','nd-travel'); ?></option>
                        <?php

                            $nd_travel_image_sizes = get_intermediate_image_sizes();
                            for ($nd_travel_image_sizes_i = 0; $nd_travel_image_sizes_i < count($nd_travel_image_sizes); $nd_travel_image_sizes_i++) {
                                
                                $nd_travel_image_size = $nd_travel_image_sizes[$nd_travel_image_sizes_i]; ?>

                                <option <?php if( $nd_travel_meta_box_featured_image_size == $nd_travel_image_size ) { echo 'selected="selected"'; } ?> value="<?php echo $nd_travel_image_size; ?>"><?php echo $nd_travel_image_size; ?></option>
                         
                        <?php        
                        }
                        ?>
                        </select>

                    </p>
                    <p><?php _e('Select the image size that you want to use for your featured image','nd-travel'); ?></p>
                </div>

                <div class="nd_travel_section nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Featured Image Replace','nd-travel'); ?></strong></p>
                    <p><textarea rows="5" class="nd_travel_width_100_percentage" name="nd_travel_meta_box_featured_image_replace" id="nd_travel_meta_box_featured_image_replace"><?php echo $nd_travel_meta_box_featured_image_replace ?></textarea></p>
                    <p><?php _e('Replace the featured image with your custom content ( available in packages post grid component for layout 4 )','nd-travel'); ?></p>
                </div>

            </div>


            <div id="nd_travel_tab_page">

                
                <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Header Image','nd-travel'); ?></strong></p>
                    <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_image" id="nd_travel_meta_box_image" value="<?php echo $nd_travel_meta_box_image ?>" /></p>
                    <input class="button nd_travel_meta_box_image_button" type="button" name="nd_travel_meta_box_image_button" id="nd_travel_meta_box_image_button" value="<?php _e('Upload','nd-travel'); ?>" />
                    <p><?php _e('Insert the header image url','nd-travel'); ?></p>

                    <script type="text/javascript">
                      //<![CDATA[
                          
                      jQuery(document).ready(function() {

                        jQuery( function ( $ ) {

                          var file_frame = [],
                          $button = $( '.nd_travel_meta_box_image_button' );


                          $('#nd_travel_meta_box_image_button').click( function () {


                            var $this = $( this ),
                              id = $this.attr( 'id' );

                            // If the media frame already exists, reopen it.
                            if ( file_frame[ id ] ) {
                              file_frame[ id ].open();

                              return;
                            }

                            // Create the media frame.
                            file_frame[ id ] = wp.media.frames.file_frame = wp.media( {
                              title    : $this.data( 'uploader_title' ),
                              button   : {
                                text : $this.data( 'uploader_button_text' )
                              },
                              multiple : false  // Set to true to allow multiple files to be selected
                            } );

                            // When an image is selected, run a callback.
                            file_frame[ id ].on( 'select', function() {

                              // We set multiple to false so only get one image from the uploader
                              var attachment = file_frame[ id ].state().get( 'selection' ).first().toJSON();

                              $('#nd_travel_meta_box_image').val(attachment.url);

                            } );

                            // Finally, open the modal
                            file_frame[ id ].open();


                          } );

                        });

                      });

                        //]]>
                      </script>

                </div>

                <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Image Position','nd-travel'); ?></strong></p>
                    <p>
                      <select class="nd_travel_width_100_percentage" name="nd_travel_meta_box_image_position" id="nd_travel_meta_box_image_position">
    
                        <option <?php if( $nd_travel_meta_box_image_position == 'nd_travel_background_position_center' ) { echo 'selected="selected"'; } ?> value="nd_travel_background_position_center"><?php _e('Center','nd-travel'); ?></option>
                        <option <?php if( $nd_travel_meta_box_image_position == 'nd_travel_background_position_center_top' ) { echo 'selected="selected"'; } ?> value="nd_travel_background_position_center_top"><?php _e('Top','nd-travel'); ?></option>
                        <option <?php if( $nd_travel_meta_box_image_position == 'nd_travel_background_position_center_bottom' ) { echo 'selected="selected"'; } ?> value="nd_travel_background_position_center_bottom"><?php _e('Bottom','nd-travel'); ?></option>
                         
                      </select>
                    </p>
                    <p><?php _e('Select the image position for your header image','nd-travel'); ?></p>
                </div>

                <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee  nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Page Layout','nd-travel'); ?></strong></p>
                    <p>
                        
                        <select class="nd_travel_width_100_percentage" name="nd_travel_meta_box_page_layout" id="nd_travel_meta_box_page_layout">
    
                            <option <?php if( $nd_travel_meta_box_page_layout == 'layout-1' ) { echo 'selected="selected"'; } ?> value="layout-1"><?php _e('Layout 1','nd-travel'); ?></option>
                            <option <?php if( $nd_travel_meta_box_page_layout == 'layout-2' ) { echo 'selected="selected"'; } ?> value="layout-2"><?php _e('Layout 2','nd-travel'); ?></option>
                            <option <?php if( $nd_travel_meta_box_page_layout == 'free-content' ) { echo 'selected="selected"'; } ?> value="free-content"><?php _e('Free Content','nd-travel'); ?></option>

                        </select>

                    </p>
                    <p><?php _e('Select the layout for your package page','nd-travel'); ?></p>
                </div>


                <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Sidebar','nd-travel'); ?></strong></p>
                    <p>
                        
                        <select class="nd_travel_width_100_percentage" name="nd_travel_meta_box_page_sidebar" id="nd_travel_meta_box_page_sidebar">
    
                            <option <?php if( $nd_travel_meta_box_page_sidebar == 'nd_travel_meta_box_page_layout_full_width' ) { echo 'selected="selected"'; } ?> value="nd_travel_meta_box_page_layout_full_width"><?php _e('None','nd-travel'); ?></option>
                            <option <?php if( $nd_travel_meta_box_page_sidebar == 'nd_travel_meta_box_page_layout_right_sidebar' ) { echo 'selected="selected"'; } ?> value="nd_travel_meta_box_page_layout_right_sidebar"><?php _e('Right Sidebar','nd-travel'); ?></option>
                            <option <?php if( $nd_travel_meta_box_page_sidebar == 'nd_travel_meta_box_page_layout_left_sidebar' ) { echo 'selected="selected"'; } ?> value="nd_travel_meta_box_page_layout_left_sidebar"><?php _e('Left Sidebar','nd-travel'); ?></option>

                        </select>

                    </p>
                    <p><?php _e('Select if you want the sidebar or not','nd-travel'); ?></p>
                </div>



                <div class="nd_travel_section nd_travel_padding_10 nd_travel_box_sizing_border_box">
                    <p><strong><?php _e('Related Packages','nd-travel'); ?></strong></p>
                    <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_related_packages" id="nd_travel_meta_box_related_packages" value="<?php echo $nd_travel_meta_box_related_packages ?>" /></p>
                    <p><?php _e('This is an intuitive field, enter the packages previously created in packages section ( separated by comma )','nd-travel'); ?></p>
                </div>


                <script type="text/javascript">
                  //<![CDATA[

                  jQuery(document).ready(function($){
                    var nd_travel_available_packages = [ 

                      //start all documents list
                      <?php 

                        $nd_travel_packages_args = array( 'posts_per_page' => -1, 'post_type'=> 'nd_travel_cpt_1' );
                        $nd_travel_packages = get_posts($nd_travel_packages_args); 

                        foreach ($nd_travel_packages as $nd_travel_package) :
                          echo '"'.$nd_travel_package->post_name.'",'; 
                        endforeach;
                        
                      ?>
                      //end all documents list

                    ];
                    function split( val ) {
                      return val.split( /,\s*/ );
                    }
                    function extractLast( term ) {
                      return split( term ).pop();
                    }

                    $( "#nd_travel_meta_box_related_packages" )
                      // don't navigate away from the field on tab when selecting an item
                      .on( "keydown", function( event ) {
                        if ( event.keyCode === $.ui.keyCode.TAB &&
                            $( this ).autocomplete( "instance" ).menu.active ) {
                          event.preventDefault();
                        }
                      })
                      .autocomplete({
                        minLength: 0,
                        source: function( request, response ) {
                          // delegate back to autocomplete, but extract the last term
                          response( $.ui.autocomplete.filter(
                            nd_travel_available_packages, extractLast( request.term ) ) );
                        },
                        focus: function() {
                          // prevent value inserted on focus
                          return false;
                        },
                        select: function( event, ui ) {
                          var terms = split( this.value );
                          // remove the current input
                          terms.pop();
                          // add the selected item
                          terms.push( ui.item.value );
                          // add placeholder to get the comma-and-space at the end
                          terms.push( "" );
                          this.value = terms.join( "," );
                          return false;
                        }
                      });
                  } );

                  //]]>
                  </script>

                

            </div>


            <div id="nd_travel_tab_booking">

                
              <div class="nd_travel_section nd_travel_border_bottom_1_solid_eee  nd_travel_padding_10 nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Info Request Form','nd-travel'); ?></strong></p>
                  <p>
                      
                      <select onchange="nd_travel_info_request_form_dependency()" class="nd_travel_width_100_percentage" name="nd_travel_meta_box_more_info_request_form" id="nd_travel_meta_box_more_info_request_form">
  
                          <option <?php if( $nd_travel_meta_box_more_info_request_form == 'nd_travel_meta_box_more_info_request_form_yes' ) { echo 'selected="selected"'; } ?> value="nd_travel_meta_box_more_info_request_form_yes"><?php _e('Yes','nd-travel'); ?></option>
                          <option <?php if( $nd_travel_meta_box_more_info_request_form == 'nd_travel_meta_box_more_info_request_form_not' ) { echo 'selected="selected"'; } ?> value="nd_travel_meta_box_more_info_request_form_not"><?php _e('Not','nd-travel'); ?></option>

                      </select>

                  </p>
                  <p><?php _e('Select if you want to show a cotact form on single package page','nd-travel'); ?></p>
              </div>


              <div id="nd_travel_meta_box_more_info_request_form_cf7_container" class="nd_travel_section  nd_travel_padding_10 nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Cf7 Form','nd-travel'); ?></strong></p>
                  <p>
                    <select class="nd_travel_width_100_percentage" name="nd_travel_meta_box_more_info_request_form_cf7" id="nd_travel_meta_box_more_info_request_form_cf7">
                      <?php 

                        $nd_travel_meta_box_more_info_request_form_cf7 = get_post_meta( get_the_ID(), 'nd_travel_meta_box_more_info_request_form_cf7', true );
                        $nd_travel_meta_box_more_info_request_form_cf7_args = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
                        $nd_travel_meta_box_more_info_request_form_cf7_forms = get_posts($nd_travel_meta_box_more_info_request_form_cf7_args); 

                        ?>
                      <?php foreach ($nd_travel_meta_box_more_info_request_form_cf7_forms as $nd_travel_meta_box_more_info_request_form_cf7_form) : ?>
                          <option 

                          <?php 
                            if( $nd_travel_meta_box_more_info_request_form_cf7 == $nd_travel_meta_box_more_info_request_form_cf7_form->ID ) { 
                              echo 'selected="selected"';
                            } 
                          ?>

                          value="<?php echo $nd_travel_meta_box_more_info_request_form_cf7_form->ID; ?>">
                              <?php echo $nd_travel_meta_box_more_info_request_form_cf7_form->post_title; ?>
                          </option>
                      <?php endforeach; ?>
                    </select>
                  </p>
                  <p><?php _e('Select the contact form that you want to use','nd-travel'); ?></p>
              </div> 

              <script type="text/javascript">
                //<![CDATA[
               

                function nd_travel_info_request_form_dependency(){   

                    var nd_travel_meta_box_more_info_request_form_value = jQuery( "#nd_travel_meta_box_more_info_request_form" ).val();
                    
                    if (nd_travel_meta_box_more_info_request_form_value == 'nd_travel_meta_box_more_info_request_form_not') {

                      jQuery( "#nd_travel_meta_box_more_info_request_form_cf7_container" ).addClass( "nd_travel_display_none" );

                    }else{

                      jQuery( "#nd_travel_meta_box_more_info_request_form_cf7_container" ).removeClass( "nd_travel_display_none" );

                    }

                }


               

                //]]>
              </script>

            </div>



            <div id="nd_travel_tab_map">

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_border_bottom_1_solid_eee nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Tab Title','nd-travel'); ?></strong></p>
                  <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_tab_map_tab_title" id="nd_travel_meta_box_tab_map_tab_title" value="<?php echo $nd_travel_meta_box_tab_map_tab_title ?>" /></p>
                  <p><?php _e('Insert the tab title, leave the field empty if you do not want to show the section','nd-travel'); ?></p>
              </div>

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_border_bottom_1_solid_eee nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Section Title','nd-travel'); ?></strong></p>
                  <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_tab_map_section_title" id="nd_travel_meta_box_tab_map_section_title" value="<?php echo $nd_travel_meta_box_tab_map_section_title ?>" /></p>
                  <p><?php _e('Insert the section title','nd-travel'); ?></p>
              </div>

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Content','nd-travel'); ?></strong></p>
                  <p><textarea rows="5" class="nd_travel_width_100_percentage" name="nd_travel_meta_box_tab_map_content" id="nd_travel_meta_box_tab_map_content"><?php echo $nd_travel_meta_box_tab_map_content ?></textarea></p>
                  <p><?php _e('Insert the content','nd-travel'); ?></p>
              </div>

            </div>  

            <div id="nd_travel_tab_gallery">

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_border_bottom_1_solid_eee nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Tab Title','nd-travel'); ?></strong></p>
                  <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_tab_gallery_tab_title" id="nd_travel_meta_box_tab_gallery_tab_title" value="<?php echo $nd_travel_meta_box_tab_gallery_tab_title ?>" /></p>
                  <p><?php _e('Insert the tab title, leave the field empty if you do not want to show the section','nd-travel'); ?></p>
              </div>

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_border_bottom_1_solid_eee nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Section Title','nd-travel'); ?></strong></p>
                  <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_tab_gallery_section_title" id="nd_travel_meta_box_tab_gallery_section_title" value="<?php echo $nd_travel_meta_box_tab_gallery_section_title ?>" /></p>
                  <p><?php _e('Insert the section title','nd-travel'); ?></p>
              </div>

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Content','nd-travel'); ?></strong></p>
                  <p><textarea rows="5" class="nd_travel_width_100_percentage" name="nd_travel_meta_box_tab_gallery_content" id="nd_travel_meta_box_tab_gallery_content"><?php echo $nd_travel_meta_box_tab_gallery_content ?></textarea></p>
                  <p><?php _e('Insert the content','nd-travel'); ?></p>
              </div>

            </div>

            <div id="nd_travel_tab_program">

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_border_bottom_1_solid_eee nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Tab Title','nd-travel'); ?></strong></p>
                  <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_tab_program_tab_title" id="nd_travel_meta_box_tab_program_tab_title" value="<?php echo $nd_travel_meta_box_tab_program_tab_title ?>" /></p>
                  <p><?php _e('Insert the tab title, leave the field empty if you do not want to show the section','nd-travel'); ?></p>
              </div>

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_border_bottom_1_solid_eee nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Section Title','nd-travel'); ?></strong></p>
                  <p><input class="nd_travel_width_100_percentage" type="text" name="nd_travel_meta_box_tab_program_section_title" id="nd_travel_meta_box_tab_program_section_title" value="<?php echo $nd_travel_meta_box_tab_program_section_title ?>" /></p>
                  <p><?php _e('Insert the section title','nd-travel'); ?></p>
              </div>

              <div class="nd_travel_section nd_travel_padding_10 nd_travel_box_sizing_border_box">
                  <p><strong><?php _e('Content','nd-travel'); ?></strong></p>
                  <p><textarea rows="5" class="nd_travel_width_100_percentage" name="nd_travel_meta_box_tab_program_content" id="nd_travel_meta_box_tab_program_content"><?php echo $nd_travel_meta_box_tab_program_content ?></textarea></p>
                  <p><?php _e('Insert the content','nd-travel'); ?></p>
              </div>

            </div>




            <?php do_action("nd_travel_single_cpt_1_tab_content"); ?>



        </div>

    </div>

    <script type="text/javascript">
      //<![CDATA[
      
      jQuery(document).ready(function($){

        nd_travel_info_request_form_dependency();

        $( "#nd_travel_id_metabox_cpt" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        $( "#nd_travel_id_metabox_cpt li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
      });

      //]]>
    </script>


    <?php   

}


add_action( 'save_post', 'nd_travel_meta_box_save' );
function nd_travel_meta_box_save( $post_id )
{

    $nd_travel_allowed_html = array(
    
      'iframe' => array(
          'src' => array(),
          'width' => array(),
          'height' => array(),
          'frameborder' => array(),
          'style' => array(),
          'allowfullscreen' => array()
      ),

    );


    //main settings : sanitize and validate
    $nd_travel_meta_box_destinations = sanitize_meta('nd_travel_meta_box_destinations',$_POST['nd_travel_meta_box_destinations'],'post');
    if ( isset( $nd_travel_meta_box_destinations ) ) { 

      if ( $nd_travel_meta_box_destinations != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_destinations' , $nd_travel_meta_box_destinations ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_destinations');
      }

    }

    $nd_travel_meta_box_typologies = sanitize_meta('nd_travel_meta_box_typologies',$_POST['nd_travel_meta_box_typologies'],'post');
    if ( isset( $nd_travel_meta_box_typologies ) ) { 

      if ( $nd_travel_meta_box_typologies != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_typologies' , $nd_travel_meta_box_typologies );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_typologies');
      }
       
    }

    $nd_travel_meta_box_availability_from = sanitize_meta('nd_travel_meta_box_availability_from',$_POST['nd_travel_meta_box_availability_from'],'post');
    if ( isset( $nd_travel_meta_box_availability_from ) ) { 

      if ( $nd_travel_meta_box_availability_from != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_availability_from' , $nd_travel_meta_box_availability_from ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_availability_from');
      }
      
    }

    $nd_travel_meta_box_availability_to = sanitize_meta('nd_travel_meta_box_availability_to',$_POST['nd_travel_meta_box_availability_to'],'post');
    if ( isset( $nd_travel_meta_box_availability_to ) ) { 

      if ( $nd_travel_meta_box_availability_to != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_availability_to' , $nd_travel_meta_box_availability_to ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_availability_to');
      }
      
    }


    //price settings : sanitize and validate
    $nd_travel_meta_box_price = sanitize_meta('nd_travel_meta_box_price',$_POST['nd_travel_meta_box_price'],'post');
    if ( isset( $nd_travel_meta_box_price ) ) { 

      if ( $nd_travel_meta_box_price != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_price' , $nd_travel_meta_box_price );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_price');
      }
       
    }

    $nd_travel_meta_box_promotion_price = sanitize_meta('nd_travel_meta_box_promotion_price',$_POST['nd_travel_meta_box_promotion_price'],'post');
    if ( isset( $nd_travel_meta_box_promotion_price ) ) { 

      if ( $nd_travel_meta_box_promotion_price != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_promotion_price' , $nd_travel_meta_box_promotion_price ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_promotion_price');
      }
      
    }

    $nd_travel_meta_box_new_price = sanitize_meta('nd_travel_meta_box_new_price',$_POST['nd_travel_meta_box_new_price'],'post');
    if ( isset( $nd_travel_meta_box_new_price ) ) { 

      if ( $nd_travel_meta_box_new_price != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_new_price' , $nd_travel_meta_box_new_price );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_new_price');
      }
       
    }

    $nd_travel_meta_box_promo_price = sanitize_meta('nd_travel_meta_box_promo_price',$_POST['nd_travel_meta_box_promo_price'],'post');
    if ( isset( $nd_travel_meta_box_promo_price ) ) { 

      if ( $nd_travel_meta_box_promo_price != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_promo_price' , $nd_travel_meta_box_promo_price ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_promo_price');
      }
      
    }


    //page settings : sanitize and validate
    $nd_travel_meta_box_image = esc_url_raw( $_POST['nd_travel_meta_box_image'] );
    if ( isset( $nd_travel_meta_box_image ) ) { 

      if ( $nd_travel_meta_box_image != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_image' , $nd_travel_meta_box_image ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_image');
      }
      
    }

    $nd_travel_meta_box_image_position = sanitize_option( 'nd_travel_meta_box_image_position', $_POST['nd_travel_meta_box_image_position'] );
    if ( isset( $nd_travel_meta_box_image_position ) ) { 

      if ( $nd_travel_meta_box_image_position != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_image_position' , $nd_travel_meta_box_image_position ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_image_position');
      }
      
    }

    $nd_travel_meta_box_page_layout = sanitize_option( 'nd_travel_meta_box_page_layout', $_POST['nd_travel_meta_box_page_layout'] );
    if ( isset( $nd_travel_meta_box_page_layout ) ) { 

      if ( $nd_travel_meta_box_page_layout != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_page_layout' , $nd_travel_meta_box_page_layout ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_page_layout');
      }
  
    }

    $nd_travel_meta_box_page_sidebar = sanitize_option( 'nd_travel_meta_box_page_sidebar', $_POST['nd_travel_meta_box_page_sidebar'] );
    if ( isset( $nd_travel_meta_box_page_sidebar ) ) { 

      if ( $nd_travel_meta_box_page_sidebar != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_page_sidebar' , $nd_travel_meta_box_page_sidebar );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_page_sidebar');
      }
       
    }

    $nd_travel_meta_box_related_packages = sanitize_meta('nd_travel_meta_box_related_packages',$_POST['nd_travel_meta_box_related_packages'],'post');
    if ( isset( $nd_travel_meta_box_related_packages ) ) { 

      if ( $nd_travel_meta_box_related_packages != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_related_packages' , $nd_travel_meta_box_related_packages ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_related_packages');
      }
 
    }


    //preview settings : sanitize and validate
    $nd_travel_meta_box_color = sanitize_hex_color( $_POST['nd_travel_meta_box_color'] );
    if ( isset( $nd_travel_meta_box_color ) ) {

      if ( $nd_travel_meta_box_color != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_color' , $nd_travel_meta_box_color ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_color');
      }
      
    }

    $nd_travel_meta_box_color_2 = sanitize_hex_color( $_POST['nd_travel_meta_box_color_2'] );
    if ( isset( $nd_travel_meta_box_color_2 ) ) { 

      if ( $nd_travel_meta_box_color_2 != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_color_2' , $nd_travel_meta_box_color_2 ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_color_2');
      }
      
    }

    $nd_travel_meta_box_text_preview = sanitize_meta('nd_travel_meta_box_text_preview',$_POST['nd_travel_meta_box_text_preview'],'post');
    if ( isset( $nd_travel_meta_box_text_preview ) ) { 

      if ( $nd_travel_meta_box_text_preview != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_text_preview' , $nd_travel_meta_box_text_preview ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_text_preview');
      }
      
    }

    $nd_travel_meta_box_featured_image_size = sanitize_meta('nd_travel_meta_box_featured_image_size',$_POST['nd_travel_meta_box_featured_image_size'],'post');
    if ( isset( $nd_travel_meta_box_featured_image_size ) ) { 

      if ( $nd_travel_meta_box_featured_image_size != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_featured_image_size' , $nd_travel_meta_box_featured_image_size );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_featured_image_size');
      }
       
    }

    $nd_travel_meta_box_featured_image_replace = wp_kses( $_POST['nd_travel_meta_box_featured_image_replace'], $nd_travel_allowed_html );
    if ( isset( $nd_travel_meta_box_featured_image_replace ) ) { 

      if ( $nd_travel_meta_box_featured_image_replace != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_featured_image_replace' , $nd_travel_meta_box_featured_image_replace ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_featured_image_replace');
      }
      
    }


    //booking settings : sanitize and validate
    $nd_travel_meta_box_more_info_request_form = sanitize_option( 'nd_travel_meta_box_more_info_request_form', $_POST['nd_travel_meta_box_more_info_request_form'] );
    if ( isset( $nd_travel_meta_box_more_info_request_form ) ) { 

      if ( $nd_travel_meta_box_more_info_request_form != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_more_info_request_form' , $nd_travel_meta_box_more_info_request_form ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_more_info_request_form');
      }
      
    }

    $nd_travel_meta_box_more_info_request_form_cf7 = sanitize_meta('nd_travel_meta_box_more_info_request_form_cf7',$_POST['nd_travel_meta_box_more_info_request_form_cf7'],'post');
    if ( isset( $nd_travel_meta_box_more_info_request_form_cf7 ) ) { 

      if ( $nd_travel_meta_box_more_info_request_form_cf7 != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_more_info_request_form_cf7' , $nd_travel_meta_box_more_info_request_form_cf7 ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_more_info_request_form_cf7');
      }
      
    }


   
    //map : sanitize and validate
    $nd_travel_meta_box_tab_map_tab_title = sanitize_meta('nd_travel_meta_box_tab_map_tab_title',$_POST['nd_travel_meta_box_tab_map_tab_title'],'post');
    if ( isset( $nd_travel_meta_box_tab_map_tab_title ) ) { 

      if ( $nd_travel_meta_box_tab_map_tab_title != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_map_tab_title' , $nd_travel_meta_box_tab_map_tab_title ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_map_tab_title');
      }
      
    }

    $nd_travel_meta_box_tab_map_section_title = sanitize_meta('nd_travel_meta_box_tab_map_section_title',$_POST['nd_travel_meta_box_tab_map_section_title'],'post');
    if ( isset( $nd_travel_meta_box_tab_map_section_title ) ) { 

      if ( $nd_travel_meta_box_tab_map_section_title != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_map_section_title' , $nd_travel_meta_box_tab_map_section_title );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_map_section_title');
      }
  
    }

    $nd_travel_meta_box_tab_map_content = wp_kses($_POST['nd_travel_meta_box_tab_map_content'],$nd_travel_allowed_html);
    if ( isset( $nd_travel_meta_box_tab_map_content ) ) { 

      if ( $nd_travel_meta_box_tab_map_content != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_map_content' , $nd_travel_meta_box_tab_map_content );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_map_content');
      }
 
    }

    
    //gallery : sanitize and validate
    $nd_travel_meta_box_tab_gallery_tab_title = sanitize_meta('nd_travel_meta_box_tab_gallery_tab_title',$_POST['nd_travel_meta_box_tab_gallery_tab_title'],'post');
    if ( isset( $nd_travel_meta_box_tab_gallery_tab_title ) ) { 

      if ( $nd_travel_meta_box_tab_gallery_tab_title != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_gallery_tab_title' , $nd_travel_meta_box_tab_gallery_tab_title ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_gallery_tab_title');
      }

    }

    $nd_travel_meta_box_tab_gallery_section_title = sanitize_meta('nd_travel_meta_box_tab_gallery_section_title',$_POST['nd_travel_meta_box_tab_gallery_section_title'],'post');
    if ( isset( $nd_travel_meta_box_tab_gallery_section_title ) ) { 

      if ( $nd_travel_meta_box_tab_gallery_section_title != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_gallery_section_title' , $nd_travel_meta_box_tab_gallery_section_title );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_gallery_section_title');
      }

    }

    $nd_travel_meta_box_tab_gallery_content = sanitize_meta('nd_travel_meta_box_tab_gallery_content',$_POST['nd_travel_meta_box_tab_gallery_content'],'post');
    if ( isset( $nd_travel_meta_box_tab_gallery_content ) ) { 

      if ( $nd_travel_meta_box_tab_gallery_content != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_gallery_content' , $nd_travel_meta_box_tab_gallery_content );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_gallery_content');
      }
   
    }

    //program : sanitize and validate
    $nd_travel_meta_box_tab_program_tab_title = sanitize_meta('nd_travel_meta_box_tab_program_tab_title',$_POST['nd_travel_meta_box_tab_program_tab_title'],'post');
    if ( isset( $nd_travel_meta_box_tab_program_tab_title ) ) { 

      if ( $nd_travel_meta_box_tab_program_tab_title != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_program_tab_title' , $nd_travel_meta_box_tab_program_tab_title ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_program_tab_title');
      }
     
    }

    $nd_travel_meta_box_tab_program_section_title = sanitize_meta('nd_travel_meta_box_tab_program_section_title',$_POST['nd_travel_meta_box_tab_program_section_title'],'post');
    if ( isset( $nd_travel_meta_box_tab_program_section_title ) ) { 

      if ( $nd_travel_meta_box_tab_program_section_title != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_program_section_title' , $nd_travel_meta_box_tab_program_section_title ); 
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_program_section_title');
      }

    }

    $nd_travel_meta_box_tab_program_content = sanitize_meta('nd_travel_meta_box_tab_program_content',$_POST['nd_travel_meta_box_tab_program_content'],'post');
    if ( isset( $nd_travel_meta_box_tab_program_content ) ) { 

      if ( $nd_travel_meta_box_tab_program_content != '' ) {
        update_post_meta( $post_id, 'nd_travel_meta_box_tab_program_content' , $nd_travel_meta_box_tab_program_content );
      }else{
        delete_post_meta( $post_id,'nd_travel_meta_box_tab_program_content');
      }

    }


}