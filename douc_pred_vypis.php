<?php
include('database.php');
//$conn = new PDO("mysql:host=localhost;dbname=codingstatus", "root", "");
if (isset($_POST["type"]))
{

if($_POST["type"]=="usertable")
{
        $query = "
        SELECT douc_pred.douc_ID, douc_pred.pred_ID, usertab.Jmeno, usertab.Prijmeni, predmety.nazev FROM usertab, predmety, douc_pred WHERE usertab.ID=douc_pred.douc_ID and predmety.predID=douc_pred.pred_ID ";
        try {
        $result = $conn->query($query);
       // $param=[ $id ];
       if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)){
      // output data of each row

            $output[] = [
                'Jmeno' => $row["Jmeno"],
                'Prijmeni' => $row["Prijmeni"],
                'Nazev'=> $row["nazev"],
                'DeleteLink' => "<input type=\"button\" class=\"btn btn-secondary\" name=\"douc_pred_but" . $row["pred_ID"] ."".$row["douc_ID"]. "\" onclick=\"mazani_douc_pred(". $row["pred_ID"] .",".$row["douc_ID"]. " )\" value=\"Smazat\">",
                'EditLink' => "<a href=\"douc_pred_form.php?douc_id=". $row["douc_ID"]."&pred_id=".$row["pred_ID"]."\">Edit</a>"
            ];
          }
}
        echo json_encode($output);
}
catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
  }
}
  }
?>
