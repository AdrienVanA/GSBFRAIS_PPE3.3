 <?php
        /*Description
         * 
         * Ce fichier gère la selection de visiteur ainsi que
         *la modification de leurs fiches de frais (refus, validation)
         * 
         * 
         * 17/03/2019
         * placement et affichage liste
         * il faut pouvoir valider la fiche de frais/changer état
         * On valide PUIS rembourse
         * la date de refus est mauvaise.
         * Un frais refusé ne doit pas être compté
         */
   $month = $pdo->getMonths();
$users= $pdo->getalluser();
$totalfrais=0;
$action = $_REQUEST['action'];
$datemodif;
$TheuserID;   
$check_list= array();    

include("vues/v_sommaire.php");
include("vues/V_fraisutilisateur.php");


if (isset($_REQUEST['user'])){
  $user = $_REQUEST['user'];  
}

if (isset($_REQUEST['idFraisForfait'])){
  $idFraisForfait = $_REQUEST['idFraisForfait'];  
}

$mois= date("Ym");

switch($action){
    
    default :{
     break;    
    }
	case 'utilisateurchoisis':{
            
        
  $Theuser = $_REQUEST['user'];  
  
$lesMois=$pdo->getLesMoisDisponibles($Theuser);
if(!empty($lesMois)){
$lesCles = array_keys( $lesMois );
$moisASelectionner = $lesCles[0];    
}


if(isset($_REQUEST['lstMois'])){
    $mois = $_REQUEST['lstMois'];
       
}
	 $periode =dateServeurVersFrancais($mois);

              $anuser= $pdo->getLesFraisForfait($user,$mois);
              $horforfait = $pdo->getLesFraisHorsForfait($user,$mois);
            $usersMonth= $pdo-> dernierMoisSaisi($user);
$InfosFicheFrais = $pdo->getLesInfosFicheFrais($user,$mois);
        
                $datemodif=$InfosFicheFrais['dateModif'];
   $Horsforfaitlibelle=$InfosFicheFrais['libEtat'];
   include("vues/V_Notedefrais.php");
        
        
       break;
        }
        
        case 'RefuserFrais':{ 
            
 $Theuser = $_REQUEST['user'];  

if(isset($_REQUEST['lstMois'])){
    $mois = $_REQUEST['lstMois'];
       
}
	
  $periode =dateServeurVersFrancais($mois);
      
$lesMois=$pdo->getLesMoisDisponibles($Theuser);


if(!empty($lesMois)){
$lesCles = array_keys( $lesMois );
$moisASelectionner = $lesCles[0];    
}
   $anuser= $pdo->getLesFraisForfait($Theuser,$mois);
  $horforfait = $pdo->getLesFraisHorsForfait($Theuser,$mois);
  $usersMonth= $pdo-> dernierMoisSaisi($Theuser);
$InfosFicheFrais = $pdo->getLesInfosFicheFrais($Theuser,$mois); 

//MAJ LIGNES FRAIS FORFAIT
  if(!empty($_REQUEST['userQuantite'])){
        $ID_Quantite=$_REQUEST['userQuantite'];
if(lesQteFraisValides($ID_Quantite)){
    
$pdo->majFraisForfait($Theuser,$mois,$ID_Quantite);
     }   else{
			ajouterErreur("Les quantité des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
        
  } 

 include("vues/V_Notedefrais.php");
 

 //MAJ LIGNES HORS FORFAIT
  if(!empty($_POST['check_list'])){
  echo "frais refusé </br>";
            
 foreach ($_POST['check_list'] as $post){
  foreach($horforfait as $unhorforfait){
 if($unhorforfait['id']==$post){
 
$totalfrais=$unhorforfait['montant'];

   $pdo-> supprimerFraisHorsForfait($post);
   $pdo-> creeNouveauFraisHorsForfait($Theuser,$unhorforfait['mois'],$Horsforfaitlibelle,date('d/m/Y'),$totalfrais);
 //jj//mm/aaaa       

                    }
                }
                    
            } }
              

       break;
        }  
        
        
	case 'save':{
             $Theuser = $_REQUEST['user']; 
             
                  
       
          
   $anuser= $pdo->getLesFraisForfait($Theuser,$mois);
  $horforfait = $pdo->getLesFraisHorsForfait($Theuser,$mois);
  $usersMonth= $pdo-> dernierMoisSaisi($Theuser);
$InfosFicheFrais = $pdo->getLesInfosFicheFrais($Theuser,$mois); 

  $periode =dateServeurVersFrancais($mois);
      
$lesMois=$pdo->getLesMoisDisponibles($Theuser);


          include("vues/V_Notedefrais.php");
          $mois=$_REQUEST['tmois'];  
          
          
             $anuser= $pdo->getLesFraisForfait($Theuser,$mois);
  $horforfait = $pdo->getLesFraisHorsForfait($Theuser,$mois);
            
          if(!empty($_REQUEST['userQuantite'])){
              $ID_Quantite=$_REQUEST['userQuantite'];
          }
          
          $montantValide=0;
  foreach ($anuser as $user){
                       
    $total = $user['quantite'] * $user['montant'];
  $montantValide+=   $total;      
   }
        
 foreach ($horforfait as $unFrais){
 if($unFrais['montant']>0){
 $montantValide+=   $unFrais['montant'];
                      
   if(Contient($unFrais['libelle'],'REFUSE- ')){

        $montantValide-=   $unFrais['montant'];
 }                     
  } 
  }        
   
        
     echo $montantValide;     
        
    //    $pdo->   majMontantValideFicheFrais($Theuser,$mois,$montantValide);
    //   $pdo->   majEtatFicheFrais($Theuser,$mois,'VA');
       
       break;
        }

        }

        





 
?>


