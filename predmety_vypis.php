<?php
include('database.php');
//$conn = new PDO("mysql:host=localhost;dbname=codingstatus", "root", "");
if (isset($_POST["type"])) {

if($_POST["type"]=="usertable"){
        $query = "
        SELECT predID,nazev, popis FROM predmety";
        try {
        $result = $conn->query($query);
       // $param=[ $id ];
       if (mysqli_num_rows($result) > 0) {
      // output data of each row

         while($row = mysqli_fetch_assoc($result)){
            $output[] = [
                'predmet' => $row["nazev"],
                'popis' => $row["popis"],
                'DeleteLink' => "<input type=\"button\" class=\"btn btn-secondary\" name=\"pred_but" . $row["predID"] . "\" onclick=\"mazani_pred(". $row["predID"] .")\" value=\"Smazat\">",
                'EditLink' => "<a href=\"predmety_form.php?id=". $row["predID"]."\">Edit</a>"
            ];
}
        echo json_encode($output);
}
}catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
  }
  }
}
