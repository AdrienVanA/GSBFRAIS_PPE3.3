<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recapitulatif Mensuel</title>
    </head>
    <body>
          <h1>Recapitulatif Mensuel</h1>
 
     
          
          
    
          
 <form action="index.php?uc=Recapmensuel&action=valider" method="post">
     
       Date
       <select name="TakeMonth">
            
              <?php
               
       foreach ($LesMois as $month){
           
        
        
 echo ' <option value="'.$month[0].'"> '.$month[0].' </option>' ;
 
    
     
       }
       
        ?> 
  
</select>   
     
     <br>
  <input type="checkbox" class="forfait" name="Tforfait1" value="ETP" checked> Forfait Etape
  <input type="checkbox" class="forfait" name="Tforfait2" value="KM" checked> Frais kilométrique 
  <input type="checkbox" class="forfait" name="Tforfait3" value="NUI" checked > Nuit Hotel 
    <input type="checkbox" class="forfait" name="Tforfait4" value="REP" checked > Repas restaurant<br><br>
  <input type="submit" value="Submit">
</form>
         
          
        
       <?php 
        ?>
    </body>
</html>
