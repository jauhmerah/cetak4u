<?php
add_shortcode( 'GPV', 'GPV_shortcode' );
function GPV_shortcode($post)
{
	ob_start();
	$id=$post['id'];
	$show_gallery_posts = array( 'p' => $id, 'post_type' => 'gpv_gallery', 'orderby' => 'ASC');
	$gallery_loop = new WP_Query( $show_gallery_posts );
	while ( $gallery_loop->have_posts() ) : $gallery_loop->the_post();
	if(isset($id)){
		$data_setting = unserialize(get_post_meta($id,'GPV_custom_setting_'.$id, true));
		$GPV_Record = unserialize(base64_decode(get_post_meta( $id, 'GPV_photos_details', true)));
		$TotalImg =  get_post_meta( $id, 'GPV_images_count', true );
		$linkopen= ($data_setting['GPV_setting_link_open']=='Yes')?'_blank':'_self';
		
	}	
	if($data_setting['GPV_setting_lightbox']=="Swipe_Box"){
		$lightboxclass='class="'.$data_setting['GPV_setting_lightbox'].' gpv-link-btn"';
	}			
	?>
	<style type="text/css">
	.GPV_wrapper_<?php echo $id;?> .grid-title{
		text-align:<?php echo $data_setting['GPV_setting_title_position'];?>; 
		color: <?php echo $data_setting['GPV_setting_title_color'];?>!important; 
	}

	/**GPV_my-grid_ color start**/
	.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?>{
		background: <?php echo $data_setting['GPV_setting_container_background_color'];?>;		
		
	}
	.GPV_wrapper_<?php echo $id;?> .gpv_bg_color{
		background: <?php echo $data_setting['GPV_setting_container_open_color'];?>;
	}
	/**GPV_my-grid_ color start**/

	/**GPV_my-grid_ font start**/
	.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details-content,
	.GPV_wrapper_<?php echo $id;?> .grid-title{
		font-family:<?php echo $data_setting['GPV_setting_font_style'];?>!important;
	}
	/**GPV_my-grid_ font end**/

	/**image-layout start**/
	<?php if($data_setting['GPV_setting_image_layout']=='cir'){?>
		.GPV_my-grid_<?php echo $id;?> .img-responsive,
		.GPV_my-grid_<?php echo $id;?> .pic-caption{		
			border-radius: 50%;
		}
		<?php } ?>
		/**image-layout end**/

		/**grid-details-content bg color start**/
		<?php 
		if($data_setting['GPV_setting_img_border_show']=='Yes'){
			?>
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-thumbnail-content{
				border: <?php echo($data_setting['GPV_setting_img_border_size']==1 || $data_setting['GPV_setting_img_border_size']==2)?$data_setting['GPV_setting_img_border_size']:'';?>px solid <?php echo $data_setting['GPV_setting_img_border_color']?>;			
			}
			<?php
			} ?>

			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details-content{
				background: <?php echo $data_setting['GPV_setting_open_img_background_color'];?>;

			}
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-arrow{
				border-bottom-color: <?php echo $data_setting['GPV_setting_open_img_background_color'];?>;
			}
			/**grid-details-content bg color end**/

			/**label color start**/
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-image-label{
				text-align: <?php echo $data_setting['GPV_setting_label_position'];?>;
				font-family:<?php echo $data_setting['GPV_setting_font_style'];?>;
			}
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .hover-label{
				font-family:<?php echo $data_setting['GPV_setting_font_style'];?>!important;
			}
			/**label color end**/

			/**button color start**/
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details-content .gpv-link-btn{
				float: <?php echo($data_setting['GPV_setting_button_position']=='left')?'left':'';?>!important;
				background: <?php echo $data_setting['GPV_setting_button_background_color'];?>;
				border-color:<?php echo $data_setting['GPV_setting_button_border_color'];?>!important;
				color:<?php echo $data_setting['GPV_setting_button_text_color'];?>!important;  
			}
			/**button color end**/

			/**description color start**/
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-description{
				color:<?php echo $data_setting['GPV_setting_description_text_color'];?>!important;  
				text-align: justify;
				font-size: 17px;
				margin-top:<?php //echo ($data_setting['GPV_setting_label']!='Yes')?'1em;':'';?>!important;   
				font-family:<?php echo $data_setting['GPV_setting_font_style'];?>!important;
			}
			/**description color end**/

			/**close color start**/
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details .grid-close:before,
			.GPV_wrapper_<?php echo $id;?> .GPV_my-grid_<?php echo $id;?> .grid-details .grid-close:after{
				background: <?php echo $data_setting['GPV_setting_close_icon_color']; ?>;
			}

			/**close color end**/		

			/**custom css**/
			<?php echo $data_setting['GPV_setting_Custom_CSS']; ?>
			/**custom css**/
			</style>
			<script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
			<script type="text/javascript">
			
			WebFont.load({
				google: {families:['<?php echo $data_setting["GPV_setting_font_style"];?>'] 
			}
		});
			</script>
			<section class="GPV_wrapper GPV_wrapper_<?php echo $id;?> clearfix">
				<?php 
				if($data_setting['GPV_setting_title']=='Yes'){?>
				<div class="heading_title">
					<h2 class="grid-title"><?php _e( ucfirst(get_the_title($id)), GPV_TEXTDOMAIN ); ?></h2>
				</div>
				<?php	}	?>
				<?php 
				if(!empty($GPV_Record[0])){
					?>
					<div class="gpv_container GPV_my-grid_<?php echo $id;?> gpv_cfix">
						<?php 
						foreach ($GPV_Record as $data) {
							if($data_setting["GPV_setting_column_layout"]==1){
								$crop_img=$data['GPV_img_url'];
							}else if($data_setting["GPV_setting_column_layout"]<=4){
								$crop_img=$data['gpv_img_500'];
							}
							?>		
							<!-- GPV item start -->
							<div class="grid-item" >
								<div class="grid-thumbnail">
									<div class="grid-thumbnail-content pic" style="color:#FFF;">						
										<img class="img-responsive" src="<?php echo $crop_img; ?>" alt="image">
										<?php 
										if($data_setting['GPV_setting_icon_open']=='Yes'){
											if($data['GPV_select']=='Video'){ ?>
											<div class="gpv-play-icon"></div>
											<?php } }?>
											<span class="pic-caption <?php echo($data_setting['GPV_setting_hover_effect_show']=='Yes')?$data_setting['GPV_setting_hover_effect']:''; ?>">
												<h2 class="hover-label"><?php _e( ucfirst($data['GPV_image_title']), GPV_TEXTDOMAIN ); ?></h2>										
											</span>
										</div>
										<div class="grid-arrow"></div>	
									</div>
									<div class="grid-details">
										<span class="grid-close"></span>
										<div class="grid-details-content">
											<div class="grid_container grid_exemplo">
												<div class="row">
													<div class="col-md-6 gpv_cfix">
														<?php 
														if($data['GPV_select']=='Image'){
															?>
															<img class="img-responsive animated_gpv" src="<?php echo $data['GPV_img_url']; ?>" alt="image">
															<?php
														}else if($data['GPV_select']=='Video'){

															if(!empty($data['GPV_video_url'])){
																if (preg_match('/youtube/',$data['GPV_video_url'])){
																	$embed_url= explode('=', $data['GPV_video_url']);
																	$embed_url='https://www.youtube.com/embed/'.end($embed_url);		

																}else if(preg_match('/vimeo/',$data['GPV_video_url'])){
																	$embed_url= explode('/', $data['GPV_video_url']);		
																	$embed_url='https://player.vimeo.com/video/'.end($embed_url);
																}													
																?>
																<iframe class="video v1" style="width:100%; height:<?php echo (!empty($data['GPV_video_iframe']))?$data["GPV_video_iframe"]:'300'; ?>px;" src="<?php echo $embed_url;?>" frameborder="0" allowfullscreen></iframe>
																<?php
															}else{
																?>
																<img class="img-responsive animated_gpv" src="<?php echo $data['GPV_img_url']; ?>" alt="image">
																<?php
															}
														}else if($data['GPV_select']=='Link'){
															?>
															<img class="img-responsive animated_gpv" src="<?php echo $data['GPV_img_url']; ?>" alt="image">
															<?php												
														}
														?>
													</div>
													<div class="col-md-6">
														<?php if($data_setting['GPV_setting_label']=='Yes'){?>
														<h2 class="animated_gpv grid-image-label"><?php _e( ucfirst($data['GPV_image_title']), GPV_TEXTDOMAIN ); ?></h2><hr>
														<?php }	?>
														<?php 
														if($data_setting['GPV_setting_description']=='Yes'){?>
														<p class="animated_gpv grid-description">

															<?php 
															if(empty($data_setting['GPV_setting_description_char']) || $data_setting['GPV_setting_description_char']>=401 )
															{
																$data_setting['GPV_setting_description_char']=400;
															}
														//echo substr($data['GPV_description'] ,0,$data_setting['GPV_setting_description_char']); 
															_e( substr($data['GPV_description'] ,0,$data_setting['GPV_setting_description_char']), GPV_TEXTDOMAIN );
															?>
														</p>
														<?php }	?>
														<?php												
														if($data['GPV_select']=='Image'){
															$btnurl=$data['GPV_img_url'];
															?>											
															<a href="<?php echo $btnurl;?>" <?php echo $lightboxclass; ?> title="<?php echo $data['GPV_button_text']; ?>" target="<?php echo $linkopen; ?>" ><?php _e( $data['GPV_button_text'], GPV_TEXTDOMAIN ); ?>
															</a>
															<?php										

														}else if($data['GPV_select']=='Video'){
															$btnurl=$data['GPV_video_url'];
															if(empty($btnurl)){
																$btnurl=$data['GPV_img_url'];
															}
															?>
															<a href="<?php echo $btnurl;?>" <?php echo $lightboxclass; ?> title="<?php echo $data['GPV_button_text']; ?>" target="<?php echo $linkopen; ?>" ><?php _e( $data['GPV_button_text'], GPV_TEXTDOMAIN ); ?>
															</a>
															<?php
														}else if($data['GPV_select']=='Link'){
															$btnurl=esc_url($data['GPV_link']);
															$lightboxclass='class=""';
															?>
															<a  href="<?php echo $btnurl;?>"  <?php echo $lightboxclass; ?> title="<?php echo $data['GPV_button_text']; ?>" target="<?php echo $linkopen; ?>" ><?php _e( $data['GPV_button_text'], GPV_TEXTDOMAIN ); ?></a>
															<?php
														}																							
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- GPV item end -->	
								<?php 
							}
							?>	

						</div>
						<?php
					}else{
						?>
						<h2 style="text-align:center; color:red; margin-top: 20px!important;"><?php _e( 'Empty Gallery.', GPV_TEXTDOMAIN ); ?></h2>
						<?php
					}
					?>				
				</section>

				<script type="text/javascript">
				jQuery(document).ready(function(){
					var section_grid=jQuery('.GPV_my-grid_<?php echo $id;?>');
					var lightbox_obj=section_grid.find('.<?php echo $data_setting["GPV_setting_lightbox"]; ?>');
					var GPV_lightbox='<?php echo $data_setting["GPV_setting_lightbox"]; ?>';		
					section_grid.GPVGRID(
					{				
						column:'<?php echo $data_setting["GPV_setting_column_layout"] ?>',
					});

					if(GPV_lightbox=='Swipe_Box'){

						/* swipebox jquery start*/
						lightbox_obj.swipebox({		
							hideBarsDelay:0,
							hideCloseButtonOnMobile : false,
						});
						/* swipebox jquery end*/
					}
				});
				</script>
				<?php
				endwhile;
				return ob_get_clean();
			}
			?>