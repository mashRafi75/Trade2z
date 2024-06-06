<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - Update Expert</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php
    session_start();
    include 'connection.php';
    if(isset($_POST['submit'])){
        $id = $_POST['submit'];
        $Payment = $_POST['Payment'];

        $requete = $con->prepare("UPDATE expert 
                                  SET 
                                  exp_payment = ?
                                  WHERE exp_id = ?");
        $requete->bindParam(1, $Payment);
        $requete->bindParam(2, $id);
        $res = $requete->execute();
        if($res){
            header("location:expert.php");
            exit();
        } else {
            echo "Error updating expert.";
        }
    }

    $id = $_GET['exp_id'];
    $statement = $con->prepare("SELECT * FROM expert WHERE exp_id = ?");
    $statement->bindParam(1, $id);
    $statement->execute();
    $table = $statement->fetch();
  ?>
<div class="container w-50">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
      <div class="">
        <label for="recipient-name" class="col-form-label">Payment(Hour)</label>
        <input type="text" class="form-control" id="recipient-name" name="Payment" value="<?php echo $table['exp_payment']?>">
      </div>
      
      <div class="modal-footer">
        <button type="submit" name="submit" value="<?php echo $id ?>" class="btn btn-primary">Update</button>
      </div>
  </form>
</div>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
