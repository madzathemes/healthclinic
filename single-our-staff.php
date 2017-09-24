<?php
/**
 * @author madars.bitenieks
 * @copyright 2017
 */

get_header();
$src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array( 999,999 ), false, '' );
?>
<div class="mt-container-wrap"  itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

	<div class="container mt-content-container">


			<?php /* Sidebar Meta from Magazin framework */
			$layouts = get_post_meta(get_the_ID(), "magazin_page_sidebar", true);

			if(!empty($layouts)){
				$layout= $layouts;
			} else {
				$layout = "3";
			}
			$float_layout = "pull-left";
			$float_sidebar = "pull-right";

			if ($layout == "2") {
				$float_layout = "pull-right";
				$float_sidebar = "pull-left";
			}

			$more = 0;

			if ($layout == "3") {
			?>
			<div class="row">
					<div class="col-md-12">


			<div class="entry-page-image mt-radius">

					<?php

					if(has_post_thumbnail()) {

						echo get_the_post_thumbnail( get_the_ID(), array('1300', '', ''), $src[0] );

					}

					?>

			</div>

		<div class="mt-content-text">	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php  the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>
	</div>
<?php } else { ?>

<div class="row">
	<div class="col-md-<?php if ($layout == "3" or $layout == "") { echo "12 ";  } else {  echo "8 ";  } echo sanitize_html_class($float_layout); ?> ">
		<div class="entry-page-image mt-radius">

				<?php

				if(has_post_thumbnail()) {

					echo get_the_post_thumbnail( get_the_ID(), array('854', '', ''), $src[0] );

				}

				?>

		</div>
		<div class="mt-content-text">		<?php if ( have_posts() ) while ( have_posts() ) : the_post();

					the_content();
					comments_template( '', true );

				endwhile;  ?>
			</div>

	</div>

	<?php if ($layout == "3" or $layout == "") {} else { ?>

		<div class="col-md-4 sidebar <?php echo sanitize_html_class($float_sidebar); ?> " temscope="itemscope" itemtype="http://schema.org/WPSideBar"><?php get_sidebar(); ?></div>

	<?php } ?>

</div>

<?php

}

?>

</div>
</div>
<?php get_footer(); ?>
