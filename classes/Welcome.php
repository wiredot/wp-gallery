<?php

namespace Wiredot\WP_GALLERY;

use Wiredot\Preamp\Twig;

class Welcome {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menus') );
	}

	public function add_admin_menus() {
		add_dashboard_page(
			__( 'Welcome to WP Gallery', 'wp-photo-gallery' ),
			__( 'Welcome to WP Gallery', 'wp-photo-gallery' ),
			'manage_options',
			'wp-photo-gallery-welcome',
			array( $this, 'welcome_page' )
		);

		remove_submenu_page( 'index.php', 'wp-photo-gallery-welcome' );
	}

	public function welcome_page() {
		if (isset($_GET['tab'])) {
			$tab = $_GET['tab'];
		} else {
			$tab = 'getting-started';
		}

		$Twig = new Twig();
		echo $Twig->twig->render('welcome.html', array(
			'tab' => $tab
		));
	}

}