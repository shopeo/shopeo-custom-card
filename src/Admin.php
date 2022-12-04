<?php

namespace Shopeo\ShopeoCustomCard;

class Admin {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_page' ) );
		add_action( 'admin_init', array( $this, 'init' ) );
	}

	public function add_page() {
		$hookname = add_menu_page(
			__( 'SHOPEO Custom Card', 'shopeo-custom-card' ),
			__( 'Custom Card', 'shopeo-custom-card' ),
			'manage_options',
			'shopeo-custom-card',
			array( $this, 'html' ),
			'dashicons-controls-repeat',
			80
		);
		add_action( 'load-' . $hookname, array( $this, 'submit' ) );
	}

	public function init() {
		register_setting( 'shopeo_custom_card_options', 'shopeo_custom_card_options' );
		add_settings_section( 'shopeo_custom_card_section', __( 'General', 'shopeo-custom-card' ), array(
			$this,
			'section_callback'
		), 'shopeo-custom-card' );

		add_settings_field( 'shopeo_custom_card_frame_category_id', __( 'Frame Category ID', 'shopeo-custom-card' ), array(
			$this,
			'frame_category_id_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );

		add_settings_field( 'shopeo_custom_card_background_category_id', __( 'Background Category ID', 'shopeo-custom-card' ), array(
			$this,
			'background_category_id_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );

		add_settings_field( 'shopeo_custom_card_tencent_cloud_secret_id', __( 'Tencent cloud SecretID', 'shopeo-custom-card' ), array(
			$this,
			'tencent_cloud_secret_id_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );
		add_settings_field( 'shopeo_custom_card_tencent_cloud_secret_key', __( 'Tencent cloud SecretKEY', 'shopeo-custom-card' ), array(
			$this,
			'tencent_cloud_secret_key_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );
	}

	public function section_callback() {
		echo '<p>' . __( '', 'shopeo-custom-card' ) . '</p>';
	}

	public function frame_category_id_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="number" name="shopeo_custom_card_options[frame_category_id]"
               value="<?php echo isset( $options['frame_category_id'] ) ? esc_attr( $options['frame_category_id'] ) : ''; ?>">
		<?php
	}

	public function background_category_id_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="number" name="shopeo_custom_card_options[background_category_id]"
               value="<?php echo isset( $options['background_category_id'] ) ? esc_attr( $options['background_category_id'] ) : ''; ?>">
		<?php
	}

	public function tencent_cloud_secret_id_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="text" name="shopeo_custom_card_options[tencent_cloud_secret_id]"
               value="<?php echo isset( $options['tencent_cloud_secret_id'] ) ? esc_attr( $options['tencent_cloud_secret_id'] ) : ''; ?>">
		<?php
	}

	public function tencent_cloud_secret_key_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="text" name="shopeo_custom_card_options[tencent_cloud_secret_key]"
               value="<?php echo isset( $options['tencent_cloud_secret_key'] ) ? esc_attr( $options['tencent_cloud_secret_key'] ) : ''; ?>">
		<?php
	}

	public function html() {
		?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <form action="options.php" method="post">
				<?php
				settings_fields( 'shopeo_custom_card_options' );
				do_settings_sections( 'shopeo-custom-card' );
				submit_button( __( 'Save Settings', 'shopeo-custom-card' ) );
				?>
            </form>
        </div>
		<?php
	}

	public function submit() {

	}
}