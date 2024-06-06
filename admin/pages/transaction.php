<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - transaction</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-content">
    <main class="dashboard d-flex">

        <!-- start sidebar -->
        <?php 
            include "component/sidebar.php";
        ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
        <?php 
            include "component/header.php";
        ?>
          
        
        <!-- start transaction table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Transactions</div>
            </div>
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <style>
                          .align-middle th {
                            font-weight: bold;
                              font-size: 1.0em;
                                         }
                                   </style>
                        <tr class="align-middle">
                            <th>Transaction SI</th>
                            <th>User Name</th>  
                            <th>Buy & Sell</th>
                            <th>Crypto Name</th>
                            <th>Price</th>
                            <th>Transaction Date & Time</th>  
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          include 'connection.php';
                          $result = $con -> query("SELECT * FROM trade_transection");
                          foreach($result as $value):
                        ?>
                        <tr class="bg-white align-middle">
                                <td><?php echo $value['t_sl'] ?></td>
                                <!-- print user name -->
                                <?php
                              // $value array containing data from the table
                             $stmt = $con->prepare("SELECT userinfo.name FROM trade_transection 
                                                    INNER JOIN userinfo ON trade_transection.user_id = userinfo.user_id 
                                                    WHERE trade_transection.user_id = :user_id");
                              $stmt->bindParam(':user_id', $value['user_id']);
                               $stmt->execute();
                              $user = $stmt->fetch(PDO::FETCH_ASSOC);
                               echo "<td>" . $user['name'] . "</td>";  // Output user name
                               ?>

                                <td><?php echo $value['buy_sell'] ?></td>
                                <td><?php echo $value['crypto_name'] ?></td>
                                <td><?php echo $value['price'] ?></td>
                                <td><?php echo $value['date_time'] ?></td>

                                <td class="d-md-flex gap-3 mt-3">

                              <!--     <a href="transactionmodifier.php?t_sl=<?php echo $value['t_sl'] ?>">
                                   <button type="button">Update</button> -->
                                    </a>        
                                </td>
                        </tr> 

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- end student list table -->
        </div>
        <!-- end content page -->

    </main>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>