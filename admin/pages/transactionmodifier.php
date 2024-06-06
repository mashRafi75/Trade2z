<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - update Transaction</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php
    session_start();
    include 'connection.php';
    $_SESSION["id"]= $_GET['t_sl'];
    $id = $_SESSION["id"];
    $statement = $con -> prepare("SELECT * FROM trade_transection WHERE t_sl = $id");
    $statement->execute();
    $table = $statement -> fetch();

  ?>
<div class="container w-50">
  <form method="POST" action="transactionupdate.php" enctype="multipart/form-data">
      <div class="">
        <label for="recipient-name" class="col-form-label">Price:</label>
        <input type="text" class="form-control" id="recipient-name" name="Price" value="<?php echo $table['price']?>">
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