 <!doctype html> 
<html> 
<head> 
 <!--
 Ce fichier gère l'affichage des frais forfait et hors forfait et permet
 d'effectuer la validation, le calcul total des frais et le refus des fiches
 hors forfait.
 -->
 
</head> 
<body> 
       <div id='Notefrais' align="center">            
                   <?php
     //  set le nom du visiteur selectionné    
        foreach ($users as $theone){
          if($Theuser==$theone["id"]){
              $selecteduserName = $theone["nom"]; 
             $selecteduserSurName = $theone["prenom"];
             $selecteduserID = $theone["id"];    
          }             
         
                     }               

                     
          ?>
  <label>Periode</label>    
    <form action="#" method="post"   >
        
             <select id="lstMois" name="lstMois">
            <?php
    foreach ($lesMois as $unMois)  {
        
   $mois = $unMois['mois'];
    $numAnnee =  $unMois['numAnnee'];
    $numMois =  $unMois['numMois'];
    if($mois == $moisASelectionner){
    ?>
    <option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
    <?php 
    }
    else{ ?>
    <option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
    <?php 
    }
			
    }       ?>    
            
        </select>
        
        <input   type="submit" value="valider">    
      
    </form>
 
                <!--Identité et période de la personne selectionné -->
            <h1>  <?php echo $selecteduserSurName.', '.$selecteduserName.' :'.$periode  ?>   </h1>
            
                
                   <?php
                     
 echo "<form action=' index.php?uc=comptabilite&user=".$selecteduserID."&action=RefuserFrais' method='post'   >";
                     
                      
                     if(($InfosFicheFrais['idEtat']=='RB')||($InfosFicheFrais['idEtat']=='VA')){
                       $bgcouleur ='#2CF31E'; 
                       echo "<script>SetReadonly()  </script>";
                     }else if(($InfosFicheFrais['idEtat']=='CR')){
                          $bgcouleur ='#C0CBBF'; 
                     }else {
                         $bgcouleur ='#b3b3ff';  
                     }
                     
                     
                     
       //Tableau état de la fiche de frais   
 $data ="<table bgcolor='".$bgcouleur."' width='500'> <tr>  <th>Etat: ".$InfosFicheFrais['libEtat']."   </th> </tr><tr>"
 . "<th>Montant valide : ".$InfosFicheFrais['montantValide']."</th>   <th>Justificatif: ".$InfosFicheFrais['nbJustificatifs']."  </th> </tr></table>"  ;
                   
             //tableau détails des frais      
 
                    $data .= "</br><table width='500' >
	 <tr>  <th>Frais forfaitaire   </th>
	 <th>Quantite            </th>
     <th> Montant  </th> <th> Total   </th> 
	  </tr>";
                   $grandtotal = 0 ;
                   $ValidationMontant=0;
                $BG2Color="#9999ff";
                    
                if( !isset($anuser[0]["quantite"])){
                    echo "<b>Ce visiteur n'a pas encore remplit sa fiche de frais </b> </br>";
                }
                


                   foreach ($anuser as $user){
                       
                       $total = $user['quantite'] * $user['montant'];
                       
                       
         $data .= " <tr bgcolor='#b3b3ff'  > <td>  ".$user['libelle']." "
                 . " </td><td> "
                 . "<input    id='InputQuantite' type='text' name='userQuantite[".$user['idfrais']."]' value='".$user['quantite']."'>  "
                 . "</td><td> ".$user['montant'].
                 " </td><td bgcolor='#9999ff'> $total </td>  </tr>";              
              $grandtotal+=   $total;      
                
   
                   }
                   $data .= "<tr><td colspan='3' > Autres Frais</td> </tr> ";
                
                 
                   
                  //Tableau frais horsforfait 
                 foreach ($horforfait as $unFrais){
                        if($unFrais['montant']>0){
                      $grandtotal+=   $unFrais['montant'];
                      
   if(Contient($unFrais['libelle'],'REFUSE- ')){
                       
       $secBGColor='#F90A1A'; 
       $secBGColor2='#F90A1A';
       
        $grandtotal-=   $unFrais['montant'];
                      }else{
                         $secBGColor='#b3b3ff'; 
                         $secBGColor2='#9999ff';      
                      }

                      
                      
  $data .=" <tr bgcolor='".$secBGColor."'> <td> ".$unFrais['libelle'].
          " </td><td>id: ".$unFrais['id'].
     "</td><td> <input type='checkbox' name='check_list[]' value='"
          .$unFrais['id']."'>Refuse? ". "</td> <td bgcolor='".$secBGColor2."'>"
          .$unFrais['montant']."</td>  </tr>";    
                  
  } 
              }      
                   
 $data .= "<tr bgcolor='#9999ff'> <td>Total</td> <td></td> <td></td> "
         . "<td > $grandtotal</td>  </tr></table>";
                   
                 //Envoi les tableau  
                   echo $data;
                   
 if(($InfosFicheFrais['idEtat']=='RB')||($InfosFicheFrais['idEtat']=='VA')){
 ?>  <script> 
 document.getElementById('InputQuantite').readOnly = true;
</script>
 
     <?php 
   }
                   
                    ?> 
 
                      
       <input type="submit" value="Modifier">
                    </form>
                    
             

    
     <?php  
     $a =str_replace("/","",$periode);
     echo   "<a href='index.php?uc=comptabilite&action=save&user=".$selecteduserID."&tmois=".$a."'>";   ?> 
           <button style="width: 130" onclick="Mess()">Valider les frais</button>
         </a>
</div> 
    
    
    <script>
function Mess() {
 <?php echo ' alert("La fiche de frais de '.$selecteduserName.' '.$selecteduserSurName.'  est validé  et son montant validé ('.$grandtotal.' euros) a été mis à jour!");'; ?> 
}

 

</script>
 
        
 
</body> 
</html>