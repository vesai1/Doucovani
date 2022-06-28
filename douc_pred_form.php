<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<!--<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=HQ4FtylzF1qLGYUJS097WDhtL6Fk6CIzYDYrJcWvdpSWMzeyrHNlYO_-4ov_wO7mGqvP3jBw0geV6alq0wSLeL1_d-iONreuzMtzGD3ydbIsmeWCeZQOllviaIUdCethpwZM0AE5jIqKUFWJF_2HfWno5GxjEOe_mj0hEUeXonL-n3c0rskkBBfyPCHNiX03" charset="UTF-8"></script></head> -->
<body>
<?php
include('douc_pred_data.php');

  
  $id='-1';
if(isset($_GET['pred_id'])&&isset($_GET['douc_id'])){
    $pred_id = $_GET['pred_id'];
    $douc_id = $_GET['douc_id'];
    $id=$pred_id.','.$douc_id;
    //nacitanie dat z db
  //  init_form_data_pred($id,$predmet,$popis);
    }
    ?>

         <p id="msg"></p>
         <div class="container text-nowrap">
<form id="formular" method="POST">
        <input type="hidden" id="custId_pred" name="id_pred" value="<?php echo $id?>">
        <div class="form-group row">
        <label class="col-2 col-form-label" >Doučující*</label>
        <select id="doucuj" name="doucuj" class="col-2 custom-select" required>
        <?php init_lov_douc($douc_id); ?>
        </select>
      </div>
        <div class="form-group row">
          <label class="col-2 col-form-label" >Předmět*</label>
          <select id="predmet" name="predmet" class=" col-2 custom-select" required>
          <?php init_lov_predmet($pred_id); ?>
          </select>
      </div>
        <button type="submit" class="btn btn-primary"><?php if($id == '-1'){echo("Vytvořit");}else{
          echo("Upravit");
        }?></button>
        <button id="vratit" name="vratit"  class="btn btn-tertiary">Zpět</button>

    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="douc_pred.js"></script>
</body>
</html>
