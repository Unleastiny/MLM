<?php
	/*
	Plugin Name: Listing des clients ( Abonnés / Distributeurs )
	Description: Affiche la liste des clients qu'ils soient distributeurs ou abonnés !
	Version: 0.1
	Author: Stortz Romain
	*/
	class Affichage_Client_plugin
	{
		public function __construct()
		{
			include_once 'C:\wamp64\www\wordpress\wp-content\plugins\liste-clients\affichage-distributeur.php';
			new Affichage_Distributeur();
			include_once 'C:\wamp64\www\wordpress\wp-content\plugins\liste-clients\affichage-abonne.php';
			new Affichage_Abonne();
			add_action('admin_menu',array($this,'addAdminMenu'));
		}
		public function addAdminMenu()
		{
			add_menu_page('Listes des clients', 'Management des Usagers', 'manage_options', 'zero', array($this, 'menu_html'));
			add_submenu_page('zero', 'Usagers', 'Usagers', 'manage_options', 'zero', array($this, 'menu_html'));
		}
		
		public function menu_html()
		{
			echo '<h1>'.get_admin_page_title().'</h1>';
			echo '<p>La liste des usagers ( Abonnés et Distributeurs ) </p>';
			global $wpdb;
			$fetch = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}usager ", ARRAY_A);
			echo "<table border='1'>
					<tr>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Adresse Mail</th>
					<th>RIB</th>
					<th>login</th>
					<th>Role</th>
					<th>Id du parrain</th>
					</tr>";
			
			foreach($fetch as $row)
			{
				$nom = $row['nom'];
				$prenom = $row['prenom'];
				$email = $row['email'];
				$rib = $row['rib'];
				$login = $row['login'];
				$role = $row['role'];
				$parrain = $row['id_parrain'];
				
				echo "<tr>
						<td>".$nom."</td>
						<td>".$prenom."</td>
						<td>".$email."</td>
						<td>".$rib."</td>
						<td>".$login."</td>
						<td>".$role."</td>
						<td>".$parrain."</td>
					</tr>";
			}			
			echo "</table>";
		}
	}
	new Affichage_Client_plugin();
?>