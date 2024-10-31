<?php
/**
 * Loads administrative capabilities for configuring RAUO Inventory.
 */

/**
 * Sets up custom options administrative panel and menu.
 *
 */
class RimDiaryAdmin {
	const rimdiary_admin_page = 'rim-diary';

	// To be hooked into admin_init
	static function admin_init() {}

	// To be hooked into wp_enqueue_scripts or another appropriate hook suitable for enqueuing scripts.
	static function admin_print_scripts( $context ) {
		wp_enqueue_style( 'rim-diary.css', plugins_url( '/resources/css/styles.css', __FILE__ ) );
		wp_enqueue_script( 'rim-diary-admin.js', plugins_url( '/resources/js/admin-scripts.js', __FILE__ ) );
	}

	// To be hooked into admin_menu.
	static function admin_menu() {
		$pagehook = add_menu_page(
			__( 'The Rim Diary', 'rim-diary' ),
			__( 'The Rim Diary', 'rim-diary' ),
			'manage_options',
			self::rimdiary_admin_page,
			array( __CLASS__, 'rimdiary_admin_page' ),
			'dashicons-menu'
		);

		// Only load admin scripts when on plugin admin page.
		add_action( 'admin_print_scripts-' . $pagehook, array( __CLASS__, 'admin_print_scripts' ) );
	}

	// Callback for loading the admin view.
	static function rimdiary_admin_page() {
		$winnings = array_merge( array( 'play-again' => 0, 'coffee' => 0, 'donut' => 0 ), RimDiary::getRimDiary() );
		$prizes = RimDiary::getPrizes();
		include 'views/admin/rimdiaryadminview.php';
	}

}

// Register admin functionality.
add_action( 'admin_menu', array( 'RimDiaryAdmin', 'admin_menu' ) );
add_action( 'admin_init', array( 'RimDiaryAdmin', 'admin_init' ) );
