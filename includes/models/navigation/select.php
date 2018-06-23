<?php

function getLinks($conn) {
  $sql = 'SELECT navigationID,href,page FROM navigation ;';
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
  return ($stmt->rowCount() > 0)? $result : null;
}

/* function dropDown ($parent ,$level ,$conn) { 
  $upit = "SELECT * FROM navigacija WHERE Roditelj=$roditelj"; 
  $rezultat = $konekcija->query($upit); 
  if ($rezultat->rowCount() > 0){ 
  //ima podmeni 
  echo '<ul>'; 
}
  foreach($rezultat as $red){ 
    echo "<li><a href='".$red['Putanja']."'>".$red['Naziv']."</a>"; 
    prikazi_strukturu($red['idLink'], $nivo+1, $konekcija); 
    echo "</li>"; 
  } 
  if ($rezultat->rowCount() > 0)   
    echo '</ul>';
  
}  */