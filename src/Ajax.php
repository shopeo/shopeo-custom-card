<?php

namespace Shopeo\ShopeoCustomCard;

class Ajax {

	public function __construct() {
		$ajax = [
			'get_woocommerce_config',
			'get_woo_products_by_category',
			'get_products_by_frames',
			'get_products_by_backgrounds',
			'get_woo_product_by_id',
			'upload_avatar',
			'get_avatars',
			'clear_avatars',
			'background_categories',
			'frame_categories',
			'skin_attributes'
		];

		foreach ( $ajax as $hook ) {
			add_action( 'wp_ajax_' . $hook, array( $this, $hook ) );
			add_action( 'wp_ajax_nopriv_' . $hook, array( $this, $hook ) );
		}
	}

	public function get_woocommerce_config() {
		wp_send_json( [
			'currency_symbol' => get_woocommerce_currency_symbol()
		] );
	}

	public function get_woo_product_categories( $term_id = 0 ) {
		$args = array(
			'taxonomy'   => 'product_cat',
			'orderby'    => 'name',
			'order'      => 'asc',
			'count'      => true,
			'pad_counts' => true,
		);
		if ( $term_id ) {
			$args['term_taxonomy_id'] = $term_id;
		}
		$product_categories = array_values( get_terms( $args ) );
		wp_send_json( $product_categories );
	}

	public function get_woo_product_categories_children( $term_id ) {
		$categories = array_values( get_term_children( $term_id, 'product_cat' ) );
		$this->get_woo_product_categories( $categories );
	}

	public function get_woo_products_by_category() {
		$category = $_POST['category'];
		$args     = array(
			'numberposts' => - 1,
			'category'    => $category ?: 0,
			'post_type'   => 'product'
		);
		$posts    = get_posts( $args );
		wp_send_json( $posts );
	}

	public function get_woo_product_by_id() {
		$product_id = $_POST['product_id'];
		$product    = wc_get_product( $product_id );
		wp_send_json( $product );
	}

	public function upload_avatar() {
		if ( $_FILES['file'] ) {
			$avatar = new AvatarExtraction();
			$resq   = $avatar->segmentHead( $_FILES['file'] );
		}
		wp_send_json( $resq );
	}

	public function background_categories() {
		$options = get_option( 'shopeo_custom_card_options' );
		$this->get_woo_product_categories_children( $options['background_category_id'] );
	}

	public function frame_categories() {
		$options = get_option( 'shopeo_custom_card_options' );
		$this->get_woo_product_categories_children( $options['frame_category_id'] );
	}

	public function skin_attributes() {
		$options = get_option( 'shopeo_custom_card_options' );
		$args    = array(
			'taxonomy'   => $options['skin_color_taxonomy'],
			'orderby'    => 'name',
			'order'      => 'asc',
			'count'      => true,
			'pad_counts' => true,
		);
		$terms   = array_values( get_terms( $args ) );
		$skins   = [];
		foreach ( $terms as $term ) {
			$term->color = get_term_meta( $term->term_id, 'product_attribute_color', true );
			$skins[]     = $term;
		}
		wp_send_json( $skins );
	}

	public function get_products_by_frames() {
		$options   = get_option( 'shopeo_custom_card_options' );
		$category  = $_POST['category'] > 0 ? $_POST['category'] : $options['frame_category_id'];
		$skin      = max( $_POST['skin'], 0 );
		$skin_name = '';
		$args      = array(
			'numberposts' => - 1,
			'post_type'   => 'product',
			'post_status' => 'publish',
			'tax_query'   => array(
				array(
					'taxonomy' => 'product_cat',
					'terms'    => [ $category ],
					'field'    => 'term_id',
					'operator' => 'IN'
				)
			)
		);
		if ( $skin > 0 ) {
			$args['tax_query'][] = array(
				'taxonomy' => $options['skin_color_taxonomy'],
				'terms'    => [ $skin ],
				'field'    => 'term_id',
				'operator' => 'IN'
			);
			$skin_term           = get_term( $skin );
			$skin_attribute      = str_replace( 'pa_', '', $options['skin_color_taxonomy'] );
			$skin_name           = $skin_term->name;
		}
		$posts    = get_posts( $args );
		$products = [];
		foreach ( $posts as $post ) {
			$product = wc_get_product( $post->ID );
			if ( $product && $product->is_type( 'variable' ) ) {
				$product    = new \WC_Product_Variable( $product->get_id() );
				$variations = $product->get_available_variations( '' );
				foreach ( $variations as $variation ) {
					if ( $skin > 0 ) {
						$attribute = $variation->get_attribute( $skin_attribute );
						if ( $attribute === $skin_name ) {
							$pro          = $variation->get_data();
							$pro['image'] = wp_get_original_image_url( $variation->get_image_id( '' ) );
							$products[]   = $pro;
						}
					} else {
						$pro          = $variation->get_data();
						$pro['image'] = wp_get_original_image_url( $variation->get_image_id( '' ) );
						$products[]   = $pro;
					}
				}
			}
		}
		wp_send_json( $products );
	}

	public function get_products_by_backgrounds() {
		$options  = get_option( 'shopeo_custom_card_options' );
		$category = $_POST['category'] > 0 ? $_POST['category'] : $options['background_category_id'];
		$args     = array(
			'numberposts' => - 1,
			'post_type'   => 'product',
			'post_status' => 'publish',
			'tax_query'   => array(
				array(
					'taxonomy' => 'product_cat',
					'terms'    => [ $category ],
					'field'    => 'term_id',
					'operator' => 'IN'
				)
			)
		);
		$posts    = get_posts( $args );
		$products = [];
		foreach ( $posts as $post ) {
			$product      = wc_get_product( $post->ID );
			$pro          = $product->get_data();
			$pro['image'] = wp_get_original_image_url( $product->get_image_id( '' ) );
			$products[]   = $pro;
		}
		wp_send_json( $products );
	}
}