<?php
include('database.php');
//$conn = new PDO("mysql:host=localhost;dbname=codingstatus", "root", "");

if (isset($_POST["sid"])) {
  $param=[ $_POST["sid"]];

  $query = "
  DELETE FROM usertab WHERE id=?";
  $statement = $conn->prepare($query);

if($statement->execute($param)) {
  echo("YES");
}
} else
{
  $result="Tu";
}
?>
