 <!doctype html> 
<html> 
<head> 
 
	<style> 
                #promptCompat{ 
                        display: none; 
                } 
                #promptCompat.no_dialog{ 
                        box-shadow: 0 0 5px 2px red; 
                        padding: 10px; 
                        display: block; 
                        text-align: center; 
                        font-weight: bold; 
                } 
                .boutons{ 
                        padding: 10px; 
                } 
                dialog{ 
                        border-radius: 10px; 
                        box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3); 
                } 
                dialog::backdrop{ 
                        background-color: rgba(0, 0, 0, 0.6); 
                } 
        </style> 
</head> 
<body> 
    
 
        
        
        
	<dialog id="mydialog"  > 
 
            <h1> <?php  echo $anuser[0]['nom'].'  '. $anuser[0]['prenom'] ?>   </h1>
              <div class="modal-body">

                <div class="form-group">
 <label for="montant">libelle</label>
 <input  readonly=""  type="text" id="montantfield" placeholder=" <?php  echo $anuser[0]['libelle'] ?> " class="form-control"/>

 <label for="status">montant</label>
 <input type="number"  type="text" id="status" placeholder="<?php  echo $anuser[0]['montant'] ?>   " class="form-control"/>
                      </div>

 <div class="form-group">
<label for="status">status fiche de frais</label>
 
 
    
     <?php 
     echo '<select name="statusfrais">';
     if($InfosFicheFrais2['idEtat']=='CL'){
     echo '  <option value="creee">Fiche créée, saisie en cours</option>
  <option selected value="cloturee">Saisie clôturée</option>
  <option value="Remboursee">Remboursée</option>
  <option value="Validee"> Validée et mise en paiement</option>';
     }else if($InfosFicheFrais2['idEtat']=='CR'){
     echo '  <option selected value="creee">Fiche créée, saisie en cours</option>
  <option value="cloturee">Saisie clôturée</option>
  <option  value="Remboursee">Remboursée</option>
  <option value="Validee"> Validée et mise en paiement</option>';
     }else if($InfosFicheFrais2['idEtat']=='RB'){
     echo '  <option value="creee">Fiche créée, saisie en cours</option>
  <option value="cloturee">Saisie clôturée</option>
  <option selected value="Remboursee">Remboursée</option>
  <option value="Validee"> Validée et mise en paiement</option>';
     }else if($InfosFicheFrais2['idEtat']=='VA'){
     echo '  <option value="creee">Fiche créée, saisie en cours</option>
  <option value="cloturee">Saisie clôturée</option>
  <option value="Remboursee">Remboursée</option>
  <option selected value="Validee"> Validée et mise en paiement</option>';
     } 
     echo "</select> ";
           
             ?>
    
 
           
 </div>

                  
 <div class="form-group">
 
 
 </div>
                  
            
            </div>          
                
           <!--valideInfosFrais($dateFrais,$libelle,$montant) -->     
                
<div class="boutons"><button onclick="$dialog.close()">Fermer</button>
<button onclick="location.href='index.php?uc=comptabilite&action=save&status='">sauvegarder</button></div> 
	
        
        
        
        
        </dialog> 
 
	<script> 
                var $dialog = document.getElementById('mydialog'); 
                if(!('show' in $dialog)){ 
                        document.getElementById('promptCompat').className = 'no_dialog'; 
                } 
                $dialog.addEventListener('close', function() { 
                        console.log('Fermeture. ', this.returnValue); 
                }); $dialog.showModal();
        </script> 
</body> 
</html>