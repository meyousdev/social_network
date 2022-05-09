<?php
session_start();
include ('filters/guest_filter.php');
require "config/database.php";
require "includes/functions.php";

if( !empty($_GET['p']) && is_already_in_use('pseudo',$_GET['p'],'users') && !empty($_GET['token']) )
{
	$pseudo = $_GET['p'] ;
	$token = $_GET['token'] ;

	// Le pseudonyme et le token sont ils valident ?w
	$q = $db->prepare( 'SELECT email, password FROM users WHERE pseudo = ?' );
	$q->execute( [$pseudo] );

	$data  = $q->fetch( PDO::FETCH_OBJ );
	$token_verif = sha1( $pseudo.$data->email.$data->password );
	//
	// Si le token est valide, nous activons le compte de l'utilisateur 
	// dans le cas contraire il est redirigé vers la page d'accueil avec un message d'erreur
	//  
	if( $token == $token_verif )
	{
		$q = $db->prepare( "UPDATE users SET active = '1' FROM users WHERE pseudo = ? " );
	    $q->execute( [$pseudo] );

        set_flash('Votre compte a été bel et bien activé !');
	    redirect('index.php');
	}
	else
	{
		set_flash('Jetons de sécurité invalide','danger');
		redirect('index.php');
	}

}
else
{
	redirect('index.php');	
} 