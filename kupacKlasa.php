<?php

class Kupac
{
    public $kupacID;
    public $imeprezime;
    public $email;
    public $adresa;
    public $korisnickoIme;
    public $lozinka;
    public $nivoPristupa;
    public $ulogovan;

    public  function  __construct($kupacID,$imeprezime,$email,$adresa,$korisnickoIme,$lozinka,$nivoPristupa){
        $this->kupacID = $kupacID;
        $this->imeprezime = $imeprezime;
        $this->email = $email;
        $this->adresa = $adresa;
        $this->korisnickoIme = $korisnickoIme;
        $this->lozinka = $lozinka;
        $this->nivoPristupa = $nivoPristupa;
    }

    public static function napraviPraznog() {
       $prazan = new self(-1,"Ime Prezime","email","adresa","","",false);
       $prazan->ulogovan=false;
       return $prazan;
   }

    public static function login($konekcija,$username,$password)
  	{
      $upit = "select * from kupac k where k.korisnickoIme='$username' and lozinka='$password'";
  		$result = $konekcija->query($upit);
      while($red = $result->fetch_assoc()) {

        $kupac = new Kupac($red['kupacID'],$red['imePrezime'],$red['email'],$red['adresa'],$red['korisnickoIme'],$red['lozinka'],$red['nivoPristupa']);
        $kupac->ulogovan=true;
        $_SESSION['ulogovaniKupac'] = $kupac;
        return true;
      	}

      	return false;
  	}
    public function napraviNalogKupcu($konekcija)
  	{
      if($konekcija->query("INSERT INTO kupac(imePrezime,email,adresa,korisnickoIme,lozinka) VALUES ('$this->imeprezime','$this->email','$this->adresa','$this->korisnickoIme','$this->lozinka')")){
        return true;
      }
      return false;
    }

    public function ulogovan(){
        return $this->ulogovan;
    }
    public function admin(){
        return $this->nivoPristupa;
    }


}

?>
