<?php
  include 'class.php';

  $merken = array("Alles", "Bentley", "Bugatti", "Ferrari", "Lamborghini", "Tesla");

  $autos = array(
    new Auto("Bentley", 660000, "images/bentley1.jpg"),
    new Auto("Bentley", 225000, "images/bentley2.jpg"),
    new Auto("Bentley", 400000, "images/bentley3.jpg"),

    new Auto("Bugatti", 300000, "images/bugatti1.jpg"),
    new Auto("Bugatti", 175000, "images/bugatti2.jpg"),
    new Auto("Bugatti", 215000, "images/bugatti3.jpg"),

    new Auto("Ferrari", 875000, "images/ferrari1.jpg"),
    new Auto("Ferrari", 410000, "images/ferrari2.jpg"),
    new Auto("Ferrari", 725000, "images/ferrari3.jpg"),

    new Auto("Lamborghini", 700000, "images/lamborghini1.jpg"),
    new Auto("Lamborghini", 285000, "images/lamborghini2.jpg"),
    new Auto("Lamborghini", 830000, "images/lamborghini3.jpg"),

    new Auto("Tesla", 900000, "images/tesla1.jpg")
  );

  if(isset($_POST['BudgetInvoer'])){
    $budget = $_POST['BudgetInvoer'];
  }
  else{
    $budget = 1000000;
  }

  if(isset($_POST['SelectMerk'])){
    $merk = $_POST['SelectMerk'];
  }else{
    $merk = "Alles";
  }

  $autoLijst = new AutoLijst($autos);
  $gefilterdeAutos = $autoLijst->checkAutos($merk, $budget);
?>

<html>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-control{
      margin: 10px;
      width: 150px;
    }
    #AutoCel{
      width: 215px;
      height: 125px;
      margin: 5px;
    }
    #AutoCel p{
      margin-left: 5px;
      margin-top: -45px;
      z-index: 1;
      color: white;
    }
    #AutoCel img{
      z-index: -1;
      height: 125px;
      width: 215px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
<!-- Een formulier waarin de gebruiker kiest welk merk hij wilt en hoeveel hij maximaal uit wilt geven -->

<form method="post">
  <select name="SelectMerk" class="form-control">
<?php
    foreach($merken as $merk) {
      $selected = "";
      if($_POST['SelectMerk'] == $merk) {
        $selected = "selected";
      }
?>
      <option value="<?=$merk?>" <?= $selected ?>><?= $merk ?></option>
    <?php } ?>
  </select>
  <input type="text" name="BudgetInvoer" placeholder=" Budget" class="form-control" value="<?=$budget?>">
  <input type="submit" name="OkButton" value="Ok" class="btn btn-primary" style="margin-left: 10px">
</form>

<?php
if(count($gefilterdeAutos) != 0){
  foreach($gefilterdeAutos as $auto){
    $prijs = number_format($auto->prijs, 0, '', '.');
?>
    <div id="AutoCel" class="col-xs-1">
      <img src="<?=$auto->plaatje?>">
      <p>&euro; <?= $auto->merk ?>,-
      <br><?= $prijs ?></p>
    </div>
<?php
  }
}
?>
</body>
</html>
