<?php
session_start();
require '../db_connect/db_connection.php';

$q = "SELECT * FROM `msg`";
if ($rq = mysqli_query($conn, $q)) {

  if (mysqli_num_rows($rq) > 0) {

    while ($data = mysqli_fetch_assoc($rq)) {
      if($data["id"]==$_SESSION["user_id"]){
        ?>
  <p class="sender">
    <span><?= $data["id"] ?></span>
    <?= $data["msg"] ?>
</p>

<?php
      }

      else{
?>
  <p>
    <span><?= $data["id"] ?></span>
    <?= $data["msg"] ?>
</p>

<?php
      }
    }
  } else {

    echo "<h3> Chat is empty at this moment!!</h3>";
  }
}




?>