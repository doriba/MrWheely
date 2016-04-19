<?php
class Auto{
  function Auto($merk, $prijs, $plaatje){
    $this->merk = $merk;
    $this->prijs = $prijs;
    $this->plaatje = $plaatje;
  }

  function getMerk(){
    return $merk;
  }
  function setMerk($merk){
    $this->merk = $merk;
  }

  function getPrijs(){
    return $prijs;
  }
  function setPrijs($prijs){
    $this->prijs = $prijs;
  }

  function getPlaatje(){
    return $plaatje;
  }
  function setPlaatje($plaatje){
    $this->plaatje = $plaatje;
  }
}

class AutoLijst{
  public $autos;

  function AutoLijst($autos) {
    $this->autos = $autos;
  }

  function checkAutos($merk, $budget){
    $gefilterdeAutos = array();

  if($merk != "Alles"){
    foreach($this->autos as $auto){
      if($merk == $auto->merk && $auto->prijs <= $budget){
        array_push($gefilterdeAutos, $auto);
      }
    }
  }
  else{
    if(!isset($budget) || $budget == NULL){
      $gefilterdeAutos = $this->autos;
    }
    else{
      foreach($this->autos as $auto){
        if($auto->prijs <= $budget){
          array_push($gefilterdeAutos, $auto);
        }
      }
    }
  }
    if(count($gefilterdeAutos) != 0){
      return $gefilterdeAutos;
    }
    else{
      return "Array is leeg. Budget was: " .$budget;
    }
  }
}
?>
