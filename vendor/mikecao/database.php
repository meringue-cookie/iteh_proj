<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "crm";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

	function sviProizvodi() {
		$mysqli = new mysqli("localhost", "root", "", "crm");
		$q = 'SELECT * FROM proizvod ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}
	function sviKupci() {
		$mysqli = new mysqli("localhost", "root", "", "crm");
		$q = 'SELECT * FROM kupci ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}
	function sveKampanje() {
		$mysqli = new mysqli("localhost", "root", "", "crm");
		$q = 'SELECT * FROM kampanja ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function jedanProizvod($id) {
		$mysqli = new mysqli("localhost", "root", "", "crm");
		$q = 'SELECT * FROM proizvod where proizvodID = '.$id;
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
