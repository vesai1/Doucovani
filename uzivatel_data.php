<?php
include('database.php');

$db=$conn;// database connection
//legal input values
if($_POST) {
$jmeno = $_POST["jmeno"];
$prijmeni=$_POST["prijmeni"];
$emailAdre = $_POST["emailAdre"];
$heslo=$_POST["heslo"];
$tel=$_POST["tel"];
$adresa=$_POST["adresa"];
$typuzi=$_POST["typuzi"];
$emailrod=$_POST["emailrod"];
$telrod=$_POST["telrod"];
$id = $_POST['id'];

if (email_exists($emailAdre,$id)){
  send_result($status="ERR",$message="Zadan email existuje");
} else {
  // code...}


    //  Sql Query to insert user data into database table
    if($id>0){
        update_data($jmeno,$prijmeni,$emailAdre,$heslo,$tel,$adresa,$typuzi,$emailrod,$telrod,$id);
    } else
    {
    Insert_data($jmeno,$prijmeni,$emailAdre,$heslo,$tel,$adresa,$typuzi,$emailrod,$telrod);
    }
}; //if email exists

};

function send_result($status,$message)
{
$result =
"{\"status\":\"".$status."\", \"message\":\"".$message."\"}";
echo ($result);
}

// convert illegal input value to ligal value formate
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}
// // function to insert user data into database table
 function insert_data($jmeno,$prijmeni,$emailAdre,$heslo,$tel,$adresa,$typuzi,$emailrod,$telrod){
global $db;

      $query="INSERT INTO usertab (Jmeno,Prijmeni,Email,Heslo,Tel,Adresa,typuzi,rodicTel,rodicEma) VALUES ('$jmeno','$prijmeni','$emailAdre','$heslo','$tel','$adresa','$typuzi','$emailrod','$telrod')";

     $execute=mysqli_query($db,$query);
     if($execute==true)
     {
       send_result($status="OK",$message="User data was inserted successfully");
     }
     else{
      send_result($status="ERR",$message="Error: " . $sql . "<br>" . mysqli_error($db));
     }

 }

 function update_data($jmeno,$prijmeni,$emailAdre,$heslo,$tel,$adresa,$typuzi,$emailrod,$telrod,$id){
    global $db;
    try{
          $query="UPDATE usertab SET Jmeno = '$jmeno',Prijmeni='$prijmeni', Email = '$emailAdre',Heslo = '$heslo',Tel = '$tel',Adresa='$adresa',typuzi='$typuzi',rodicTel='$telrod',rodicEma='$emailrod' where ID = $id";
           $execute=mysqli_query($db,$query);
         if($execute==true)
         {

           send_result($status="OK",$message="User data was updated successfully");
         }
         else{
          send_result($status="ERR",$message="Error: " . $sql . "<br>" . mysqli_error($db));
         }
        }catch (Exception $e){
            $error = $e->getMessage();
            send_result($status="ERR",$message=$error);
        }
     }

  function init_form_data($id,&$jmeno,&$prijmeni,&$emailAdre,&$heslo,&$tel,&$adresa,&$typuzi,&$emailrod,&$telrod)
  {
    $query = "SELECT Jmeno, Prijmeni, Email, Heslo, Tel, Adresa, typuzi, rodicEma, rodicTel FROM usertab where id=".$id;
    global $db;
        try {
        $result = $db->query($query);
       // $param=[ $id ];
       if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)){
            $jmeno = $row["Jmeno"];
            $prijmeni=$row["Prijmeni"];
            $emailAdre = $row["Email"];
            $heslo=$row["Heslo"];
            $tel=$row["Tel"];
            $adresa=$row["Adresa"];
            $typuzi=$row["typuzi"];
            $emailrod=$row["rodicEma"];
            $telrod=$row["rodicTel"];

        }
      }
    }catch (Exception $e){
        $error = $e->getMessage();
        send_result($status="ERR",$message=$error);
    }
  }

  function email_exists($email,$id)
  {
    $query = "SELECT id FROM usertab where Email='".$email."'";
    global $db;
        try {
        $result = $db->query($query);
       // $param=[ $id ];
       if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         if($row['id'] != $id){
         return TRUE;
       } else {
         return FALSE;
       }
       }
       else {
         return FALSE;
       };

  }catch (Exception $e){
      $error = $e->getMessage();
      send_result($status="ERR",$message=$error);
  }
};
?>
