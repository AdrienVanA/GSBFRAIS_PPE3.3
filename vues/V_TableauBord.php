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
        <?php
         
 
  
 $data = "<table id='TABLE_USERLIST' style='display:block' width='500' >
	 <tr>  <th>Nom</th>
	 <th>Prenom</th>
     <th> Action </th>    </tr>";

  //  <button onclick="$dialog.showModal(); getLesInfosFicheFrais('.$user["id"].'","'.$month.'")">Ouvrir</button> 
 
 $color = true;
    foreach ($users as $user) {
   //  if(date("Y/m")==dateServeurVersFrancais($user['mois'])){    
 $color= !$color ;
 if ($color){
     
 $BGcolor = '#00bbff';
     
 }else if ($color==false){
    $BGcolor = '#3FC9F9'; 
 }  
 

     

 
 
        $data .= '<tr bgcolor="'.$BGcolor.'">
 <td>' . $user['nom'] . '</td>
 <td>' . $user['prenom'] . '</td>
 <td>
 <a id="choice" href="index.php?uc=TDB&user='. $user['id'] 
 .'&action=utilisateurchoisis" ><button style="width:100%" >Modifier</button></a> 
 </td> </tr>';
        
        
      
        
 //   } 
    }
$data .= '</table>';
 
echo $data;   

        ?>
        
        <table>
            <tr>  <th>Anne 1</th>
	 <th>Anne 2</th>
     <th> Evolution </th> 
            
            
            
            
       
     <?php
     $frais1=0;
     $frais2=0;
     
            $$cemois=$lesFrais[0].mois;
                     foreach ($lesFrais as $unFrais){
        
              if(cutmoisToYear($unFrais.mois)== $cemois) {
                  
                   $frais1 +=  $unFrais.quantite * $unFrais.montant;
                 } else {
                     
                      $frais2 +=  $unFrais.quantite * $unFrais.montant;
                 }
                 
            
              
                 
                 
             }
     $tableau .="  <td> ". $frais1 ." </td>
 <td>" . $frais2  . "</td>    
         <td>" . $frais1/$frais2  . " %</td>  "
             . "<th> total".$frais1+$frais2."  </th>   " ;
     
     echo $tableau;
       ?> 
     
      </table>
    </body>
</html>
