<?php
	include_once 'C:\wamp64\www\wordpress\wp-content\plugins\formulaire-inscription\formulaireWidget.php';
	
	class Formulaire
	{
		public function __construct()
		{
			add_action('widgets_init', function(){register_widget('Formulaire_Widget');});
			add_action('wp_loaded', array($this, 'addUsers'));
			add_action('admin_menu', array($this, 'addAdminMenu'),20);
		}
			
		public function addAdminMenu()
		{
			add_menu_page('Theme page title', 'Theme menu label', 'manage_options', 'theme-options', 'wps_theme_func');
			add_submenu_page( 'theme-options', 'Settings page title', 'Settings menu label', 'manage_options', 'theme-op-settings', 'wps_theme_func_settings');
			add_submenu_page( 'theme-options', 'FAQ page title', 'FAQ menu label', 'manage_options', 'theme-op-faq', 'wps_theme_func_faq');
		}
		
		public function menu_html()
		{
			echo '<h1>'.get_admin_page_title().'</h1>';
			echo '<p></p>';
			global $wpdb;
			$fetch = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}client ", ARRAY_A);
			echo "<table border='1'>
					<tr>
					<th>Nom</th>";
		}

		public function addUsers()
		{
			if (isset($_POST['submit'])) 
			{
				global $wpdb;
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$email = $_POST['email'];
				$rib = $_POST['rib'];
				$role = $_POST['role'];
				$login = $_POST['login'];
				$pass = $_POST['pass'];
				$parrain = $_POST['parrain'];

				$row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}usager WHERE login='$login'");
				if (is_null($row)) 
				{
					$wpdb->insert("{$wpdb->prefix}usager", array('nom' => $nom,'prenom' => $prenom ,'email' => $email,'rib' => $rib ,'login' => $login,'pass' => $pass,'role' => $role,'id_parrain' => $parrain));
				}
			}
		}
	}