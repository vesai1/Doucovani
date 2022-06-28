<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=YskEf7-XgMLtr7PK3wNEtuFnx_a9ezcVRScQU9FjGSrlzhMf2n_NclajvXP_Dj33xt8p8oaGWQHac00z3YD502es2fZKzg6dDUu6wUJ3li6Ll88ryU0F4rEjEoNf42J30yTGufDL6KqTcecRKhM8RY3J3t7z-1-wmCu9BbM7P0IyPl0-ahpu7YWp3mYhloXV" charset="UTF-8"></script></head>
<body>
<?php

  $jmeno='';
  $prijmeni='';
  $emailAdre='';
  $heslo='';
  $tel='';
  $adresa='';
  $typuzi='';
  $emailrod='';
  $telrod='';
  $id='-1';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include('uzivatel_data.php');
    //nacitanie dat z db
    init_form_data($id,$jmeno,$prijmeni,$emailAdre,$heslo,$tel,$adresa,$typuzi,$emailrod,$telrod);
    }
    ?>

         <p id="msg"></p>
         <div class="container text-nowrap">
<form id="formular" method="POST">
        <input type="hidden" id="custId" name="id" value="<?php echo $id?>">
        <div class="form-group row">
        <label class="col-2 col-form-label" >Jmeno*</label>
        <input type="text" id="jmeno" placeholder="Jmeno" name="jmeno" value="<?php echo $jmeno?>" required>
      </div>
        <div class="form-group row">
        <label class="col-2 col-form-label">Příjmení*</label>
        <input type="text" id= "prijmeni" placeholder="Příjmení" name="prijmeni" value="<?php echo $prijmeni?>" required>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">Email*</label>
        <input type="email" id="emailAdre" placeholder="Email" name="emailAdre" value="<?php echo $emailAdre?>" required>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">Heslo*</label>
        <input type="city" id= "heslo" placeholder="Heslo" name="heslo" value="<?php echo $heslo?>" required>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">Telefon*</label>
        <input type="city" id= "tel" placeholder="Telefon" name="tel" value="<?php echo $tel?>" required>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">Adresa</label>
        <input type="text" id= "adresa" placeholder="Adresa" name="adresa" value="<?php echo $adresa?>">
      </div>
      <div class="form-group row">
          <label for="typuzi" class="col-2 col-form-label">Typ Uživatele*</label>
          <div class="col-2">
        <select id="typuzi" name="typuzi" class="custom-select" required>
          <option value="a">Admin</option>
          <option <?php if($typuzi == 'd'){echo("selected");}?> value="d">Doučující</option>
          <option <?php if($typuzi == 's'){echo("selected");}?> value="s">Student</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label">Email rodiče</label>
        <input type="text" id= "emailrod" placeholder="Email" name="emailrod" value="<?php echo $emailrod?>">
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">Tel. rodiče</label>
        <input type="text" id= "telrod" placeholder="Telefon" name="telrod" value="<?php echo $telrod?>" >
      </div>
        <button type="submit" class="btn btn-primary"><?php if($id == '-1'){echo("Vytvořit");}else{
          echo("Upravit");
        }?></button>
        <button id="vratit" name="vratit"  class="btn btn-tertiary">Zpět</button>

    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="uzivatel.js"></script>
</body>
</html>
