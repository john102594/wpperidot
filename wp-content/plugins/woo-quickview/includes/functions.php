<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access

/**
 * Functions
 */
class SP_WQV_Functions {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		add_filter( 'admin_footer_text', array( $this, 'admin_footer' ), 1, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Review Text.
	 *
	 * @param $text
	 *
	 * @return string
	 */
	public function admin_footer( $text ) {
		$screen = get_current_screen();
		if ( 'toplevel_page_wqv_settings' == $screen->id ) {
			$url  = 'https://wordpress.org/plugins/woo-quickview/#reviews';
			$text = sprintf( __( 'If you like <strong>WooCommerce Quick View</strong> please leave us a <a href="%s" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating. Your Review is very important to us as it helps us to grow more. ', 'woo-quick-view' ), $url );
		}

		return $text;
	}

	/**
	 * Admin enqueue scripts.
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts() {
		// Notice style.
		wp_enqueue_style( 'woo-quick-view-notices', SP_WQV_URL . 'admin/views/notices/notices.min.css', array(), SP_WQV_VERSION, 'all' );
	}

}

new SP_WQV_Functions();
