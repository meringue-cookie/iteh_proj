<?php
include("konekcija.php");

	$array['cols'][] = array('label' => 'Proizvod','type' => 'string');
  $array['cols'][] = array('label' => 'Broj pojavljivanja u kampanjama', 'type' => 'number');

	$sql="SELECT p.naziv, COUNT( k.proizvodID ) as brojPojavljivanja FROM proizvod p JOIN kampanja k ON p.proizvodID = k.proizvodID GROUP BY p.proizvodID";

	$n = $konekcija->query($sql);
	while($red  = $n->fetch_assoc()){
	 $array['rows'][] = array('c' => array( array('v'=>$red['naziv']),array('v'=>(int)$red['brojPojavljivanja']))) ;

	}

	$niz_json = json_encode ($array);
	print ($niz_json);




?>
