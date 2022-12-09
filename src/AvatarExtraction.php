<?php

namespace Shopeo\ShopeoCustomCard;

use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Bda\V20200324\BdaClient;
use TencentCloud\Bda\V20200324\Models\SegmentPortraitPicRequest;

class AvatarExtraction {
	private $cred;
	private $httpProfile;
	private $clientProfile;
	private $client;

	public function __construct() {
		$options           = get_option( 'shopeo_custom_card_options' );
		$this->cred        = new Credential( isset( $options['tencent_cloud_secret_id'] ) ? esc_attr( $options['tencent_cloud_secret_id'] ) : '', isset( $options['tencent_cloud_secret_key'] ) ? esc_attr( $options['tencent_cloud_secret_key'] ) : '' );
		$this->httpProfile = new HttpProfile();
		$this->httpProfile->setEndpoint( "bda.tencentcloudapi.com" );
		$this->clientProfile = new ClientProfile();
		$this->clientProfile->setHttpProfile( $this->httpProfile );
		$this->client = new BdaClient( $this->cred, isset( $options['region'] ) ? esc_attr( $options['region'] ) : 'ap-beijing', $this->clientProfile );
	}

	public function segmentPortraitPic( $url ) {
		$req    = new SegmentPortraitPicRequest();
		$params = array();
		$req->fromJsonString( json_encode( $params ) );

		return $this->client->SegmentPortraitPic( $req );
	}
}