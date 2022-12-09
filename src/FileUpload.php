<?php

namespace Shopeo\ShopeoCustomCard;

class FileUpload {
	public static function upload( $file ) {
		return wp_handle_sideload( $file, array(
			'test_form' => false
		) );
	}
}