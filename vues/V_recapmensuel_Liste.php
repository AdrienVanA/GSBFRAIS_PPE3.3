<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
                 <table> 
             
     <tr>
  <td>Categorie</td>
  <td>Nombre de fiche</td>
  <td>Somme  </td>
  
</tr>
 
        <?php
        $a=0;
                   foreach ($tout_fiches as $fiche){
                      
                       echo " <tr>";
                  echo '<td>'.$tout_category[$a].'</td>';
                   echo '<td>'.$fiche[0][0].'</td>';
           echo '<td>'.$tout_total[$a][0][0].'</td>';
           echo " </tr>";
            $a++;
           
       }
        
        
        ?>


    </table> 
    
    
    </body>
</html>
