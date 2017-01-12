<?php
	include_once 'C:\wamp64\www\wordpress\wp-content\plugins\formulaire-inscription\formulaireWidget.php';
	
	class Formulaire
	{
		public function __construct()
		{
			add_action('widgets_init', function(){register_widget('Formulaire_Widget');});
			add_action('wp_loaded', array($this, 'addUsers'));
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