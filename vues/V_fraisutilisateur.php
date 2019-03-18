<!DOCTYPE html>
<!--
Ce fichier affiche la liste des visiteurs qu'ils aient remplis
leurs fiches de frais du mois ou non.
-->
<html>
    <head>
        <meta charset="UTF-8">
     
    </head>
    <body>
        </br>
        <button  style="width:90" onclick='HideShow()'><i id='BT_TXT' style="font-size:10" >Cacher la Liste</i></button>      
        
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
 <a id="choice" href="index.php?uc=comptabilite&user='. $user['id'] 
 .'&action=utilisateurchoisis" ><button style="width:100%" >Modifier</button></a> 
 </td> </tr>';
        
        
      
        
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
        
 
     
           <script>
 var table = document.getElementById('TABLE_USERLIST')
 var Txt = document.getElementById('BT_TXT')
  var ListBool = new Boolean(1); HideShow();
 function HideShow(){

  if(ListBool){
       table.style.display = "none";
       Txt.innerHTML ='Ouvrir la liste'
       ListBool=false;
  }else{
     table.style.display = "block";  
      Txt.innerHTML ='Cacher la liste'
      ListBool=true;
  }
      }
     
function SetBool( T){
    if(T==true){
        ListBool=true;
    }else{
        ListBool=false; 
    }
}
           
          
           </script>       

 

</body> 
</html>

  
        
      