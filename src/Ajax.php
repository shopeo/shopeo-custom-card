<?php

namespace Shopeo\ShopeoCustomCard;

class Ajax {

	public function __construct() {
		$ajax = [
			'get_woo_product_categories',
			'get_woo_products_by_category',
			'get_woo_product_by_id'
		];

		foreach ( $ajax as $hook ) {
			add_action( 'wp_ajax_' . $hook, array( $this, $hook ) );
			add_action( 'wp_ajax_nopriv_' . $hook, array( $this, $hook ) );
		}
	}

	public function get_woo_product_categories() {
		$term_id = $_POST['term_id'];
		$args    = array(
			'taxonomy'   => 'product_cat',
			'orderby'    => 'name',
			'order'      => 'asc',
			'count'      => true,
			'pad_counts' => true,
		);
		if ( $term_id ) {
			$args['term_taxonomy_id'] = $term_id;
		}
		$product_categories = get_terms( $args );
		wp_send_json( $product_categories );
	}

	public function get_woo_products_by_category() {
		$categories = $_POST['categories'];
		$args       = array(
			'numberposts' => - 1,
			'category'    => $categories ?: 0,
			'post_type'   => 'product'
		);
		$posts      = get_posts( $args );
		wp_send_json( $posts );
	}

	public function get_woo_product_by_id() {
		$product_id = $_POST['product_id'];
		$product    = wc_get_product( $product_id );
		wp_send_json( $product );
	}
}

$ajax = new Ajax();