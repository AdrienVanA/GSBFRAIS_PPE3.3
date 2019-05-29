<?php

include("vues/v_sommaire.php");


$LesMois= $pdo-> getMonths();

include("vues/V_Recapmensuel.php");
$action = $_REQUEST['action'];
switch($action){
    
   case "valider": {
       
                     if(isset($_POST['TakeMonth'])){
           $Post_Month = $_POST['TakeMonth'];
   
       } 
       $tout_fiches = array();
       $tout_total = array();
       $tout_category = array();
       
       if(isset($_POST['Tforfait1'])){
          $Post_Forfait_Etape = $_POST['Tforfait1']; 
          
 $NBR_fiches= $pdo-> getNombreFiche($Post_Month,$_POST['Tforfait1']);
 $Total= $pdo->  getTotal($Post_Month,$_POST['Tforfait1']);
 
 $tout_category[] =$Post_Forfait_Etape;  
   $tout_fiches[] =$NBR_fiches;  
   $tout_total[]=$Total;
   
       }
            if(isset($_POST['Tforfait2'])){
           $Post_Frais_kilom  = $_POST['Tforfait2'];
           
           
            $NBR_fiches= $pdo-> getNombreFiche($Post_Month,$_POST['Tforfait2']);
 $Total= $pdo->  getTotal($Post_Month,$_POST['Tforfait2']);
 
 $tout_category[] =$Post_Frais_kilom;  
   $tout_fiches[] =$NBR_fiches;  
   $tout_total[]=$Total;
       }
            if(isset($_POST['Tforfait3'])){
          $Post_hotel = $_POST['Tforfait3'];
          
           $NBR_fiches= $pdo-> getNombreFiche($Post_Month,$_POST['Tforfait3']);
 $Total= $pdo->  getTotal($Post_Month,$_POST['Tforfait3']);
 
 $tout_category[] =$Post_hotel;  
   $tout_fiches[] =$NBR_fiches;  
   $tout_total[]=$Total;
       }
            if(isset($_POST['Tforfait4'])){
           $Post_restau = $_POST['Tforfait4'];
           
            $NBR_fiches= $pdo-> getNombreFiche($Post_Month,$_POST['Tforfait4']);
 $Total= $pdo->  getTotal($Post_Month,$_POST['Tforfait4']);
 
  $tout_category[] =$Post_restau;  
   $tout_fiches[] =$NBR_fiches;  
   $tout_total[]=$Total;
       }
       
  
 include("vues/V_recapmensuel_Liste.php");
 
    break;}
    
}