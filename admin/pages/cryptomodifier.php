<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - update Crypto</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php
    session_start();
    include 'connection.php';
    $_SESSION["id"]= $_GET['c_id'];
    $id = $_SESSION["id"];
    $statement = $con -> prepare("SELECT * FROM crypto_info WHERE c_id = $id");
    $statement->execute();
    $table = $statement -> fetch();

  ?>
<div class="container w-50">
  <form method="POST" action="cryptoupdate.php" enctype="multipart/form-data">
      <div class="">
        <label for="recipient-name" class="col-form-label">img:</label>
        <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Name:</label>
        <input type="text" class="form-control" id="recipient-name" name="Name" value="<?php echo $table['c_name']?>">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Value:</label>
        <input type="text" class="form-control" id="recipient-name" name="Value" value="<?php echo $table['c_price']?>">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Graph:</label>
        <select class="form-control" id="recipient-name" name="Graph">
          <option value="up" <?php if($table['graph'] == 'up') echo 'selected'; ?>>Up</option>
          <option value="down" <?php if($table['graph'] == 'down') echo 'selected'; ?>>Down</option>
        </select>
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