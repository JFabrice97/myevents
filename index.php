<?php
    session_name("myevents");
    session_start();
    include_once "controller/function.php";
    $url_red = $_SERVER["REQUEST_URI"];
    $part_url = explode("/", $url_red);
    $list_fichier = array("connexion"=>"login", "inscription"=>"signup",);
    if(in_array($part_url[2], array_keys($list_fichier))){
        if(isset($part_url[3])){
        }else{
            if(!($_SESSION && isset($_SESSION["connect"])) && !in_array($part_url[2], array("connexion", "inscription"))){	
                header("location: connexion");
            }
            
            include_once "views/".$list_fichier[$part_url[2]]."/".$list_fichier[$part_url[2]].".php";
        }
    }else{
        header("location: connexion");
    }
