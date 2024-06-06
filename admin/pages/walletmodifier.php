<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - update Wallet</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php
    session_start();
    include 'connection.php';
    $_SESSION["wallet_id"]= $_GET['wallet_id'];
    $id = $_SESSION["wallet_id"];
    //$id = $_GET['Wallet_id'];
    $statement = $con -> prepare("SELECT * FROM wallet WHERE wallet_id = $id");
    $statement->execute();
    $table = $statement -> fetch();

  ?>
<div class="container w-50">
  <form method="POST" action="walletupdate.php" enctype="multipart/form-data">
      <div class="">
        <label for="recipient-name" class="col-form-label">Current Balance</label>
        <input type="text" class="form-control" id="recipient-name" name="Current" value="<?php echo $table['cur_balance']?>">
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