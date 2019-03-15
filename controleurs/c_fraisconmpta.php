 
<?php
        /*
         * 15/03/2019
         * Il faut donner effet au boutton REFUSE? via le <a> et sans affecter l'URL
         * il faut pouvoir valider la fiche de frais
         * On valide PUIS rembourse
         */
   $month = $pdo->getMonths();
$users= $pdo->getalluser();
// $anuser = $_REQUEST['user'];
$action = $_REQUEST['action'];
     
include("vues/v_sommaire.php");
include("vues/V_fraisutilisateur.php");


if (isset($_REQUEST['user'])){
  $user = $_REQUEST['user'];  
}

if (isset($_REQUEST['idFraisForfait'])){
  $idFraisForfait = $_REQUEST['idFraisForfait'];  
}

if (isset($_REQUEST['idFraisForfait'])){
  $mois = $_REQUEST['mois'];  
}

switch($action){
	case 'utilisateurchoisis':{
  //          $anuser= $pdo->getUser($user,$idFraisForfait,$mois);
              $anuser= $pdo->getLesFraisForfait($user,$mois);
              $horforfait = $pdo->getLesFraisHorsForfait($user,$mois);
            $usersMonth= $pdo-> dernierMoisSaisi($user);
  //      $InfosFicheFrais2 =$pdo->getLesFraisForfait($user,$mois);
        
        $fraisForfaitEtape =0;
         $fraisKilometrique =0;
          $fraisHotel =0;
           $fraisResto =0;
       
   include("vues/V_Notedefrais.php");
        
        
       break;
        }
	case 'save':{
        
            
          $statusfrais=$_POST['statusfrais']  ;  
            
        majEtatFicheFrais($anuser[0]['id'],$anuser[0]['mois'],$statusfrais);
     
       break;
        }

        }

        





 
?>

   
   
   

    
<!--faire un switch recup URL pour userselected, dans la vue ?
EX
 <a href="index.php?utili=etatFrais&action=selectionnerMois"
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

   if(isset($_POST['selection_frais'] )){
       $userselected = $pdo-> getLesFraisForfait($user['id'], $month)  ;
   }


   <script>
       var d = new Date();
var n = d.getMonth();
  var selec = Document.getElementById(choice) ;
   selec.addEventListener("click",getLesInfosFicheFrais(<?php $user ?>,n) )
   
   </script>
-->


