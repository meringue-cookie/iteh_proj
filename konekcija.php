<?php
		error_reporting(E_ALL | E_STRICT);
		ini_set("display_errors", false);
		ini_set("log_errors", true);
		ini_set("error_log", "upravljanjeGreskama.log");
		
    $konekcija = new mysqli("localhost","root","","crm");

    if($konekcija->connect_error)
    {
        die("Connection failed: " . $konekcija->connect_error);
    }

	$konekcija->set_charset("utf8");
 ?>
