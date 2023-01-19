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

		add_settings_field( 'shopeo_custom_card_skin_color_taxonomy', __( 'Skin Color Taxonomy', 'shopeo-custom-card' ), array(
			$this,
			'skin_color_taxonomy_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );

		add_settings_field( 'shopeo_custom_card_background_category_id', __( 'Background Category ID', 'shopeo-custom-card' ), array(
			$this,
			'background_category_id_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );

		add_settings_field( 'shopeo_custom_card_ali_cloud_endpoint', __( 'Ali cloud Endpoint', 'shopeo-custom-card' ), array(
			$this,
			'ali_cloud_endpoint_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );
		add_settings_field( 'shopeo_custom_card_ali_cloud_access_key_id', __( 'Ali cloud AccessKey ID', 'shopeo-custom-card' ), array(
			$this,
			'ali_cloud_access_key_id_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );
		add_settings_field( 'shopeo_custom_card_ali_cloud_access_key_secret', __( 'Ali cloud AccessKey Secret', 'shopeo-custom-card' ), array(
			$this,
			'ali_cloud_access_key_secret_callback'
		), 'shopeo-custom-card', 'shopeo_custom_card_section' );
	}

	public function section_callback() {
		echo '<p>' . __( '', 'shopeo-custom-card' ) . '</p>';
	}

	public function ali_cloud_endpoint_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="text" name="shopeo_custom_card_options[ali_cloud_end_point]"
               value="<?php echo isset( $options['ali_cloud_end_point'] ) ? esc_attr( $options['ali_cloud_end_point'] ) : ''; ?>">
		<?php
	}

	public function frame_category_id_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="number" name="shopeo_custom_card_options[frame_category_id]"
               value="<?php echo isset( $options['frame_category_id'] ) ? esc_attr( $options['frame_category_id'] ) : ''; ?>">
		<?php
	}

	public function skin_color_taxonomy_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="text" name="shopeo_custom_card_options[skin_color_taxonomy]"
               value="<?php echo isset( $options['skin_color_taxonomy'] ) ? esc_attr( $options['skin_color_taxonomy'] ) : ''; ?>">
		<?php
	}

	public function background_category_id_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="number" name="shopeo_custom_card_options[background_category_id]"
               value="<?php echo isset( $options['background_category_id'] ) ? esc_attr( $options['background_category_id'] ) : ''; ?>">
		<?php
	}

	public function ali_cloud_access_key_id_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="text" name="shopeo_custom_card_options[ali_cloud_access_key_id]"
               value="<?php echo isset( $options['ali_cloud_access_key_id'] ) ? esc_attr( $options['ali_cloud_access_key_id'] ) : ''; ?>">
		<?php
	}

	public function ali_cloud_access_key_secret_callback() {
		$options = get_option( 'shopeo_custom_card_options' );
		?>
        <input type="text" name="shopeo_custom_card_options[ali_cloud_access_key_secret]"
               value="<?php echo isset( $options['ali_cloud_access_key_secret'] ) ? esc_attr( $options['ali_cloud_access_key_secret'] ) : ''; ?>">
		<?php
	}

	public function html() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( isset( $_GET['settings-updated'] ) ) {
			add_settings_error( 'shopeo-custom-card', 'shopeo-custom-card', __( 'Settings Saved', 'shopeo-custom-card' ), 'success' );
		}
		settings_errors( 'shopeo-custom-card' );
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