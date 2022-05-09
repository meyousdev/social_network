<?php
session_start();
include ('filters/auth_filter.php');


$title = 'Page de profil';
include("includes/constants.php");
include("config/database.php");
include("includes/functions.php");



require ('views/profile.view.php');