<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=CH7V0Yb6Yt3aVhVmBQECnujYpu0BF9qWmN_3llemZe8AVZMNNlBwAE2Ood2S8a2WbDv-IYb_iSZF6vuuQ32m6RjP22Sxd_KnFW7UdqnAet-88ML6oRhMJfYW8-XgRG82q2PCOki8FGZNJ2VLDT55opNoKzqg1atA2BD_rkSxkUjVoNFiVwgrphhYBb_Qu9SI" charset="UTF-8"></script></head>
<body>
<?php

  $predmet='';
  $popis='';

  $id='-1';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include('predmety_data.php');
    //nacitanie dat z db
    init_form_data_pred($id,$predmet,$popis);
    }
    ?>

         <p id="msg"></p>
         <div class="container text-nowrap">
<form id="formular" method="POST">
        <input type="hidden" id="custId_pred" name="id_pred" value="<?php echo $id?>">
        <div class="form-group row">
        <label class="col-2 col-form-label" >Předmět*</label>
        <input type="text" id="predmet" placeholder="Předmět" name="predmet" value="<?php echo $predmet?>" required>
      </div>
        <div class="form-group row">
        <label class="col-2 col-form-label">Popis*</label>
        <input type="text" id= "popis" placeholder="Popis" name="popis" value="<?php echo $popis?>" required>
      </div>
        <button type="submit" class="btn btn-primary"><?php if($id == '-1'){echo("Vytvořit");}else{
          echo("Upravit");
        }?></button>
        <button id="vratit" name="vratit"  class="btn btn-tertiary">Zpět</button>

    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="predmety.js"></script>
</body>
</html>
