public function admin_notice_missing_main_plugin() {

	if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

	$message = sprintf(
		/* translators: 1: Plugin Name 2: Elementor */
		esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'text-domain' ),
		'<strong>' . esc_html__( 'Plugin Name', 'text-domain' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'text-domain' ) . '</strong>'
	);

	printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

}

if ( ! did_action( 'elementor/loaded' ) ) {
	add_action( 'admin_notices', 'admin_notice_missing_main_plugin' );
}
