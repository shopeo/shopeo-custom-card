<?php

namespace Shopeo\ShopeoCustomCard;

use AlibabaCloud\SDK\Imageseg\V20191230\Imageseg;
use AlibabaCloud\SDK\Imageseg\V20191230\Models\SegmentHeadAdvanceRequest;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use Darabonba\OpenApi\Models\Config;
use Exception;

class AvatarExtraction {

	private $config;

	public function __construct() {
		$options      = get_option( 'shopeo_custom_card_options' );
		$this->config = new Config( [
			'accessKeyId'     => $options['ali_cloud_access_key_id'],
			'accessKeySecret' => $options['ali_cloud_access_key_secret'],
			'endpoint'        => $options['ali_cloud_end_point']
		] );
	}

	public function createClient() {
		return new Imageseg( $this->config );
	}

	public function segmentHead( $url ) {
		$client             = $this->createClient();
		$segmentHeadRequest = new SegmentHeadAdvanceRequest( [
			'imageURL' => $url
		] );
		error_log( print_r( $segmentHeadRequest, true ) );
		$runtime = new RuntimeOptions();
		try {
			$response = $client->segmentHeadAdvance( $segmentHeadRequest, $runtime );
			error_log( $response->body );
		} catch ( Exception $error ) {
			if ( ! ( $error instanceof TeaError ) ) {
				$error = new TeaError( [], $error->getMessage(), $error->getCode(), $error );
			}
			error_log( $error->message );
			Utils::assertAsString( $error->message );
		}
	}
}