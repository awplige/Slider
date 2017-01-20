<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Slider Output Code
 */
//js
wp_enqueue_script('jquery');
wp_enqueue_script('imagesloaded');
//wp_enqueue_script( 'jquery-sliderPro-js',  MS_PLUGIN_URL .'js/jquery.sliderPro.js', array( 'jquery' ), '', true  );
wp_enqueue_script( 'jquery-sliderPro-min-js',  MS_PLUGIN_URL .'js/jquery.sliderPro.min.js', array( 'jquery' ), '', true  );

//wp_enqueue_style('awl-ms-slider-pro-css', MS_PLUGIN_URL .'css/awl-ms-slider-pro.css');
wp_enqueue_style('awl-ms-slider-pro-min-css', MS_PLUGIN_URL .'css/awl-ms-slider-pro.min.css');

// custom bootstrap css
wp_enqueue_style('awl-ms-bootstrap-css', MS_PLUGIN_URL .'css/bootstrap.css');
//css

 
$media_slider_id = $post_id['id'];
 
$all_sliders = array(  'p' => $media_slider_id, 'post_type' => 'media_slider', 'orderby' => 'ASC');
$loop = new WP_Query( $all_sliders );

while ( $loop->have_posts() ) : $loop->the_post();

	$post_id = get_the_ID();
	$slider_settings = unserialize(base64_decode(get_post_meta( $post_id, 'awl_ms_settings_'.$post_id, true)));
	
	//echo "<pre>";
	//print_r ($slider_settings);	
	//echo "</pre>";
	
	//Slide
	$width = $slider_settings['width'];
	$height = $slider_settings['height'];
	$slide_autoheight = $slider_settings['slide_autoheight'];
	$slide_imagescalemode = $slider_settings['slide_imagescalemode'];
	$slide_imagecenter = $slider_settings['slide_imagecenter'];
	$slide_scaleup = $slider_settings['slide_scaleup'];
	$slide_autoslidesize = $slider_settings['slide_autoslidesize'];
	$start_slide = $slider_settings['start_slide'];
	$shuffle_slide = $slider_settings['shuffle_slide'];
	$slide_orientation = $slider_settings['slide_orientation'];
	$slide_caption = $slider_settings['slide_caption'];
	$slide_distance = $slider_settings['slide_distance'];
	$slide_force_size = $slider_settings['slide_force_size'];
	$slide_loop = $slider_settings['slide_loop'];
	$slide_direction = $slider_settings['slide_direction'];
	$slide_animation_duration = $slider_settings['slide_animation_duration'];
	$height_animation_duration = $slider_settings['height_animation_duration'];
	$slide_visiblesize = $slider_settings['slide_visiblesize'];
	
	//BreakPoints
	$slider_breakpoints = $slider_settings['slider_breakpoints'];
	$bp_setting_screen = $slider_settings['bp_setting_screen'];
	$bp_setting_thumbpos = $slider_settings['bp_setting_thumbpos'];
	$bp_setting_thumbwidth = $slider_settings['bp_setting_thumbwidth'];
	$bp_setting_thumbheight = $slider_settings['bp_setting_thumbheight'];
	$bp2_setting_screen = $slider_settings['bp2_setting_screen'];
	$bp2_setting_thumbpos = $slider_settings['bp2_setting_thumbpos'];
	$bp2_setting_thumbwidth = $slider_settings['bp2_setting_thumbwidth'];
	$bp2_setting_thumbheight = $slider_settings['bp2_setting_thumbheight'];
		
	//Fade 
	$slide_fade = $slider_settings['slide_fade'];
	$slide_fade_previous = $slider_settings['slide_fade_previous'];
	$slide_fade_duration = $slider_settings['slide_fade_duration'];
	$slide_fade_caption = $slider_settings['slide_fade_caption'];	
	$slide_fade_caption_duration = $slider_settings['slide_fade_caption_duration'];
	
	//Autoplay
	$slide_autoplay = $slider_settings['slide_autoplay'];
	$slide_autoplay_delay = $slider_settings['slide_autoplay_delay'];
	$slide_autoplay_direction = $slider_settings['slide_autoplay_direction'];
	$slide_autoplay_hover = $slider_settings['slide_autoplay_hover'];
	
	//Arrows
	$slide_arrows = $slider_settings['slide_arrows'];
	$slide_arrows_fade = $slider_settings['slide_arrows_fade'];
	
	//Navigation
	$slide_buttons = $slider_settings['slide_buttons'];
	$slide_keyboard = $slider_settings['slide_keyboard'];
	$slide_keyboard_focus = $slider_settings['slide_keyboard_focus'];
	
	//TouchSwipe
	$slide_touchwipe = $slider_settings['slide_touchwipe'];
	$slide_touchwipe_threshold = $slider_settings['slide_touchwipe_threshold'];
	
	//FullScreen Button	
	$slide_fullscreen_btn = $slider_settings['slide_fullscreen_btn'];
	$slide_fullscreen_btnfade = $slider_settings['slide_fullscreen_btnfade'];
	
	//Layers
	$slide_waitforlayers = $slider_settings['slide_waitforlayers'];
	$slide_autoscalelayers = $slider_settings['slide_autoscalelayers'];
	
	//Update Hash
	$slide_updhash = $slider_settings['slide_updhash'];
	
	//Image Sizes
	$slide_img_small = $slider_settings['slide_img_small'];
	$slide_img_medium = $slider_settings['slide_img_medium'];
	$slide_img_large = $slider_settings['slide_img_large'];
	
	//Thumbnails
	$slide_thumb = $slider_settings['slide_thumb'];
	$slide_thumbtype = $slider_settings['slide_thumbtype'];
	$slide_thumb_width = $slider_settings['slide_thumb_width'];
	$slide_thumb_height = $slider_settings['slide_thumb_height'];
	$slide_thumb_pos = $slider_settings['slide_thumb_pos'];
	$slide_thumb_pointer = $slider_settings['slide_thumb_pointer'];
	$slide_thumb_arrows = $slider_settings['slide_thumb_arrows'];
	$slide_thumb_arrowsfade = $slider_settings['slide_thumb_arrowsfade'];
	$slide_thumb_touchswipe = $slider_settings['slide_thumb_touchswipe'];
	
	//Video
	$videoaction_reach = $slider_settings['videoaction_reach'];
	$videoaction_leave = $slider_settings['videoaction_leave'];
	$videoaction_play = $slider_settings['videoaction_play'];
	$videoaction_pause = $slider_settings['videoaction_pause'];
	$videoaction_end = $slider_settings['videoaction_end'];
	
	//Text Area
	$slide_text = $slider_settings['slide_text'];
	$slide_text_pos = $slider_settings['slide_text_pos'];
	$show_text_trans = $slider_settings['show_text_trans'];
	$hide_text_trans = $slider_settings['hide_text_trans'];
	$slide_link_show = $slider_settings['slide_link_show'];
	$slide_link_text = $slider_settings['slide_link_text'];
	$slide_link_target = $slider_settings['slide_link_target'];
	
	
	// start the Media Slider contents
	?>
	<div id="image_gallery_<?php echo $media_slider_id; ?>" class="row all-images">
		<div class="slider-pro" id="my-slider-<?php echo $media_slider_id; ?>">
			<div class="sp-slides">
			<?php
				if(isset($slider_settings['media-slide-ids']) && count($slider_settings['media-slide-ids']) > 0) {
					$count = 0;
					foreach($slider_settings['media-slide-ids'] as $attachment_id) {
						$thumb = wp_get_attachment_image_src($attachment_id, 'thumb', true);
						$thumbnail = wp_get_attachment_image_src($attachment_id, 'thumbnail', true);
						$medium = wp_get_attachment_image_src($attachment_id, 'medium', true);
						$large = wp_get_attachment_image_src($attachment_id, 'large', true);
						$full = wp_get_attachment_image_src($attachment_id, 'full', true);
						$attachment_details = get_post( $attachment_id );
						//$src = $attachment_details->guid;
						$title = $attachment_details->post_title;
						$slide_desc =  $slider_settings['media-slide-desc'][$count];				
						$slide_type =  $slider_settings['media-slide-type'][$count];
						$slide_link =  $slider_settings['media-slide-link'][$count];
						
						if($slide_text_pos == "topleft" || $slide_text_pos == "top" || $slide_text_pos == "topright" ||
							$slide_text_pos == "bottomleft" || $slide_text_pos == "bottom" || $slide_text_pos == "bottomright") {
							$dv1 = 50;
							$dh1 = 50;		
						}
						if($slide_text_pos == "left" || $slide_text_pos == "center" || $slide_text_pos == "right") {
							$dv1 = 15;
							$dh1 = 20;		
						}
						if($slide_text_pos == "topright" || $slide_text_pos == "right" || $slide_text_pos == "bottomright") {
							$align = "right";
						}
						if($slide_text_pos == "top" || $slide_text_pos == "center" || $slide_text_pos == "bottom") {
							$align = "center";
						}
							?>
									<div class="sp-slide">
										<?php if($slide_type == "i") { ?>
											<!-- IMG  TYPE 1 -->
												<img class="sp-image" src="/image/blank.gif"
													data-src="<?php echo $full[0]; ?>"
													data-small="<?php echo $thumb[0]; ?>"
													data-medium="<?php echo $full[0]; ?>"
													data-large="<?php echo $large[0]; ?>"
													data-retina="<?php echo $full[0]; ?>"
													/>
												
												<?php if($slide_text == "true") {?>
												<p class="sp-layer sp-white sp-padding" align="<?php echo $align; ?>"
													data-position="<?php echo $slide_text_pos; ?>" data-vertical="<?php echo $dv1; ?>" data-horizontal="<?php echo $dh1; ?>" 
													data-show-transition="<?php echo $show_text_trans; ?>" data-show-delay="500" data-hide-transition="<?php echo $hide_text_trans; ?>">
													<?php if($title != NULL) { ?><span class="title-css"><?php echo $title; ?></span><br><?php } ?>
													<?php if($slide_desc != NULL) { ?><span class="desc-css"><?php echo $slide_desc;  ?></span><br><?php } ?>
													<?php if($slide_link_show == "true" && $slide_link != NULL) { ?><span class="link-css"><?php echo "<a href='$slide_link' target='$slide_link_target'>$slide_link_text&raquo;</a>"; ?></span><?php } ?>
												</p>
												<?php } ?>
												
											<!-- Caption Type 1-->
												<?php if($slide_thumb == "false" && $slide_caption == "true") { ?> <p class="sp-caption"><?php echo $title; ?></p> <?php } ?>
										<?php } ?>
										<?php if($slide_type == "v") {?>
												<a class="sp-video" href="<?php echo $slide_link; ?>" >
													<img class="sp-image" src="/image/blank.gif"
													data-src="<?php echo $full[0]; ?>"
													data-small="<?php echo $thumb[0]; ?>"
													data-medium="<?php echo $full[0]; ?>"
													data-large="<?php echo $large[0]; ?>"
													data-retina="<?php echo $full[0]; ?>"
													/>
												</a>
												<?php if($slide_thumb == "false" && $slide_caption == "true") { ?> <p class="sp-caption"><?php echo $title; ?></p> <?php } ?>
											
										<?php } ?>
									</div>
							<?php
						$count++;
					}// end of attachment foreach
				} else {
					_e('Sorry! No media slider found ', MSP_TXTDM);
					echo ": [MD-SL id=$post_id]";
				} // end of if else of slides avaialble check into slider
				?>
			</div>	
			<?php if($slide_thumb == "true") {?>
			<div class="sp-thumbnails">
				<?php
				if(isset($slider_settings['media-slide-ids']) && count($slider_settings['media-slide-ids']) > 0) {
					$count = 0;
					foreach($slider_settings['media-slide-ids'] as $attachment_id) {
						$thumb = wp_get_attachment_image_src($attachment_id, 'thumb', true);
						$thumbnail = wp_get_attachment_image_src($attachment_id, 'thumbnail', true);
						$medium = wp_get_attachment_image_src($attachment_id, 'medium', true);
						$large = wp_get_attachment_image_src($attachment_id, 'large', true);
						$full = wp_get_attachment_image_src($attachment_id, 'full', true);
						$attachment_details = get_post( $attachment_id );
						//$src = $attachment_details->guid;
						$title = $attachment_details->post_title;
						//$description = $attachment_details->post_content;				
						$slide_type =  $slider_settings['media-slide-type'][$count];
						$slide_link =  $slider_settings['media-slide-link'][$count];
						$slide_desc =  $slider_settings['media-slide-desc'][$count];
							?>			
								<?php if($slide_thumbtype == "image") { ?>
									<img class="sp-thumbnail" src="<?php echo $full[0]; ?>"/>
								<?php } ?>
								<?php if($slide_thumbtype == "text") { ?>
								<div class="sp-thumbnail">
									<div class="sp-caption sp-thumbnail-title"><strong><?php echo $title; ?></strong></div>
									<div class="sp-thumbnail-description"><?php echo $slide_desc; ?></div>
								</div>
								<?php } ?>
								<?php if($slide_thumbtype == "both") { ?>
								<div class="sp-thumbnail">
									<div class="sp-thumbnail-image-container-<?php echo $media_slider_id; ?>">
										<img class="sp-thumbnail-image-<?php echo $media_slider_id; ?>" src="<?php echo $thumb[0]; ?>"/>
									</div>
									<div class="sp-thumbnail-text-<?php echo $media_slider_id; ?>">
										<div class="sp-thumbnail-title"><strong><?php echo $title; ?></strong></div>
										<div class="sp-thumbnail-description"><?php echo $slide_desc; ?></div>
									</div>
								</div>
								<?php } ?>
							<?php
						$count++;
					}// end of attachment foreach
				} else {
					_e('Sorry! No media slider found ', MSP_TXTDM);
					echo ": [MD-SL id=$post_id]";
				} // end of if else of slides avaialble check into slider
				?>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php
	endwhile;
	?>
<style>
<?php if($slide_thumbtype == "text") { ?>
.sp-thumbnail {
	<?php if($slide_thumb_pos == "top" || $slide_thumb_pos == "bottom") { ?>
	padding: 8px;
	<?php } ?>
	<?php if($slide_thumb_pos == "right" || $slide_thumb_pos == "left") { ?>
	padding: 10px;
	<?php } ?>
	background-color: #F0F0F0;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
.sp-thumbnail-title {
	text-transform: uppercase;
	color: #333;
}
.sp-thumbnail-description {
	font-size: 13px;
	color: #333;
}
<?php } ?>
<!-- Slide Thumbnails -->
<?php if($slide_thumbtype == "both") { ?>
.sp-thumbnail-image-container-<?php echo $media_slider_id; ?> {
	width: 40%;
	height: <?php echo $slide_thumb_height; ?>px !important;
	overflow: hidden;
	float: left;
}

.sp-thumbnail-image-<?php echo $media_slider_id; ?> {
	height: 100% !important;
}

.sp-thumbnail-text-<?php echo $media_slider_id; ?> {
	width: 60%;
    float: right;
	text-align : left;
	padding-left : 8px;
	padding-right : 8px;
	padding-bottom : 8px;
	height: <?php echo $slide_thumb_height; ?>px;
	<?php if($slide_thumb_pos == "top") { ?>
    padding-top: 22px !important;
	<?php } else if($slide_thumb_pos == "bottom") {?> 
	padding-top: 3px !important;
	<?php } else if($slide_thumb_pos == "left") {?> 
	padding-top: 3px;
	<?php } else if($slide_thumb_pos == "right") {?> 
	padding-top: 3px;
	<?php } ?>
    background-color: #F0F0F0;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.sp-thumbnail-title {
	margin-bottom: 2px;
	text-transform: uppercase;
	color: #333;
}

.sp-thumbnail-description {
	font-size: 13px;
	color: #333;
}

@media (max-width: 500px) {
	.sp-thumbnail {
		text-align: center;
	}

	.sp-thumbnail-image-container {
		display: none;
	}

	.sp-thumbnail-text {
		width: 120px;
	}

	.sp-thumbnail-title {
		font-size: 12px;
		text-transform: uppercase;
	}

	.sp-thumbnail-description {
		display: none;
	}
}
<?php } ?>
.title-css {
	font-size : 18px;
	font-weight: bolder;
	text-transform: uppercase;
}
.desc-css {
	font-size : 16px;
}
.link-css {
	font-size : 16px;
}
</style>
<script type="application/javascript">
    jQuery( document ).ready(function( jQuery ) {
        jQuery( "#my-slider-<?php echo $media_slider_id; ?>").sliderPro({
			width : <?php echo $width; ?>,
			height : <?php echo $height; ?>,   
			smallSize : <?php echo $slide_img_small; ?>,
			mediumSize : <?php echo $slide_img_medium; ?>,
			largeSize : <?php echo $slide_img_large; ?>,
			//Slide
			imageScaleMode : '<?php echo $slide_imagescalemode; ?>',
			centerImage : <?php echo $slide_imagecenter; ?>,
			allowScaleUp : <?php echo $slide_scaleup; ?>,
			autoSlideSize : <?php echo $slide_autoslidesize; ?>,
			autoHeight:<?php echo $slide_autoheight; ?>,
			startSlide : <?php echo $start_slide; ?>,
			shuffle : <?php echo $shuffle_slide ?>,
			orientation : '<?php echo $slide_orientation; ?>',
			slideDistance : <?php echo $slide_distance; ?>,
			forceSize : '<?php echo $slide_force_size; ?>',
			loop : <?php echo $slide_loop; ?>,
			<?php if($slider_breakpoints == 'true') { ?>
			breakpoints :{
				<?php echo $bp_setting_screen; ?>: {
					thumbnailsPosition: '<?php echo $bp_setting_thumbpos; ?>',
					thumbnailWidth: <?php echo $bp_setting_thumbwidth; ?>,
					thumbnailHeight: <?php echo $bp_setting_thumbheight; ?>
				},
				<?php echo $bp2_setting_screen; ?>: {
					thumbnailsPosition: '<?php echo $bp2_setting_thumbpos; ?>',
					thumbnailWidth: <?php echo $bp2_setting_thumbwidth; ?>,
					thumbnailHeight: <?php echo $bp2_setting_thumbheight; ?>
				}
			},
			<?php } ?>
			slideAnimationDuration : <?php echo $slide_animation_duration; ?>,
			heightAnimationDuration : <?php echo $height_animation_duration; ?>,
			visibleSize : '<?php echo $slide_visiblesize; ?>',
			rightToLeft : <?php echo $slide_direction; ?>,
			waitForLayers : <?php echo $slide_waitforlayers; ?>,
			autoScaleLayers : <?php echo $slide_autoscalelayers; ?>,
			updateHash : <?php echo $slide_updhash; ?>,
			//Fade 
			fade: <?php echo $slide_fade; ?>,
			fadeOutPreviousSlide: <?php echo $slide_fade_previous; ?>,
			fadeDuration : <?php echo $slide_fade_duration; ?>,
			fadeCaption: <?php echo $slide_fade_caption; ?>,
			captionFadeDuration: <?php echo $slide_fade_caption_duration; ?>,
			//Auto
			autoplay : <?php echo $slide_autoplay; ?>,
			autoplayDelay : <?php echo $slide_autoplay_delay; ?>,
			autoplayDirection : '<?php echo $slide_autoplay_direction; ?>',
			autoplayOnHover : '<?php echo $slide_autoplay_hover; ?>',
			//Navigation
			arrows: <?php echo $slide_arrows; ?>,
			fadeArrows: <?php echo $slide_arrows_fade; ?>,
			buttons: <?php echo $slide_buttons; ?>,
			keyboard : <?php echo $slide_keyboard; ?>,
			keyboardOnlyOnFocus : <?php echo $slide_keyboard_focus; ?>,
			touchSwipe : <?php echo $slide_touchwipe; ?>,
			touchSwipeThreshold : <?php echo $slide_touchwipe_threshold; ?>,
			fullScreen : <?php echo $slide_fullscreen_btn; ?>,
			fadeFullScreen : <?php echo $slide_fullscreen_btnfade; ?>,
			//Video		
			reachVideoAction : '<?php echo $videoaction_reach; ?>',
			leaveVideoAction : '<?php echo $videoaction_leave; ?>',
			playVideoAction : '<?php echo $videoaction_play; ?>',
			pauseVideoAction : '<?php echo $videoaction_pause; ?>',
			endVideoAction : '<?php echo $videoaction_end; ?>',
			//Thumbnails
			thumbnailWidth : <?php echo $slide_thumb_width; ?>,
			thumbnailHeight : <?php echo $slide_thumb_height; ?>,
			thumbnailsPosition : '<?php echo $slide_thumb_pos; ?>',
			thumbnailPointer : <?php echo $slide_thumb_pointer; ?>,
			thumbnailArrows : <?php echo $slide_thumb_arrows; ?>,
			fadeThumbnailArrows : <?php echo $slide_thumb_arrowsfade; ?>,
			thumbnailTouchSwipe : <?php echo $slide_thumb_touchswipe; ?>
		});		
    });
</script>