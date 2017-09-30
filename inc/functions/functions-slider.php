<?php

function healthclinic_slider() {

$entries = get_post_meta( get_the_ID(), 'madza_slider_group', true );
$slider = get_post_meta( get_the_ID(), 'madzaplug_slider_type', true );
$slides = ""; if (!empty($slider)) { $slides = $slider; }

if ( $slides=="slider-mt" ) {

if (!empty($entries)) { ?>
<div class="mt-slider">
  <span class="mt-slider-nav mt-slider-next"> next ></span>
  <span class="mt-slider-nav mt-slider-prev">< prev </span>
	<div class="mt-slider-slides">

		<?php foreach ( (array) $entries as $key => $entry ) {

			$img = $title = $desc = $caption = '';

			if ( !empty( $entry['image_id'] ) ) { $img = wp_get_attachment_image_url( $entry['image_id'], 'full', null ); }

			echo '<div class="mt-slider-slide '. esc_html($entry['position') .'" style="background-image:url('. esc_url($img) .')">';

				echo '<div class="container"><div class="mt-slider-content '. esc_html($entry['position') .'">';

          if ( !empty( $entry['subtitle'] ) ) {
            echo '<h3>'. esc_html( $entry['subtitle'] ) .'</h3>';
          }

			    if ( !empty( $entry['title'] ) ) {
			      echo '<h2>'. esc_html( $entry['title'] ) .'</h2>';
						$title = esc_html( $entry['title'] );
			    }

			    if ( !empty( $entry['description'] ) ) {
			        echo wpautop( $entry['description'] );
			    }


					if ( !empty( $entry['button_1_name'] ) and !empty( $entry['button_1_url'] ) ) {
			        echo '<a class="mt-btn mt-btn-1 mt-radius" href="'. esc_html( $entry['button_1_url'] ) .'">'. esc_html( $entry['button_1_name'] ) .'</a>';
			    }

					if ( !empty( $entry['button_2_name'] ) and !empty( $entry['button_2_url'] ) ) {
			        echo '<a class="mt-btn mt-btn-2 mt-radius" href="'. esc_html( $entry['button_2_url'] ) .'">'. esc_html( $entry['button_2_name'] ) .'</a>';
			    }

				echo '</div></div>';

			echo '</div>';

		} ?>

	</div>
  <div class="container"><div class="mt-slider-dots dots-<?php echo count($entries); ?>"></div></div>
</div>
<?php } } else if ( $slides=="shortcode" ) { echo do_shortcode($slides); }  }?>
