<?php
include('database.php');
//$conn = new PDO("mysql:host=localhost;dbname=codingstatus", "root", "");
if (isset($_POST["type"])) {

if($_POST["type"]=="usertable"){
        $query = "
        SELECT id,Jmeno, Prijmeni, Email, Heslo, Tel, Adresa, typuzi, rodicEma, rodicTel  FROM usertab";
        try {
        $result = $conn->query($query);
       // $param=[ $id ];
       if (mysqli_num_rows($result) > 0) {
      // output data of each row

         while($row = mysqli_fetch_assoc($result)){
            $output[] = [
                'Jmeno' => $row["Jmeno"],
                'Prijmeni' => $row["Prijmeni"],
                'Email' => $row["Email"],
                'Heslo' => $row["Heslo"],
                'Tel' => $row["Tel"],
                'Adresa' => $row["Adresa"],
                'typuzi' => $row["typuzi"],
                'rodicTel' => $row["rodicTel"],
                'rodicEma' => $row["rodicEma"],
                'DeleteLink' => "<input type=\"button\" class=\"btn btn-secondary\" name=\"but" . $row["id"] . "\" onclick=\"mazani(". $row["id"] .")\" value=\"Smazat\">",
                'EditLink' => "<a href=\"uzivatel_form.php?id=". $row["id"]."\">Edit</a>"
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
else{
  $param=[ $_GET["id"]];
  $query = "
  DELETE FROM usertable WHERE id=?";
  $statement = $conn->prepare($query);


  if($statement->execute($param)) {
    echo "Post deleted successfully!";
  }
  else{
   echo  "Error: ";
  }
}

?>
