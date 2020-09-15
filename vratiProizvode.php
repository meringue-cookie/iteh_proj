<?php
include 'konekcija.php';
if($_GET['min'] == ''){
  $min = 0;
}else{
  $pommin = $konekcija->real_escape_string($_GET['min']);
  $min = intval($pommin);
}

if($_GET['max'] == ''){
  $max = 100000;
}else{
  $pommax = $konekcija->real_escape_string($_GET['max']);
  $max = intval($pommax);
}

//$upit = "SELECT * FROM proizvod";
//$rez = $konekcija->query($upit);
$curl = curl_init("http://localhost/crm/rest/proizvodi");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$jsonOdgovor = curl_exec($curl);
curl_close($curl);
$podaci = json_decode($jsonOdgovor);
//var_dump($podaci);
//$niz = [];
//while($red = $rez->fetch_assoc()){
//  array_push($niz,$red);
//}

 ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th class="text-center">Prozivod ID</th>
      <th class="text-center">Naziv</th>
      <th class="text-center">Cena</th>
      <th class="text-center">Detaljnije</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($podaci as $p){
      if($p->cena > $min && $p->cena< $max){
    ?>
      <tr>
        <td class="text-center"><?php echo $p->proizvodID ?></td>
        <td class="text-center"><?php echo $p->naziv ?></td>
        <td class="text-center"><?php echo $p->cena ?></td>
        <td class="text-center"><a href="detaljnije.php?id=<?php echo $p->proizvodID ?>" class="btn btn-info">Detaljnije </a></td>
      </tr>
    <?php
      }
        }
     ?>
  </tbodY>
</table>
