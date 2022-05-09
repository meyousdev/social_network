<?php
session_start();
include ('filters/guest_filter.php');

$title  = "Connexion";

include("includes/constants.php");
include("config/database.php");
include("includes/functions.php");

// Si le formulaire a été soumis
if ( isset( $_POST['login'] ) ){

    // Si tous les champs identifiant et password ont été rempli
    if ( not_empty(['identifiant', 'password']) ){
        extract($_POST);
        $q = $db->prepare("SELECT id FROM users WHERE (pseudo = :identifiant OR email = :identifiant) AND  active = '1' AND password = :password ");
        $q->execute([
            'identifiant' => $identifiant,
            'password' => sha1($password)
        ]);

        // Récupération de l'utilisateur dans la base de données qui correspondant à l'utilisateur qui se connecte 
        $userHasBeenFound = $q->rowCount();

        if ( $userHasBeenFound)
        {
            $user = $q->fetch(PDO::FETCH_OBJ);
            $_SESSION['user_id'] = $user->id; 
            $_SESSION['pseudo'] = $user->pseudo;
            redirect("profile.php");
        }
        else
        {
            set_flash('Combinaison Identifiant/Password incorrecte !', 'danger');
            save_input_data();
        }
    }
    else
    {
        // S'il vient d'arriver fraichement su r la page,il n'y a aucune raison que les champs soient pré-remplis
        clear_input_data();
        
    }

}

require("views/login.view.php");