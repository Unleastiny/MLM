<?php
class Formulaire_Widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
			'description' =>  'Un formulaire d\'inscription.'
		);
		parent::__construct( 'inscription_form' , 'Inscription' , $widget_ops );
    }
    
    public function widget($args, $instance)
    {
		echo $args['before_widget'];
		echo $args['before_title'];
		echo apply_filters('widget_title', $instance['title']);
		echo $args['after_title'];
		?>
		<form action="" method="post">
			<p>
				<input id="nom" name="nom" type="text" placeholder="Votre nom.."/>
			</p>
			<p>
				<input id="prenom" name="prenom" type="text" placeholder="Votre prenom.."/>
			</p>
			<p>
				<input id="email" name="email" type="email" placeholder="Votre Adresse Mail.."/>
			</p>
			<p>
				<input id="rib" name="rib" type="text" placeholder="Votre Numero de compte (RIB).."/>
			</p>
			<p>
				<select name="role" id="role">
					<option value="Abonne">Abonné(e)</option>
					<option value="Distributeur">Distributeur(trice)</option>
				</select>
			</p>
			<p>
				<input id="login" name="login" type="text" placeholder="Votre Login.."/>
			</p>
			<p>
				<input id="pass" name="pass" type="text" placeholder="Votre mot de passe.."/>
			</p>
			<p>
				<input id="parrain" name="parrain" type="text" placeholder="Votre parrain"/>
			</p>
			<input type="submit" name="submit" value="Validez" />
		</form>
		<?php
		echo $args['after_widget'];
    }
	

	public function form($instance)
	{
		$title = isset($instance['title']) ? $instance['title'] : '';
	?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
		</p>
		<?php
	}
}
?>