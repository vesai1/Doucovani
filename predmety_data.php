<?php
include('database.php');

$db=$conn;// database connection
//legal input values
if($_POST) {
  if(isset($_POST['action'])&&$_POST['action']=="delete"){
    delete_pred();
  }else{
$predmet = $_POST["predmet"];
$popis=$_POST["popis"];
$id = $_POST['id_pred'];

if (predmet_exists($predmet,$id)){
  send_result($status="ERR",$message="Zadan predmet existuje");
} else {
  // code...}


    //  Sql Query to insert user data into database table
    if($id>0){
        update_data_pred($predmet,$popis,$id);
    } else
    {
    Insert_data_pred($predmet,$popis);
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
 function insert_data_pred($predmet,$popis){
global $db;

      $query="INSERT INTO predmety (nazev,popis) VALUES ('$predmet','$popis')";

     $execute=mysqli_query($db,$query);
     if($execute==true)
     {
       send_result($status="OK",$message="User data was inserted successfully");
     }
     else{
      send_result($status="ERR",$message="Error: " . $sql . "<br>" . mysqli_error($db));
     }

 }

 function update_data_pred($predmet,$popis, $id){
    global $db;
    try{
          $query="UPDATE predmety SET nazev = '$predmet',popis='$popis' where predID = $id";
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

  function init_form_data_pred($id,&$predmet,&$popis)
  {
    $query = "SELECT nazev, popis FROM predmety where predID=".$id;
    global $db;
        try {
        $result = $db->query($query);
       // $param=[ $id ];
       if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)){
            $predmet = $row["nazev"];
            $popis=$row["popis"];
        }
      }
    }catch (Exception $e){
        $error = $e->getMessage();
        send_result($status="ERR",$message=$error);
    }
  }

  function predmet_exists($predmet,$id)
  {
    $query = "SELECT predID FROM predmety where nazev='".$predmet."'";
    global $db;
        try {
        $result = $db->query($query);
       // $param=[ $id ];
       if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         if($row['predID'] != $id){
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
function delete_pred(){
  global $db;
  if (isset($_POST["sid"])) {
    $param=[ $_POST["sid"]];

    $query = "
    DELETE FROM predmety WHERE predID=?";
    $statement = $db->prepare($query);

  if($statement->execute($param)) {
    echo("YES");
  }
  } else
  {
    $result="Tu";
}
}
?>
