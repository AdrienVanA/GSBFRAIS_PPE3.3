    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
         
      </div>  
        <ul id="menuList">
			<li >
				  <?php echo $_SESSION['type_utilisateur']?> :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
	<br/>	<br/>	</li>
 
           <li class="smenu">
              <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
          <br/>  </li>
           
           
               
               <?php if($_SESSION['type_utilisateur']=='comptable'){
                 
 echo "<li style='color:black;' class='smenu'>  <span >Administration</span>  </li>
           <li class='smenu'>
              <a href='index.php?uc=comptabilite&action=rien' title='Consultation de fiches de frais'> fiches de frais</a>
           </li>";
 
 /*
  echo " 
           <li class='smenu'>
              <a href='index.php?uc=TDB&action=' title='Page de test'> Tableau de bord</a>
           </li>";
  */
  
   
  echo " 
           <li class='smenu'>
              <a href='index.php?uc=Recapmensuel&action=' title='Page de test'> Recapmensuel </a>
           </li>";
   
 
               } ?>

          
 	   <li class="smenu"> <br/>
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </div>
    