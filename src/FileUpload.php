<?php

namespace Shopeo\ShopeoCustomCard;

class FileUpload {
	public static function upload( $file ) {
		return wp_handle_sideload( $file, array(
			'test_form' => false
		) );
	}

	public static function download( $url ) {
		$path  = '';
		$paths = explode( '?', $url );
		if ( is_array( $paths ) ) {
			$path = $paths[0];
		}
		$ext       = pathinfo( $path, PATHINFO_EXTENSION );
		$temp_file = download_url( $url );
		$file_name = str_replace( '.tmp', '.' . $ext, $temp_file );
		copy( $temp_file, $file_name );
		unlink( $temp_file );
		$file = array(
			'name'     => basename( $file_name ),
			'type'     => mime_content_type( $file_name ),
			'tmp_name' => $file_name,
			'size'     => filesize( $file_name )
		);
		error_log( print_r( $file, true ) );

		return self::upload( $file );
	}
}