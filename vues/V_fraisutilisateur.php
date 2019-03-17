<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
     
    </head>
    <body>
<?php    
 
 
         
 
 
 $data = "<table width='500' >
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
 

 <a id="choice" href="index.php?uc=comptabilite&user='. $user['id'] 
 .'&action=utilisateurchoisis" ><button style="width:100%" >Modifier</button></a> 
 
 </td>  
 </tr>';
        
        
      
        
 //   } 
    }
$data .= '</table>';
 
echo $data;   

 //  date("Y/m") 
     
      /*
	<script> 
                var $dialog = document.getElementById('mydialog'); 
                if(!('show' in $dialog)){ 
                        document.getElementById('promptCompat').className = 'no_dialog'; 
                } 
                $dialog.addEventListener('close', function() { 
                        console.log('Fermeture. ', this.returnValue); 
                }); 
        </script> 
       */ 
?>       
        
 
     
        

 

</body> 
</html>

  
        
      