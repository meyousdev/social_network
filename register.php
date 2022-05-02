<?php
session_start();
$title = "Inscription";

include("includes/constants.php");
include("config/database.php");
include("includes/functions.php");

if(isset($_POST['register']))
{
	if(not_empty(['name','pseudo','email','password'])){

		$errors = [];
		extract($_POST);
		
		if(mb_strlen($name) < 3 ){
			$errors[] = 'Nom trop court ! (Minimum 3 caractères)';
		}

		if(mb_strlen($pseudo) < 3 ){
			$errors[] = 'Pseudo trop court ! (Minimum 3 caractères)';
		}

		if(! filter_var($email,FILTER_VALIDATE_EMAIL)){
			$errors[] = 'Adresse mail invalide';
		}

		if(mb_strlen($password) < 6 ){
			$errors[] = 'Password trop court ! (Minimum 6 caractères)';
		}else{
			if($password != $password_confirm){
				$errors[] = 'Les deux mots de passe ne concordent pas';
			}
		}

		if(is_already_in_use('pseudo',$pseudo,'users')){
			$errors[] = 'Pseudo déjà utilisé !';
		}

		if(is_already_in_use('email',$email,'users')){
			$errors[] = 'Adresse Email déjà utilisé !';
		}

		if(count($errors) == 0 ){

			// Envoie d'un mail de confirmation
			$to = $email;
			$subject = WEBSITE_NAME.' ACTIVATION DE COMPTE';
			$password = sha1($password);
			$token = 

			ob_start();
			require('templates/emails/activation.tmp.php');
			$content = ob_get_clean();

			$headers = 'MINE-Version : 1.0 ' . "\r\n";
			$headers .= 'Content-type : text/html charset=iso-8859-1' . "\r\n"; 
		
			//mail($to, $subject, $message,$headers);

			$q = $db->prepare("INSERT INTO users(name,pseudo,email,password) VALUES ( :name, :pseudo, :email, :password)");
			$q->execute([
				'name'=>$name,
				'pseudo'=>$pseudo,
				'email'=> $email,
				'password'=> $password
			]);

			// Informer l'utilisateur qu'il doit vérifier sa boîte mail

			set_flash("Mail d'activation envoyé","success");

			redirect("index.php");


		}

	}else{
		$errors [] = "Veuillez svp remplir tous les champs";

	}
}
else
{

}
	

require("views/register.view.php");