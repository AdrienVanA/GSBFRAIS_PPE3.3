<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php") ;
include("vues/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
$action = $_REQUEST['action'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];

$users= $pdo->getalluser();

include("vues/V_TableauBord.php");
//include("vues/V_fraisutilisateur.php");
if (isset($_REQUEST['user'])){
  $user = $_REQUEST['user'];  
}

$lesFrais= $pdo->GetFrais($user);
cutmoisToYear();

 




switch($action){
    
    
    
    
    
}


include("vues/v_pied.php") ;

//GetFrais