<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - update seminar</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php
    session_start();
    include 'connection.php';
    $_SESSION["id"]= $_GET['s_id'];
    $id = $_SESSION["id"];
    $statement = $con -> prepare("SELECT * FROM seminar WHERE s_id = $id");
    $statement->execute();
    $table = $statement -> fetch();

  ?>
<div class="container w-50">
  <form method="POST" action="seminarupdate.php" enctype="multipart/form-data">
      <div class="">
        <label for="recipient-name" class="col-form-label">Banner Image</label>
        <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Title:</label>
        <input type="text" class="form-control" id="recipient-name" name="Title" value="<?php echo $table['title']?>">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Host ID:</label>
        <input type="text" class="form-control" id="recipient-name" name="Host_Id" value="<?php echo $table['host_id']?>">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Date & Time:</label>
        <input type="datetime-local" class="form-control" id="recipient-name" name="Date_Time" value="<?php echo $table['date_time']?>">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Link:</label>
        <input type="text" class="form-control" id="recipient-name" name="Link" value="<?php echo $table['s_link']?>">
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