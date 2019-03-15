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
 
            <h1> introduire nom  & prenom ici   </h1>
              <div class="modal-body">

                 
             
                  
                <div class="form-group">
                    <form action="#" method="post"   >
                        
                 
                    
                   <?php
                   
                    $data = "<table >
	 <tr>  <th>Frais forfaitaire   </th>
	 <th>Quantite            </th>
     <th> Montant  </th> <th> Total   </th> 
	  </tr>";
                   $grandtotal = 0 ;
                   $ValidationMontant=0;
                $BG2Color="#9999ff";
                    
                   foreach ($anuser as $user){
                       
                       $total = $user['quantite'] * $user['montant'];
         $data .= " <tr bgcolor='#b3b3ff'  > <td>  ".$user['libelle']." "
                 . " </td><td>  ".$user['quantite']." </td><td> ".$user['montant']." </td><td bgcolor='#9999ff'> $total </td>  </tr>";              
              $grandtotal+=   $total;      
              
   
                   }
                   $data .= "<tr><td colspan='3' > Autres Frais</td> </tr> ";
                 foreach ($horforfait as $unFrais){
                        if($unFrais['montant']>0){
                      $grandtotal+=   $unFrais['montant'];
                    $data .=" <tr bgcolor='#b3b3ff'> <td> ".$unFrais['libelle']." </td><td>id: ".$unFrais['id'].
  "</td><td> <a><button style='color:red;' id='refus'><b>Refuse? </b></button> </a> "
                            
                            . "</td> <td bgcolor='#9999ff'>".$unFrais['montant']."</td>"
                            . " <td>    </td> </tr>";
                      
                   } 
              }      
                   
                   
                   
                   $data .= "<tr bgcolor='#9999ff'> <td>Total</td> <td></td> <td></td> <td > $grandtotal</td>  </tr></table>";
                   echo $data;
                    ?> 
       <input type="submit" value="recuperer">
                    </form>
                    
                     <?php  
                   
 
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['horforfait'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['horforfait'] as $selected){
echo $selected."</br>";
}
}
}
 
                             ?> 
                    
              </div>
                  
                  
 <div class="form-group">
<label for="status">status fiche de frais</label>
 

    

 
           
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