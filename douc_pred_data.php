<?php
include('database.php');

$db=$conn;// database connection
//legal input values
if($_POST) {
  if(isset($_POST['action'])&&$_POST['action']=="delete"){
    delete_douc_pred();
  }else{
$predmet = $_POST["predmet"];
$doucuj=$_POST["doucuj"];
$id = $_POST['id_pred'];

if (predmet_douc_exists($predmet,$doucuj)){
  send_result($status="ERR",$message="Zadan predmet existuje");
} else {
  // code...}


    //  Sql Query to insert user data into database table
    if($id != '-1'){
        update_data_douc_pred($predmet,$doucuj,$id);
    } else
    {
    Insert_data_douc_pred($predmet,$doucuj);
    }
}; //if email exists
};
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
 function insert_data_douc_pred($predmet,$doucuj){
global $db;

      $query="INSERT INTO douc_pred (pred_ID,douc_id) VALUES ('$predmet','$doucuj')";

     $execute=mysqli_query($db,$query);
     if($execute==true)
     {
       send_result($status="OK",$message="User data was inserted successfully");
     }
     else{
      send_result($status="ERR",$message="Error: " . $sql . "<br>" . mysqli_error($db));
     }

 }

 function update_data_douc_pred($predmet,$doucuj, $id){
    global $db;
    try{
          $query="UPDATE douc_pred SET pred_ID = '$predmet',douc_ID='$doucuj' where (pred_ID,douc_ID) = (".$id.")";
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



  function predmet_douc_exists($predmet,$doucuj)
  {
    $query = "SELECT * FROM douc_pred where douc_id='".$doucuj."' and pred_id='".$predmet."' ";
    global $db;
        try {
        $result = $db->query($query);
       // $param=[ $id ];
       if (mysqli_num_rows($result) > 0) {

         return TRUE;
       } else {
         return FALSE;
       }

  }catch (Exception $e){
      $error = $e->getMessage();
      send_result($status="ERR",$message=$error);
  }
};
function delete_douc_pred(){
  global $db;
  if (isset($_POST["sid"]) & isset($_POST["pid"])) {
    $param=[ $_POST["sid"]];
    $doucid=$_POST["pid"];
    $query = "
    DELETE FROM douc_pred WHERE pred_ID=? and douc_ID=".$doucid;
    $statement = $db->prepare($query);

  if($statement->execute($param)) {
    echo("YES");
  }
  } else
  {
    $result="Tu";
}
}

function init_lov_predmet($pred_id)
{
  $query = "SELECT predID as id, nazev FROM predmety";
  global $db;
      try {
      $result = $db->query($query);
     // $param=[ $id ];
     if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)){
  if($row["id"]==$pred_id){
  echo "<option selected value=\"".$row["id"]."\">".$row["nazev"]."</option>";
}else{
  echo "<option value=\"".$row["id"]."\">".$row["nazev"]."</option>";
      }
    }
  }
  }catch (Exception $e){
      $error = $e->getMessage();
      echo $error;
  }
}

function init_lov_douc($douc_id)
{
  $query = "SELECT ID as id, Jmeno , Prijmeni FROM usertab WHERE typuzi= 'd'" ;
  global $db;
      try {
      $result = $db->query($query);
     // $param=[ $id ];
     if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)){
  if($row["id"]==$douc_id){
  echo "<option selected value=\"".$row["id"]."\">".$row["Jmeno"]."".' '."".$row["Prijmeni"]."</option>";
}else{
  echo "<option value=\"".$row["id"]."\">".$row["Jmeno"]."".' '."".$row["Prijmeni"]."</option>";
      }

      }
    }
  }catch (Exception $e){
      $error = $e->getMessage();
      echo $error;
  }
}
?>
