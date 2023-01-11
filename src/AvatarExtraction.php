<?php

namespace Shopeo\ShopeoCustomCard;

use AlibabaCloud\SDK\Imageseg\V20191230\Imageseg;
use AlibabaCloud\SDK\Imageseg\V20191230\Models\SegmentHeadAdvanceRequest;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use Darabonba\OpenApi\Models\Config;
use Exception;
use GuzzleHttp\Psr7\Stream;

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

	public function segmentHead( $tmpFile ) {
		$client             = $this->createClient();
		$file               = fopen( $tmpFile['tmp_name'], 'rb' );
		$stream             = new Stream( $file );
		$segmentHeadRequest = new SegmentHeadAdvanceRequest( [
			'imageURLObject' => $stream
		] );
		$runtime            = new RuntimeOptions();
		try {
			$response = $client->segmentHeadAdvance( $segmentHeadRequest, $runtime );
			$json     = Utils::toJSONString( $response->body );
			error_log( $json );

			return $json;
		} catch ( Exception $exception ) {
			$error = Utils::toJSONString( $exception );
			error_log( $error );
		}
	}
}