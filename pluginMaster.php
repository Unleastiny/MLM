<?php
/*
Plugin Name: Formulaire d'Inscription
Description: Le formulaire d'inscription au site MLM
Version: 0.1
Author: Stortz Romain
*/
class Formulaire_Plugin
{
    public function __construct()
    {
        include_once 'C:\wamp64\www\wordpress\wp-content\plugins\formulaire-inscription\formulaire.php';
        new Formulaire();
    }
}
new Formulaire_Plugin();
?>