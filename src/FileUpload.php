<?php

namespace Shopeo\ShopeoCustomCard;

class FileUpload {
	public static function upload( $file ) {
		return wp_handle_sideload( $file, array(
			'test_form' => false
		) );
	}

	public static function download( $url ) {
		$temp_file = download_url( $url );
		$file      = array(
			'name'     => basename( $temp_file ),
			'type'     => mime_content_type( $temp_file ),
			'tmp_name' => $temp_file,
			'size'     => filesize( $temp_file )
		);

		return self::upload( $file );
	}
}