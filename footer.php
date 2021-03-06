<div class="footer-wrap" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<div class="container">

				<?php if ( is_active_sidebar( 'sidebar-footer-hotposts-widget-area' ) ) { ?>

		        <?php dynamic_sidebar( 'sidebar-footer-hotposts-widget-area' ); ?>

		    <?php } ?>
		</div>

		<?php if ( true == get_theme_mod( 'mt_footer_ad', true ) ) {  ?>
			<?php $optionz = get_option("magazin_theme_options");
			if (!empty($optionz['article_ad_bottom'])) {  ?>
				<div class="advertise text-center">
					<?php echo html_entity_decode($optionz['article_ad_bottom']); ?>
				</div>
			<?php } ?>
		<?php } ?>

	<?php $option = get_option("healthclinic_theme_options"); ?>
	<?php if(is_singular('our-services')){ if(!empty($option['footer_page_services'])){ ?>
		<?php $footer_page = $option['footer_page_services']; ?>
		<?php $footer = new WP_Query("page_id=$footer_page"); while($footer->have_posts()) : $footer->the_post(); ?>
			<div class="container footer-page">
				<?php the_content(); ?>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php } } ?>
	
	<?php if(is_singular('our-staff')){ if(!empty($option['footer_page_staff'])){ ?>
		<?php $footer_page = $option['footer_page_staff']; ?>
		<?php $footer = new WP_Query("page_id=$footer_page"); while($footer->have_posts()) : $footer->the_post(); ?>
			<div class="container footer-page">
				<?php the_content(); ?>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php } } ?>
	<?php if(!empty($option['footer_page'])){ ?>
		<?php $footer_page = $option['footer_page']; ?>
		<?php $footer = new WP_Query("page_id=$footer_page"); while($footer->have_posts()) : $footer->the_post(); ?>
			<div class="container footer-page">
				<?php the_content(); ?>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	<?php } ?>
	<?php if(!empty($option['footer_top']) or !empty($option['footer_bottom'])){ ?>
		<div class="footer">
			<?php healthclinic_footer_2(); ?>
		</div>
	<?php } ?>
	<div class="mt-f-data"><div  data-facebook="<?php $data = get_option("facebook_username"); if(!empty($data)) { echo esc_attr($data); } else { echo "empty"; } ?>"
			data-token="<?php $data = get_option("facebook_token"); if(!empty($data)) { echo esc_attr($data); } else { echo "empty"; } ?>"
			data-twitter="<?php $data = get_option("twitter_username"); if(!empty($data)) { echo esc_attr($data); } else { echo "empty"; } ?>"
			data-youtube="<?php  $data = get_option("youtube_username"); if(!empty($data)) { echo esc_attr($data); } else { echo "empty"; } ?>"></div></div>
	</div>
</div>

<a href="#" class="footer-scroll-to-top"></a>
<?php  wp_footer(); ?>
</body>
</html>
