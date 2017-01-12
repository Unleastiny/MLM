<?php
	class Affichage_Distributeur
	{
		public function __construct()
		{
			add_action('admin_menu',array($this,'addAdminMenu'),20);
		}
		public function addAdminMenu()
		{
			add_submenu_page('zero', 'Distributeurs', 'Distributeurs', 'manage_options', 'distributeur', array($this, 'menu_html'));
		}
		
		public function menu_html()
		{
			echo '<h1>'.get_admin_page_title().'</h1>';
			echo '<h2>La liste des Distributeurs uniquement</h2>';
			global $wpdb;
			$fetch = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}usager WHERE role='Distributeur'", ARRAY_A);
			echo "<table border='1'>
					<tr>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Adresse Mail</th>
					<th>RIB</th>
					<th>login</th>
					<th>Id du parrain</th>
					</tr>";
			
			foreach($fetch as $row)
			{
				$nom = $row['nom'];
				$prenom = $row['prenom'];
				$email = $row['email'];
				$rib = $row['rib'];
				$login = $row['login'];
				$parrain = $row['id_parrain'];
				
				echo "<tr>
						<td>".$nom."</td>
						<td>".$prenom."</td>
						<td>".$email."</td>
						<td>".$rib."</td>
						<td>".$login."</td>
						<td>".$parrain."</td>
					</tr>";
			}			
			echo "</table>";
		}
	}
?>