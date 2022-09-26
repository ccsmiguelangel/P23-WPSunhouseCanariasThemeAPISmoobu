<?php

/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */


if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
@require_once plugin_dir_path(__FILE__) . 'public/post-alojamiento.php';
get_header(); ?>
<style>


	div.alocard__list.elementor-column.elementor-col-100.elementor-top-column {
		display: flex;
		flex-wrap: wrap;
		gap: 20px 0;
	}

	.elementor-container.elementor-column-gap-default {
		display: flex;
		margin: 40px auto;
		position: relative;

	}

	.elementor-column-gap-default>.elementor-column>.elementor-element-populated {
		padding: 10px;
	}

	.elementor-section.elementor-section-boxed>.elementor-container {
		max-width: 1140px;
	}

	@media (min-width: 768px) {
		.w-67 {
			width: 67%;
		}

		.w-32 {
			width: 32%;
		}
	}

	@media (max-width: 769px) {
		.elementor-container.elementor-column-gap-default {
			display: block;
		}

	}
</style>
<div id="content" class="site-content">
	<div class="elementor-background-slideshow swiper-container">
		<div class="elementor-container elementor-column-gap-default">
			<div class="elementor-column elementor-col-50 w-32">
				<div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-e0a8321 elementor-widget elementor-widget-image" data-id="e0a8321" data-element_type="widget" data-widget_type="image.default">
						<div class="elementor-widget-container">
							<style>
								/*! elementor - v3.7.3 - 29-08-2022 */
								.elementor-widget-image {
									text-align: center
								}

								.elementor-widget-image a {
									display: inline-block
								}

								.elementor-widget-image a img[src$=".svg"] {
									width: 48px
								}

								.elementor-widget-image img {
									vertical-align: middle;
									display: inline-block
								}
							</style>
							<figure class="wp-caption">
								<img width="588" height="639" src="http://localhost/.Business/003SunhouseCanarias/wp-content/uploads/2022/07/selector-reserva.png" class="attachment-large size-large" alt="" loading="lazy" srcset="http://localhost/.Business/003SunhouseCanarias/wp-content/uploads/2022/07/selector-reserva.png 588w, http://localhost/.Business/003SunhouseCanarias/wp-content/uploads/2022/07/selector-reserva-276x300.png 276w" sizes="(max-width: 588px) 100vw, 588px">
								<figcaption class="widget-image-caption wp-caption-text">Selector temporalmente deshabilitado</figcaption>
							</figure>
						</div>
					</div>
				</div>
			</div>
			<div class="elementor-column elementor-col-50 w-67 elementor-top-column elementor-element">
				<div class="elementor-widget-wrap elementor-element-populated">
					<div class="alocard__list elementor-column elementor-col-100 elementor-top-column" data-id="4fa7db83" data-element_type="column">
						<?php
						echo show_all_alo();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>